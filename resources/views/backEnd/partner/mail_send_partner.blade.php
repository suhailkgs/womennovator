Hello, {{ $partner_name }}
<br>
You are selected as a Partner.
<br>
Username: <b>{{ $partner_email }}</b>
<br>
Password: <b>{{ $partner_password }}</b>
<br> Please click on the link below to fill up your further details.
<br>
<a href="{{ url('we/partner_details_form/' . $temp_id) }}">Click Here</a>
