Hello, {{ $provider_name }}
<br>
You have selected {{ $partner_name }} as a Partner. Please click on the link below to fill up his/her further
details.
<br>
<a href="{{ url('we/partner_details_form/' . $temp_id) }}">Click Here</a>
