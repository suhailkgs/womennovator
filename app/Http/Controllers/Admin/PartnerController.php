<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Faker\Factory as Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PartnerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // * List all approved partners
    public function index(Request $request)
    {
        if ($request->pending) {
            $partnerDatas  = DB::table('partners')
                ->leftjoin('state_and_city', 'state_and_city.city_id', '=', 'partners.city_id')
                ->select('partners.*', 'state_and_city.state_name', 'state_and_city.city_name')
                ->where(['partners.status' => 0])
                ->distinct()
                ->orderBy('partners.id', 'desc')
                ->paginate(10);

            return view('backEnd.partner.pending', compact('partnerDatas'));
        }

        $partnerDatas  = DB::table('partners')
            ->leftjoin('state_and_city', 'state_and_city.city_id', '=', 'partners.city_id')
            ->select('partners.*', 'state_and_city.state_name', 'state_and_city.city_name')
            ->where(['partners.status' => 1])
            ->distinct()
            ->orderBy('partners.id', 'desc')
            ->paginate(10);

        return view('backEnd.partner.index', compact('partnerDatas'));
    }

    // * Search Partner
    public function search(Request $request)
    {
        $q = $request->q;
        if ($q != "") {
            $partnerDatas = Partner::where('poc_name', 'LIKE', '%' . $q . '%')->orWhere('poc_email', 'LIKE', '%' . $q . '%')
                ->with('sector', 'city')->paginate(10)->setPath('');
            $pagination = $partnerDatas->appends(array(
                'q' =>  $request->q
            ));
            // dd($pagination);
            if (count($partnerDatas) > 0)
                return view('backEnd.partner.index', compact('partnerDatas'));
        }
        return view('backEnd.partner.index')->with('message', 'No Details found. Try to search again !');
    }

    // * Show Add Partner Form
    public function create(Request $request)
    {
        $states = DB::table('state_and_city')->select('state_id', 'state_name')->distinct()->orderby('state_id')->get();
        $logo_required = true;
        return view('backEnd.partner.create', compact('states', 'logo_required'));
    }

    // * Store the partner
    public function store(Request $request)
    {
        $request->validate([
            "poc_name" => "required",
            "poc_email" => "required|email|unique:partners,poc_email",
            "mobile" => "required",
            "state" => "required",
            "city" => "required",
            "business_name" => "required",
            "logo" => "required",
        ]);

        $poc_name = $request->poc_name;
        $poc_email = $request->poc_email;
        $mobile = $request->mobile;
        $state = $request->state;
        $city = $request->city;
        $business_name = $request->business_name;
        $contribution = $request->contribution;
        $partnership_agreement = $request->partnership_agreement;
        $program_updates = $request->program_updates;
        $social_handles = $request->social_handles;

        if ($request->hasfile('logo')) {
            $image = $request->file('logo');
            $extension = $image->extension();
            $logo = uniqid("", true) . "." . $extension;
        }

        $res = DB::table('partners')->insert([
            "poc_name" => $poc_name,
            "poc_email" => $poc_email,
            "business_name" => $business_name,
            "mobile" => $mobile,
            "contribution" => $contribution,
            "logo" => $logo,
            "partnership_agreement" => $partnership_agreement,
            "program_updates" => $program_updates,
            "social_handles" => $social_handles,
            "state_id" => $state,
            "city_id" => $city,
            "status" => 1,
            "is_fillup" => 1
        ]);

        if ($res) {
            $faker = Faker::create();
            $password = $faker->password();

            // * Create the partner as a user
            DB::table('users')->insert([
                "name" => $poc_name,
                "email" => $poc_email,
                "password" => Hash::make($password),
            ]);

            $partner_detail = ['partner_name' => $poc_name, 'partner_email' => $poc_email, 'partner_password' => $password];    // This will send to view
            $user['to'] = $poc_email;


            // * Send mail to Jury
            Mail::send('backEnd\partner\mail_send_partner_credentials', $partner_detail, function ($messages) use ($user) {
                $messages->to($user['to']);
                $messages->subject("Login Credentials");
            });


            if ($logo) {
                $image->move('we/partner/', $logo);
            }
            $output = array('msg' => 'Partner Created Successfully');
            return redirect('admin/partner')->with('success', $output);
        } else {
            $output = array('msg' => 'Partner Can not be Created');
            return redirect('admin/partner')->with('fail', $output);
        }
    }

    // *  Show Edit Partner Form
    public function edit($id = '')
    {
        $states = DB::table('state_and_city')->select('state_id', 'state_name')->distinct()->orderby('state_id')->get();
        $partner = DB::table('partners')->where(['id' => $id])->first();
        $cities =  DB::table('state_and_city')->select('city_id', 'city_name')->where(['state_id' => $partner->state_id])->get();
        return view('backEnd.partner.edit', compact('id', 'partner', 'states', 'cities'));
    }

    // * Update Partner
    public function update(Request $request, $id = '')
    {
        $request->validate([
            "poc_name" => "required",
            "poc_email" => "required|email|unique:partners,poc_email," . $id,
            "mobile" => "required",
            "state" => "required",
            "city" => "required",
            "business_name" => "required",
        ]);

        $poc_name = $request->poc_name;
        $poc_email = $request->poc_email;
        $mobile = $request->mobile;
        $state = $request->state;
        $city = $request->city;
        $business_name = $request->business_name;
        $contribution = $request->contribution;
        $partnership_agreement = $request->partnership_agreement;
        $program_updates = $request->program_updates;
        $social_handles = $request->social_handles;

        $old_image = DB::table('partners')->where(['id' => $id])->select('logo')->first();

        if ($request->hasfile('logo')) {

            $destination = "we/partner/" . $old_image->logo;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $image = $request->file('logo');
            $extension = $image->extension();
            $logo = uniqid("", true) . "." . $extension;

            $res = DB::table('partners')->where(['id' => $id])->update([
                "poc_name" => $poc_name,
                "poc_email" => $poc_email,
                "business_name" => $business_name,
                "mobile" => $mobile,
                "contribution" => $contribution,
                "logo" => $logo,
                "partnership_agreement" => $partnership_agreement,
                "program_updates" => $program_updates,
                "social_handles" => $social_handles,
                "state_id" => $state,
                "city_id" => $city,
            ]);
        } else {
            $logo = '';
            $res = DB::table('partners')->where(['id' => $id])->update([
                "poc_name" => $poc_name,
                "poc_email" => $poc_email,
                "business_name" => $business_name,
                "mobile" => $mobile,
                "contribution" => $contribution,
                "partnership_agreement" => $partnership_agreement,
                "program_updates" => $program_updates,
                "social_handles" => $social_handles,
                "state_id" => $state,
                "city_id" => $city,
            ]);
        }

        if ($res) {
            if ($logo) {
                $image->move('we/partner/', $logo);
            }

            $output = array('msg' => 'Partner Updated Successfully');
            if ($request->pending) {
                return redirect('admin/partner?pending=true')->with('success', $output);
            }
            return redirect('admin/partner')->with('success', $output);
        } else {
            $output = array('msg' => 'Partner Can not be Updated');
            if ($request->pending) {
                return redirect('admin/partner?pending=true')->with('fail', $output);
            }
            return redirect('admin/partner')->with('fail', $output);
        }
    }

    // * Delete Partner
    public function destroy($id = '')
    {
        $old_image = DB::table('partners')->where(['id' => $id])->select('logo')->first();

        $destination = "we/partner/" . $old_image->logo;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $res = DB::table('partners')->where(['id' => $id])->delete();
        if ($res) {
            $output = array('msg' => 'Partner Deleted Successfully');
            return redirect('admin/partner')->with('success', $output);
        } else {
            $output = array('msg' => 'Partner Can not be Deleted');
            return redirect('admin/partner')->with('fail', $output);
        }
    }


    // * Partner Approve
    public function approve($id = '')
    {
        $partner_data = DB::table('partners')->where(['id' => $id])->select('poc_name', 'poc_email', 'provider_id')->first();
        $provider = $partner_data->provider_id;
        $provider_data = DB::table('users')->where(['id' => $provider])->select("name", "email")->first();

        $partner_name = $partner_data->poc_name;
        $partner_email = $partner_data->poc_email;
        $provider_name = $provider_data->name;
        $provider_email = $provider_data->email;
        $temp_id = rand(111111111, 999999999);
        $check = DB::table('partners')->where(['id' => $id])->update([
            "status" => 1,
            "is_fillup" => 0,
            "temp_id" => $temp_id
        ]);

        $faker = Faker::create();
        $password = $faker->password();

        if ($check) {
            DB::table('users')->insert([
                "name" => $partner_name,
                "email" => $partner_email,
                "password" => Hash::make($password),
            ]);

            $partner_detail = ['partner_name' => $partner_name, 'partner_email' => $partner_email, 'partner_password' => $password, 'temp_id' => $temp_id];    // This will send to view

            $provider_detail = ['partner_name' => $partner_name, 'provider_name' => $provider_name, 'temp_id' => $temp_id];    // This will send to view

            $user1['to'] = $partner_email;
            $user2['to'] = $provider_email;

            // * Send mail to Jury
            Mail::send('backEnd\partner\mail_send_partner', $partner_detail, function ($messages) use ($user1) {
                $messages->to($user1['to']);
                $messages->subject("Further Partner Details");
            });

            // * Send mail to provider aka community_creator
            Mail::send('backEnd\partner\mail_send_provider', $provider_detail, function ($messages) use ($user2) {
                $messages->to($user2['to']);
                $messages->subject("Further Partner Details");
            });

            $output = array('msg' => 'Partner Member Approved');
            return redirect('admin/partner')->with('success', $output);
        } else {
            $output = array('msg' => 'Partner Member cannot be Approved');
            return redirect('admin/partner')->with('fail', $output);
        }
    }
}
