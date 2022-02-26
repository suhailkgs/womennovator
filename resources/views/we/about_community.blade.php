@extends('we.layouts.layout') @section('front_content')
<div class="community-banner">
  <div class="container">
    <div class="row">
      <div class="col-sm-9">

        <div class="community-ban-cintent">
          <div class="female-user">
            <img src="{{ asset('backEnd/image/community_image/' . $community->logo) }}">
          </div>
          <div class="female-user-content">
            <h2>{{ $community->name }}</h2>
            <ul class="communi-list">
              <li><a href=""><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $community->city }}</a></li>
              <li><a href=""><i class="fa fa-globe" aria-hidden="true"></i> {{ $community->followers ?? 0 }}</a>
              </li>
            </ul>
          </div>
        </div>
        <nav class="comunity-nav">
          <ul>
            <li><a href="{{ url('community/' . $community->id) }}">Home</a></li>
            <li><a href="{{ url('community/events/' . $community->id) }}">Events</a></li>
            @if (session()->has('FRONT_USER_LOGIN_ID'))
              <li><a href="#">Members</a></li>
            @endif
            <li><a href="{{ route('community.about', ['com_id' => $community->id]) }}">About</a></li>
          </ul>
        </nav>
      </div>
      <div class="mb-3">
        @if (session()->has('msg'))
          <p style="color: rgb(0, 182, 0); font-weight: bold;"> {{ session('msg') }}</p>
        @endif
      </div>
      <div class="col-sm-3">
        @if (session()->has('FRONT_USER_LOGIN_ID'))
          @if ($followed)
            <a href="{{ route('we.unfollow_community', ['com_id' => $community->id]) }}"
              class="join-btn">Unfollow</a>
          @else
            <a href="{{ route('we.join_community', ['com_id' => $community->id]) }}" class="join-btn">Join this
              community</a>
          @endif
        @else
          <a href="{{ route('we.login') }}" class="join-btn">Join this community</a>
        @endif
        {{-- <a href="{{ route('we.join_community', ['com_id' => $community->id]) }}" class="join-btn">Join this
          community</a> --}}


        <div class="lead-by">
          <p>Led by </p>
          <div class="team-user">
            <a class="team-img" href="#"><img
                src="{{ asset('backEnd/image/community_image/' . $community->logo) }}"></a>
            <div class="team-user-title">
              <h5>{{ $community->led_by }}</h5>
              <span class="sub-dis">{{ $community->industry }}</span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>


</div>
<section class="section">
  <div class="container display-flex">
    <div class=" col-sm-9">
      <div class="row about-section">
        <h1 class="about-heading">About</h1>
        <div class="about-section-para">
          <p contenteditable="false" spellcheck="false">
            {{ $community->about }}
          </p>
        </div>
        
        <div role="tabpanel" class="tab-pane" id="2"></div>
      </div>

      <div class="col-sm-5"></div>
    </div>

    <div class="col-sm-3">
      <div class="volunteers-box">
        <h3>Volunteers</h3>
        <a href="">+ Invite someone to volunteer</a>
      </div>
      <div class="volunteers-box">
        <h3>Share</h3>
        <a href="">+ Invite someone to volunteer</a>
      </div>
    </div>
  </div>

</section>
@endsection