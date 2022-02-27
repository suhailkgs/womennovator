<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Communityapprovedmail;
use App\Models\Sector;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class WeController extends Controller
{
    //
    public function index()
    {
        $communities = DB::table('accepted_communities')->limit(12)->get();
        $blogs = DB::table('blogs')->get();
        // dd($communities);
        return view('we/index', compact('communities', 'blogs'));
    }
    public function login(Request $request)
    {
        if ($request->session()->has('FRONT_USER_LOGIN_ID')) {
            return redirect()->route('we.event');
        }
        return view('we.login');
    }
    public function awards()
    {
        $upcoming_awards = DB::table('award')
            ->where(['status' => 1])
            ->select('*')
            ->get();

        $past_awards = DB::table('award')
            ->where(['status' => 0])
            ->select('*')
            ->get();

        //dd($upcoming_awards);
        return view('we.awards', ['upcoming_awards' => $upcoming_awards, 'past_awards' => $past_awards]);
    }
    public function awards_detail($id)

    {

        $awards = DB::table('award')

            ->where(['id' => $id])

            ->select('*')

            ->get();

        return view('we.awards-details', ['awards' => $awards]);
    }
    public function awards_past()
    {
        $upcoming_awards = DB::table('award')
            ->where(['status' => 1])
            ->select('*')
            ->get();

        $past_awards = DB::table('award')
            ->where(['status' => 0])
            ->select('*')
            ->get();

        //dd($upcoming_awards);
        return view('we.awards-past', ['upcoming_awards' => $upcoming_awards, 'past_awards' => $past_awards]);
    }
    public function blog()
    {
        return view('we.blog');
    }
    public function pitchdeck()
    {
        return view('we.pitchdeck');
    }
    public function communities()
    {
        $communities = DB::table('accepted_communities')->paginate(6);
        $users = DB::table('users')->limit(12)->get();

        return view('we.communities', compact('communities', 'users'));
    }
    public function community_page()
    {
        return view('we.community-page');
    }
    public function contact_us()
    {
        return view('we.contact-us');
    }
    public function create_community_loggedin_stage2()
    {
        return view('we.create-community-loggedin-stage-2');
    }
    public function create_community_loggedin_stage3()
    {

        //$email = Auth::user()->email;
        //dd($email);
        $data = array(
            //'email' => $email,
            'email' => 'mosuhail084@gmail.com',
            //'name' => 'name',
        );
        Mail::to($data)->send(new Communityapprovedmail($data));
        return view('we.create-community-loggedin-stage-3');
    }
    public function create_community_main(Request $request)
    {
        $countries = DB::table('countries')->get();
        $industries = DB::table('industries')->get();
        $user_id = $request->session()->get('FRONT_USER_LOGIN_ID');
        $check = DB::table('communities')->where(['user_id' => $user_id, 'status' => 2])->get();
        if (isset($check[0])) {
            return view('we.create-community-fail');
        }
        return view('we.create-community-main', compact('countries', 'industries'));
    }
    public function edit_profile(Request $request)
    {
        $user_id = $request->session()->get('FRONT_USER_LOGIN_ID');
        $user = DB::table('users')->where(['id' => $user_id])->get();
        return view('we.edit-profile', compact('user'));
    }
    public function user_profile(Request $request)
    {
        $user_id = $request->session()->get('FRONT_USER_LOGIN_ID');
        $user = DB::table('users')->where(['id' => $user_id])->get();
        $com_ids = DB::table('community_followers')->where(['user_id' => $user_id])->select('community_id')->get();
        $communities = [];
        foreach ($com_ids as $com_id) {
            //dd($com_id->community_id);
            $communities[] = DB::table('accepted_communities')->where(['id' => $com_id->community_id])->first();
        }

        // dd($communities);

        return view('we.profile-page', compact('user', 'communities'));
    }
    public function update_profile(Request $request)
    {
        try {
            $data = $request->except(['_token', '_method']);

            $user_id = session()->get('FRONT_USER_LOGIN_ID');


            DB::table('users')->where(['id' => $user_id])->update($data);

            $output = array('msg' => 'Updated Successfully');
            return back()->with('success', $output);
        } catch (Exception $e) {
            DB::rollBack();
            Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
            report($e);
            $output = array('msg' => $e->getMessage());
            return back()->withErrors($output)->withInput();
        }
    }
    public function event()
    {
        $past_event_normal = [];
        $past_event_round = [];
        $past_event_we_pitch = [];
        $upcoming_event_normal = [];
        $upcoming_event_round = [];
        $upcoming_event_we_pitch = [];

        $normal_event = DB::table('community_normal_event')
            ->where(['status' => 1, 'is_drafted' => 0])
            ->leftjoin('state_and_city', 'state_and_city.city_id', '=', 'community_normal_event.city')
            ->select('community_normal_event.*', 'state_and_city.state_name', 'state_and_city.city_name')
            ->get();

        $round_table = DB::table('community_round_table')
            ->where(['status' => 1, 'is_drafted' => 0])
            ->leftjoin('state_and_city', 'state_and_city.city_id', '=', 'community_round_table.city')
            ->select('community_round_table.*', 'state_and_city.state_name', 'state_and_city.city_name')
            ->get();

        $we_pitch = DB::table('community_we_pitch')
            ->where(['status' => 1, 'is_drafted' => 0])
            ->leftjoin('state_and_city', 'state_and_city.city_id', '=', 'community_we_pitch.city')
            ->select('community_we_pitch.*', 'state_and_city.state_name', 'state_and_city.city_name')
            ->get();

        $date_now = date('Y-m-d');
        // * Past event for normal_event
        foreach ($normal_event as $event) {
            if ($event->normal_event_end_date < $date_now) {
                $past_event_normal[] = $event;
            }
        }
        // * Past event for round_table
        foreach ($round_table as $event) {
            if ($event->round_table_end_date < $date_now) {
                $past_event_round[] = $event;
            }
        }
        // * Past event for we_ptich
        foreach ($we_pitch as $event) {
            if ($event->we_pitch_end_date < $date_now) {
                $past_event_we_pitch[] = $event;
            }
        }

        // * Upcoming event for normal_event
        foreach ($normal_event as $event) {
            if ($event->normal_event_start_date >= $date_now) {
                $upcoming_event_normal[] = $event;
            }
        }
        // * Upcoming event for round_table
        foreach ($round_table as $event) {
            if ($event->round_table_start_date >= $date_now) {
                $upcoming_event_round[] = $event;
            }
        }
        // * Upcoming event for we_ptich
        foreach ($we_pitch as $event) {
            if ($event->we_pitch_start_date >= $date_now) {
                $upcoming_event_we_pitch[] = $event;
            }
        }

        $data = [
            'upcoming_event_normal' => $upcoming_event_normal,
            'upcoming_event_round' => $upcoming_event_round,
            'upcoming_event_we_pitch' => $upcoming_event_we_pitch,
            'past_event_normal' => $past_event_normal,
            'past_event_round' => $past_event_round,
            'past_event_we_pitch' => $past_event_we_pitch,
        ];

        return view('we.event', $data);
    }
    public function event_page($event_id, $type)

    {
        $normal_event = [];
        $round_table = [];
        $we_pitch = [];

        if ($type == "normal_event") {
            $normal_event  = DB::table('community_normal_event')
                ->where(['id' => $event_id, 'status' => 1])
                ->leftjoin('state_and_city', 'state_and_city.city_id', '=', 'community_normal_event.city')
                ->select('community_normal_event.*', 'state_and_city.state_name', 'state_and_city.city_name')
                ->first();
        }

        if ($type == "round_table") {
            $round_table  = DB::table('community_round_table')
                ->where(['id' => $event_id, 'status' => 1])
                ->leftjoin('state_and_city', 'state_and_city.city_id', '=', 'community_round_table.city')
                ->select('community_round_table.*', 'state_and_city.state_name', 'state_and_city.city_name')
                ->first();
        }

        if ($type == "we_pitch") {
            $we_pitch  = DB::table('community_we_pitch')
                ->where(['id' => $event_id, 'status' => 1])
                ->leftjoin('state_and_city', 'state_and_city.city_id', '=', 'community_we_pitch.city')
                ->select('community_we_pitch.*', 'state_and_city.state_name', 'state_and_city.city_name')
                ->first();
        }
        $user_id = session()->get('FRONT_USER_LOGIN_ID');
        $check = DB::table('community_event_rsvp')->where(['event_id' => $event_id, 'event_type' => $type, 'user_id' => $user_id])->first();

        $is_applied = $check ? true : false;

        $data = [
            'normal_event' => $normal_event,
            'round_table' => $round_table,
            'we_pitch' => $we_pitch,
            'is_applied' => $is_applied
        ];

        return view('we.event-page', $data);
    }

    public function express_login()
    {
        return view('we.express-login');
    }
    public function faq()
    {
        return view('we.faq');
    }
    public function get_started(Request $request)
    {
        if ($request->session()->has('FRONT_USER_LOGIN_ID')) {
            return redirect()->route('we.event');
        }
        return view('we.get-started');
    }
    public function homepage_login()
    {
        return view('we.homepage-login');
    }
    public function incubation()
    {
        return view('we.incubation');
    }
    public function in_the_press()
    {
        return view('we.in-the-press');
    }

    public function ourteam()
    {
        return view('we.ourteam');
    }

    public function profile_page()
    {
        return view('we.profile-page');
    }
    public function resource()
    {
        return view('we.resource');
    }
    public function signup_step_2()
    {
        return view('we.signup-step-2');
    }
    public function signup_step_3()
    {
        return view('we.signup-step-3');
    }
    public function we_learning()
    {
        return view('we.we-learning');
    }
    public function we_shop()
    {
        return view('we.we-shop');
    }

    public function empty_community()
    {
        return view('we.empty-community');
    }

    public function edit_community_details()
    {
        return view('we.edit-community-details');
    }

    public function join_community(Request $request, $com_id)
    {
        $user_id =  $request->session()->get('FRONT_USER_LOGIN_ID');

        DB::table('community_followers')->insert([
            'user_id' => $user_id,
            'community_id' => $com_id
        ]);

        DB::table('accepted_communities')->where('id', $com_id)->increment('followers');

        return redirect()->back()->with('msg', 'Community joined successfully');
    }

    public function unfollow_community(Request $request, $com_id)
    {
        $user_id =  $request->session()->get('FRONT_USER_LOGIN_ID');
        DB::table('community_followers')->where(['user_id' => $user_id, 'community_id' => $com_id])->delete();

        DB::table('accepted_communities')->where('id', $com_id)->decrement('followers');
        return redirect()->back()->with('msg', 'Community Unfollowed');
    }

    public function community_post_poll(Request $request)
    {
        $type = $request->type;

        // * FOR POST
        if ($type == "post") {
            $community_id = $request->community_id;
            $community_name = $request->community_name;
            $creator_id = $request->creator_id;
            $post_title = $request->post_title;
            if ($request->hasfile('post_image')) {
                $image = $request->file('post_image');
                $extension = $image->extension();
                $post_image = uniqid("", true) . "." . $extension;
                $image->move('we/images/', $post_image);
            }
            $post_content = $request->post_content;
            $status = $request->status ?? 1;
            $post_date = date("l, d F, Y");  // Saturday, 12 February, 2022
            $res = DB::table('community_post')->insert([
                "community_id" => $community_id,
                "community_name" => $community_name,
                "creator_id" => $creator_id,
                "post_title" => $post_title,
                "post_image" => $post_image,
                "post_content" => $post_content,
                "status" => $status,
                "post_date" => $post_date
            ]);
            if ($res) {
                if ($status == 0) {
                    return redirect()->back()->with("success", "Post Drafted Successfully");
                }
                return redirect()->back()->with("success", "Post Created Successfully");
            } else {
                if ($status == 0) {
                    return redirect()->back()->with("success", "Post Can't be Drafted");
                }
                return redirect()->back()->with("fail", "Post Can't be Created");
            }
        }

        // * FOR POLL
        if ($type ==  "poll") {
            $community_id = $request->community_id;
            $community_name = $request->community_name;
            $creator_id = $request->creator_id;
            $poll_title = $request->poll_title;
            $poll_options_arr = $request->poll_options;
            // $poll_options = implode(",", $poll_options_arr);
            $poll_date = date("l, d F, Y");  // Saturday, 12 February, 2022
            $poll_end_time = $request->poll_end_time;  // Saturday, 12 February, 2022
            $status = $request->status ?? 1;

            $com_poll_id = DB::table('community_poll')->insertGetId([
                "community_id" => $community_id,
                "community_name" => $community_name,
                "creator_id" => $creator_id,
                "poll_title" => $poll_title,
                "poll_date" => $poll_date,
                "poll_end_time" => $poll_end_time,
                "status" => $status
            ]);

            foreach ($poll_options_arr as $option) {
                DB::table('community_poll_vote')->insert([
                    'community_poll_id' => $com_poll_id,
                    'poll_option' => $option
                ]);
            }

            if ($com_poll_id) {
                if ($status == 0) {
                    return redirect()->back()->with("success", "Poll Drafted Successfully");
                }
                return redirect()->back()->with("success", "Poll Created Successfully");
            } else {
                if ($status == 0) {
                    return redirect()->back()->with("success", "Poll Can't be Drafted");
                }
                return redirect()->back()->with("fail", "Poll Can't be Created");
            }
        }

        // * FOR RESOURCE
        if ($type == "resource") {
            $community_id = $request->community_id;
            $community_name = $request->community_name;

            if ($request->hasfile('resource_image')) {
                $image = $request->file('resource_image');
                $extension = $image->extension();
                $resource_image = uniqid("", true) . "." . $extension;
            }
            if ($request->hasfile('resource_file')) {
                $file = $request->file('resource_file');
                $extension = $file->extension();
                $resource_file = uniqid("", true) . "." . $extension;
            }
            $creator_id = $request->creator_id;
            $resource_title = $request->resource_title;
            $resource_content = $request->resource_content;
            $resource_date = date("l, d F, Y");  // Saturday, 12 February, 2022
            $status = $request->status ?? 1;

            $res = DB::table('community_resource')->insert([
                "community_id" => $community_id,
                "community_name" => $community_name,
                "creator_id" => $creator_id,
                "resource_title" => $resource_title,
                "resource_image" => $resource_image,
                "resource_file" => $resource_file,
                "resource_content" => $resource_content,
                "resource_date" => $resource_date,
                "status" => $status,
            ]);


            if ($res) {
                $image->move('we/images/', $resource_image);
                $file->move('we/files/', $resource_file);
                if ($status == 0) {
                    return redirect()->back()->with("success", "Resource Drafted Successfully");
                }
                return redirect()->back()->with("success", "Resource Created Successfully");
            } else {
                if ($status == 0) {
                    return redirect()->back()->with("success", "Resource Can't be Drafted");
                }
                return redirect()->back()->with("fail", "Resource Can't be Created");
            }
        }
    }
    public function community_events(Request $request)
    {
        $type = $request->type;

        // * FOR NORMAL EVENT
        if ($type == "normal_event") {
            // dd($request->all());
            $normal_event_title = $request->normal_event_title;

            if ($request->hasfile('normal_event_poster')) {
                $image = $request->file('normal_event_poster');
                $extension = $image->extension();
                $normal_event_poster = uniqid("", true) . "." . $extension;
            }
            $normal_event_mode = $request->normal_event_mode;
            $normal_event_start_date = $request->normal_event_start_date;
            $normal_event_end_date = $request->normal_event_end_date;
            $normal_event_from = $request->normal_event_from;
            $normal_event_to = $request->normal_event_to;
            $normal_event_desc = $request->normal_event_desc;
            $community_id = $request->community_id;
            $community_name = $request->community_name;
            $creator_id = $request->creator_id;
            $status = 0;
            $is_drafted = $request->is_drafted ?? '0';
            $state = 'none';
            $city = 'none';
            $sector = 'none';
            $jury = 'none';
            $faces = 'none';
            $event_link = 'none';

            $res = DB::table('community_normal_event')->insert([
                "normal_event_title" => $normal_event_title,
                "normal_event_poster" => $normal_event_poster,
                "normal_event_mode" => $normal_event_mode,
                "normal_event_start_date" => $normal_event_start_date,
                "normal_event_end_date" => $normal_event_end_date,
                "normal_event_from" => $normal_event_from,
                "normal_event_to" => $normal_event_to,
                "normal_event_desc" => $normal_event_desc,
                "community_id" => $community_id,
                "community_name" => $community_name,
                "creator_id" => $creator_id,
                "status" => $status,
                "is_drafted" => $is_drafted,
                "state" => $state,
                "city" => $city,
                "sector" => $sector,
                "type" => $type,
                "jury" => $jury,
                "faces" => $faces,
                "event_link" => $event_link,
            ]);

            if ($res) {
                $image->move('we/images/', $normal_event_poster);
                if ($is_drafted == 1) {
                    return redirect()->back()->with("success", "Normal Event Drafted Successfully");
                }
                return redirect()->back()->with("success", "Normal Event Created Successfully");
            } else {
                if ($is_drafted == 1) {
                    return redirect()->back()->with("success", "Normal Event Can't be Drafted");
                }
                return redirect()->back()->with("fail", "Normal Event Can't be Created");
            }
        }

        // * FOR ROUND TABLE
        if ($type == "round_table") {
            $round_table_title = $request->round_table_title;
            if ($request->hasfile('round_table_poster')) {
                $image = $request->file('round_table_poster');
                $extension = $image->extension();
                $round_table_poster = uniqid("", true) . "." . $extension;
            }
            $round_table_mode = $request->round_table_mode;
            $round_table_start_date = $request->round_table_start_date;
            $round_table_end_date = $request->round_table_end_date;
            $round_table_from = $request->round_table_from;
            $round_table_to = $request->round_table_to;
            $round_table_desc = $request->round_table_desc;
            $community_id = $request->community_id;
            $community_name = $request->community_name;
            $creator_id = $request->creator_id;
            $status =  0;
            $is_drafted =  $request->is_drafted ?? 0;
            $state = 'none';
            $city = 'none';
            $sector = 'none';
            $jury = 'none';
            $faces = 'none';
            $event_link = 'none';

            $res = DB::table('community_round_table')->insert([
                "round_table_title" => $round_table_title,
                "round_table_poster" => $round_table_poster,
                "round_table_mode" => $round_table_mode,
                "round_table_start_date" => $round_table_start_date,
                "round_table_end_date" => $round_table_end_date,
                "round_table_from" => $round_table_from,
                "round_table_to" => $round_table_to,
                "round_table_desc" => $round_table_desc,
                "community_id" => $community_id,
                "community_name" => $community_name,
                "creator_id" => $creator_id,
                "status" => $status,
                "is_drafted" => $is_drafted,
                "state" => $state,
                "city" => $city,
                "sector" => $sector,
                "type" => $type,
                "jury" => $jury,
                "faces" => $faces,
                "event_link" => $event_link,
            ]);

            if ($res) {
                $image->move('we/images/', $round_table_poster);
                if ($is_drafted == 1) {
                    return redirect()->back()->with("success", "Round Table Drafted Successfully");
                }
                return redirect()->back()->with("success", "Round Table Created Successfully");
            } else {
                if ($is_drafted == 1) {
                    return redirect()->back()->with("success", "Round Table Can't be Drafted");
                }
                return redirect()->back()->with("fail", "Round Table Can't be Created");
            }
        }

        // * FOR WE PITCH
        if ($type == "we_pitch") {
            $we_pitch_title = $request->we_pitch_title;
            if ($request->hasfile('we_pitch_poster')) {
                $image = $request->file('we_pitch_poster');
                $extension = $image->extension();
                $we_pitch_poster = uniqid("", true) . "." . $extension;
            }
            $we_pitch_mode = $request->we_pitch_mode;
            $we_pitch_start_date = $request->we_pitch_start_date;
            $we_pitch_end_date = $request->we_pitch_end_date;
            $we_pitch_from = $request->we_pitch_from;
            $we_pitch_to = $request->we_pitch_to;
            $we_pitch_desc = $request->we_pitch_desc;
            $community_id = $request->community_id;
            $community_name = $request->community_name;
            $creator_id = $request->creator_id;
            $status = 0;
            $is_drafted = $request->is_drafted ?? 0;
            $state = 'none';
            $city = 'none';
            $sector = 'none';
            $jury = 'none';
            $faces = 'none';
            $event_link = 'none';

            $res = DB::table('community_we_pitch')->insert([
                "we_pitch_title" => $we_pitch_title,
                "we_pitch_poster" => $we_pitch_poster,
                "we_pitch_mode" => $we_pitch_mode,
                "we_pitch_start_date" => $we_pitch_start_date,
                "we_pitch_end_date" => $we_pitch_end_date,
                "we_pitch_from" => $we_pitch_from,
                "we_pitch_to" => $we_pitch_to,
                "we_pitch_desc" => $we_pitch_desc,
                "community_id" => $community_id,
                "community_name" => $community_name,
                "creator_id" => $creator_id,
                "status" => $status,
                "is_drafted" => $is_drafted,
                "state" => $state,
                "city" => $city,
                "sector" => $sector,
                "type" => $type,
                "jury" => $jury,
                "faces" => $faces,
                "event_link" => $event_link,
            ]);

            if ($res) {
                $image->move('we/images/', $we_pitch_poster);
                if ($is_drafted == 1) {
                    return redirect()->back()->with("success", "We Pitch Drafted Successfully");
                }
                return redirect()->back()->with("success", "We Pitch Created Successfully");
            } else {
                if ($is_drafted == 1) {
                    return redirect()->back()->with("success", "We Pitch Can't be Drafted");
                }
                return redirect()->back()->with("fail", "We Pitch Can't be Created");
            }
        }
    }
    // * Like Community
    public function like_community(Request $request)
    {

        $post_id = $request->post_id;
        $user_id =  $request->session()->get('FRONT_USER_LOGIN_ID');

        DB::table('community_likes')->insert([
            'user_id' => $user_id,
            'community_post_id' => $post_id
        ]);

        $data = DB::table('community_post')->where(['id' => $post_id])->select(['like_count'])->first();

        $check = DB::table('community_post')->where(['id' => $post_id])->update([
            'like_count' => $data->like_count + 1
        ]);


        if ($check) {
            return response()->json(['status' => 'succcess']);
        } else {
            return response()->json(['status' => 'fail']);
        }
    }

    // * Community Poll Vote
    public function poll_vote(Request $request)
    {
        $opt_id = $request->opt_id;
        $poll_id = $request->poll_id;
        $user_id =  $request->session()->get('FRONT_USER_LOGIN_ID');

        $res1 = DB::table('community_poll_vote')->where(['id' => $opt_id])->increment('vote');
        $res2 = DB::table('community_poll_user')->insert([
            'user_id' => $user_id,
            'community_poll_id' => $poll_id
        ]);

        if ($res1 && $res2) {
            return response()->json(['status' => 'succcess']);
        } else {
            return response()->json(['status' => 'fail']);
        }
    }

    public function newsletter_store(Request $request)
    {
        DB::table('newsletter')->insert([
            'email' => $request->email
        ]);
        return Redirect::back()->withErrors(['msg' => 'Success']);
    }

    // * Community post Update
    public function community_post_poll_update(Request $request)
    {
        $post_id = $request->post_id;
        $post_title = $request->post_title;
        $post_content = $request->post_content;

        $old_image = DB::table('community_post')->where(['id' => $post_id])->select('post_image')->first();

        if ($request->hasfile('post_image')) {

            $destination = "we/images/" . $old_image->post_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }


            $image = $request->file('post_image');
            $extension = $image->extension();
            $post_image = uniqid("", true) . "." . $extension;

            $res = DB::table('community_post')->where(['id' => $post_id])->update([
                'post_title' => $post_title,
                'post_content' => $post_content,
                'post_image' => $post_image
            ]);
        } else {
            $image = '';
            $res = DB::table('community_post')->where(['id' => $post_id])->update([
                'post_title' => $post_title,
                'post_content' => $post_content,
            ]);
        }

        if ($res) {
            if ($image) {
                $image->move('we/images/', $post_image);
            }
            return redirect()->back()->with("success", "Post Updated Successfully");
        } else {
            return redirect()->back()->with("success", "Post cannot be Updated");
        }
    }

    // * Event RSVP Modal
    public function store_rsvp_modal(Request $request)
    {
        $event_id = $request->event_id;
        $event_type = $request->event_type;
        $user_id = $request->user_id;
        $linkedin_link = $request->linkedin_link;
        $linkedin_link_co = $request->linkedin_link_co;
        $is_incoperated = $request->is_incoperated;
        $company_name = $request->company_name;
        $community_website = $request->community_website;
        $is_incubator = $request->is_incubator;
        $expertise = $request->expertise;
        $progress = $request->progress;
        $applying_reason = $request->applying_reason;
        $pitch_link = $request->pitch_link;
        if ($request->hasfile('video')) {
            $file = $request->file('video');
            $extension = $file->extension();
            $video = uniqid("", true) . "." . $extension;
        } else {
            $video = "none";
        }

        $res = DB::table('community_event_rsvp')->insert([
            "event_id" => $event_id,
            "event_type" => $event_type,
            "user_id" => $user_id,
            "linkedin_link" => $linkedin_link,
            "linkedin_link_co" => $linkedin_link_co,
            "is_incoperated" => $is_incoperated,
            "company_name" => $company_name,
            "community_website" => $community_website,
            "is_incubator" => $is_incubator,
            "expertise" => $expertise,
            "progress" => $progress,
            "applying_reason" => $applying_reason,
            "applying_reason" => $applying_reason,
            "pitch_link" => $pitch_link,
            "video" => $video,
        ]);

        if ($event_type == "normal_event") {
            $check = DB::table("community_normal_event")->where(['id' => $event_id])->increment('attendees');
        }
        if ($event_type == "round_table") {
            $check = DB::table("community_round_table")->where(['id' => $event_id])->increment('attendees');
        }
        if ($event_type == "we_pitch") {
            $check = DB::table("community_we_pitch")->where(['id' => $event_id])->increment('attendees');
        }

        if ($res && $check) {
            if ($file) {
                $file->move('we/videos/', $video);
            }
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    // * Add Jury Memeber
    public function add_jury_member(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "jury_name" => "required",
            "jury_email" => "required|email|unique:juries,email",
            "jury_linkedin" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validator->errors()
            ]);
        } else {
            $com_id = $request->com_id;
            $comm_creator = DB::table('accepted_communities')->where(['id' => $com_id])->select('user_id')->first();

            $name = trim($request->jury_name);
            $email = trim($request->jury_email);
            $linkedin = trim($request->jury_linkedin);

            $jury_insert_id = DB::table('juries')->insertGetId([
                "name" => $name,
                "email" => $email,
                "linkedin" => $linkedin,
                "provider_id" => $comm_creator->user_id,
                "status" => 0
            ]);

            if ($jury_insert_id) {
                $res = DB::table('community_and_jury')->insert([
                    "jury_id" => $jury_insert_id,
                    "community_id" => $com_id,
                    "status" => 0
                ]);
            }

            if ($res) {
                return response()->json([
                    'status' => 'success',
                    'msg' => 'Jury Member Added Successfully. Pending for Admin Approval'
                ]);
            } else {
                return response()->json([
                    'status' => 'fail',
                    'msg' => 'Jury member cannot be added'
                ]);
            }
        }
    }

    // * Jury Futher Details
    public function jury_details_form(Request $request, $temp_id)
    {
        $jury_data = DB::table('juries')->where(['temp_id' => $temp_id])->select("is_fillup")->first();
        if ($jury_data) {
            if ($jury_data->is_fillup == 1) {
                return view("backEnd.jury.after_form_fillup", ['success2' => "Form already Filled up"]);
            }
        } else {
            return view("backEnd.jury.after_form_fillup", ['success2' => "Form already Filled up"]);
        }


        $states = DB::table('state_and_city')->select('state_id', 'state_name')->distinct()->orderby('state_id')->get();
        $sector = Sector::latest()->get();
        $data = [
            'states' => $states,
            'sector' => $sector,
            'temp_id' => $temp_id
        ];
        return view("backEnd.jury.jury_details_fillup", $data);
    }

    // * Jury Futher Details update
    public function jury_details_update(Request $request)
    {
        if ($request->temp_id == null) {
            return redirect('/');
        }

        $validate = $request->validate([
            "mobile_number" => "required",
            "designation" => "required",
            "fblink" => "required",
            "company" => "required",
            "industry" => "required",
            "sector" => "required",
            "state" => "required",
            "city" => "required",
            "description" => "required"
        ]);

        $mobile_number = $request->mobile_number;
        $designation = $request->designation;
        $fblink = $request->fblink;
        $instagram = $request->instagram;
        $twitter = $request->twitter;
        $company = $request->company;
        $industry = $request->industry;
        $sector = $request->sector;
        $state = $request->state;
        $city = $request->city;
        $description = $request->description;
        $temp_id = $request->temp_id;

        if ($request->hasfile('photo')) {
            $image = $request->file('photo');
            $extension = $image->extension();
            $photo = uniqid("", true) . "." . $extension;
        }

        $res = DB::table('juries')->where(['temp_id' => $temp_id])->update([
            "mobile_number" => $mobile_number,
            "designation" => $designation,
            "photo" => $photo,
            "fblink" => $fblink,
            "instagram" => $instagram,
            "twitter" => $twitter,
            "company" => $company,
            "industry" => $industry,
            "state_id" => $state,
            "city_id" => $city,
            "sector_id" => $sector,
            "description" => $description,
            "temp_id" => null,
            "is_fillup" => 1
        ]);

        if ($res) {
            if ($photo) {
                $image->move('we/jury/', $photo);
            }
            return view("backEnd.jury.after_form_fillup", ['success' => "Form Filleup Successfull"]);
        } else {
            return view("backEnd.jury.after_form_fillup", ['fail' => "Form Fillup Failed"]);
        }
    }

    // * Add Partner Memeber
    public function add_partner(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "poc_name" => "required",
            "poc_email" => "required|email|unique:partners,poc_email",
            "business_name" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validator->errors()
            ]);
        } else {
            $com_id = $request->com_id;
            $comm_creator = DB::table('accepted_communities')->where(['id' => $com_id])->select('user_id')->first();

            $poc_name = trim($request->poc_name);
            $poc_email = trim($request->poc_email);
            $business_name = trim($request->business_name);

            $res = DB::table('partners')->insert([
                "poc_name" => $poc_name,
                "poc_email" => $poc_email,
                "business_name" => $business_name,
                "provider_id" => $comm_creator->user_id,
                "status" => 0
            ]);
            if ($res) {
                return response()->json([
                    'status' => 'success',
                    'msg' => 'Partner Added Successfully. Pending for Admin Approval.'
                ]);
            } else {
                return response()->json([
                    'status' => 'fail',
                    'msg' => 'Partner cannot be added.'
                ]);
            }
        }
    }

    // * Partner Futher Details
    public function partner_details_form(Request $request, $temp_id)
    {
        $partner_data = DB::table('partners')->where(['temp_id' => $temp_id])->select("is_fillup")->first();
        if ($partner_data) {
            if ($partner_data->is_fillup == 1) {
                return view("backEnd.partner.after_form_fillup", ['success2' => "Form already Filled up"]);
            }
        } else {
            return view("backEnd.partner.after_form_fillup", ['success2' => "Form already Filled up"]);
        }


        $states = DB::table('state_and_city')->select('state_id', 'state_name')->distinct()->orderby('state_id')->get();
        $sector = Sector::latest()->get();
        $data = [
            'states' => $states,
            'sector' => $sector,
            'temp_id' => $temp_id
        ];
        return view("backEnd.partner.partner_details_fillup", $data);
    }

    // * Partner Futher Details update
    public function partner_details_update(Request $request)
    {
        if ($request->temp_id == null) {
            return redirect('/');
        }

        $validate = $request->validate([
            "mobile" => "required",
            "logo" => "required",
            "contribution" => "required",
            "state" => "required",
            "city" => "required",
        ]);

        $mobile = $request->mobile;
        $contribution = $request->contribution;
        $partnership_agreement = $request->partnership_agreement;
        $program_updates = $request->program_updates;
        $social_handles = $request->social_handles;
        $state = $request->state;
        $city = $request->city;
        $temp_id = $request->temp_id;

        if ($request->hasfile('logo')) {
            $image = $request->file('logo');
            $extension = $image->extension();
            $logo = uniqid("", true) . "." . $extension;
        }

        $res = DB::table('partners')->where(['temp_id' => $temp_id])->update([
            "mobile" => $mobile,
            "contribution" => $contribution,
            "logo" => $logo,
            "partnership_agreement" => $partnership_agreement,
            "program_updates" => $program_updates,
            "social_handles" => $social_handles,
            "state_id" => $state,
            "city_id" => $city,
            "temp_id" => null,
            "is_fillup" => 1
        ]);

        if ($res) {
            if ($logo) {
                $image->move('we/partner/', $logo);
            }
            return view("backEnd.partner.after_form_fillup", ['success' => "Form Fillup Successfull"]);
        } else {
            return view("backEnd.partner.after_form_fillup", ['fail' => "Form Fillup Failed"]);
        }
    }
}
