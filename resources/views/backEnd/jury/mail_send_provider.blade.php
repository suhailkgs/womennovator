Hello, {{ $provider_name }}
<br>
You have selected {{ $jury_name }} as a Jury member. Please click on the link below to fill up his/her further
details.
<br>
<a href="{{ url('we/jury_details_form/' . $temp_id) }}">Click Here</a>
