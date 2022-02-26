@extends('we.layouts.layout') @section('front_content')
  <div class="event-page-banner">
    <div class="container">
      <div class="row">
        <div class="col-sm-9">
          <h1>Welcome to your dashboard </h1>
          <div class="community-ban-cintent ">

            <div class="date-box text-center to_animate" data-animation="fadeInUp">
              @php
                if (isset($normal_event->normal_event_start_date)) {
                    $start_date = $normal_event->normal_event_start_date;
                } elseif (isset($round_table->round_table_start_date)) {
                    $start_date = $round_table->round_table_start_date;
                } elseif (isset($we_pitch->we_pitch_start_date)) {
                    $start_date = $we_pitch->we_pitch_start_date;
                }
                if (isset($normal_event->normal_event_from)) {
                    $start_time = $normal_event->normal_event_from;
                } elseif (isset($round_table->round_table_from)) {
                    $start_time = $round_table->round_table_from;
                } elseif (isset($we_pitch->we_pitch_from)) {
                    $start_time = $we_pitch->we_pitch_from;
                }
                if (isset($normal_event->state_name)) {
                    $state_name = $normal_event->state_name;
                } elseif (isset($round_table->state_name)) {
                    $state_name = $round_table->state_name;
                } elseif (isset($we_pitch->state_name)) {
                    $state_name = $we_pitch->state_name;
                }
                if (isset($normal_event->city_name)) {
                    $city_name = $normal_event->city_name;
                } elseif (isset($round_table->city_name)) {
                    $city_name = $round_table->city_name;
                } elseif (isset($we_pitch->city_name)) {
                    $city_name = $we_pitch->city_name;
                }
                if (isset($normal_event->normal_event_desc)) {
                    $desc = $normal_event->normal_event_desc;
                } elseif (isset($round_table->round_table_desc)) {
                    $desc = $round_table->round_table_desc;
                } elseif (isset($we_pitch->we_pitch_desc)) {
                    $desc = $we_pitch->we_pitch_desc;
                }
                if (isset($normal_event->normal_event_mode)) {
                    $mode = $normal_event->normal_event_mode;
                } elseif (isset($round_table->round_table_mode)) {
                    $mode = $round_table->round_table_mode;
                } elseif (isset($we_pitch->we_pitch_mode)) {
                    $mode = $we_pitch->we_pitch_mode;
                }
                if (isset($normal_event->community_name)) {
                    $community_name = $normal_event->community_name;
                } elseif (isset($round_table->community_name)) {
                    $community_name = $round_table->community_name;
                } elseif (isset($we_pitch->community_name)) {
                    $community_name = $we_pitch->community_name;
                }
                if (isset($normal_event->id)) {
                    $event_id = $normal_event->id;
                } elseif (isset($round_table->id)) {
                    $event_id = $round_table->id;
                } elseif (isset($we_pitch->id)) {
                    $event_id = $we_pitch->id;
                }
                if (isset($normal_event->type)) {
                    $event_type = $normal_event->type;
                } elseif (isset($round_table->type)) {
                    $event_type = $round_table->type;
                } elseif (isset($we_pitch->type)) {
                    $event_type = $we_pitch->type;
                }
                
                if (isset($normal_event->attendees)) {
                    $attendees = $normal_event->attendees;
                } elseif (isset($round_table->attendees)) {
                    $attendees = $round_table->attendees;
                } elseif (isset($we_pitch->attendees)) {
                    $attendees = $we_pitch->attendees;
                }
                
              @endphp
              <h2> {{ Carbon\Carbon::parse($start_date)->format('M d') }}</h2>
              <h3>{{ Carbon\Carbon::parse($start_date)->format('Y') }}</h3>
              <p>{{ Carbon\Carbon::parse($start_time)->format('h A') }}</p>
              <p></p>

            </div>

            <div class="female-user-content to_animate" data-animation="fadeInDown">
              {{-- <h2>{{ $event->event_name }}</h2> --}}
              <h2></h2>
              <span class="award">awards</span>
              <ul class="communi-list">
                <li>
                  <a href="">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    {{ $city_name ?? '---' }},
                    {{ $state_name ?? '---' }}
                  </a>
                </li>

              </ul>
            </div>
          </div>
          <nav class="comunity-nav">
            <ul>
              <ul>
                <li class="community-nav-links active" id="comm-home">Home</li>
                <li class="community-nav-links" id="comm-attend">Attendees</li>
                <li class="community-nav-links" id="comm-jury">Jury</li>
              </ul>
            </ul>
          </nav>
        </div>
        <div class="col-sm-3 to_animate" data-animation="fadeInRight">
          @if ($is_applied)
            <a href="javascript:void(0);" class="join-btn">Applied</a>
          @else
            @if (session()->has('FRONT_USER_LOGIN_ID'))
              <a href="#" class="join-btn" id="join-btn">Join this event</a>
            @else
              <a href="#" class="join-btn" onclick="show_login_warning()">Join this event</a>
            @endif
          @endif
          <div class="lead-by">

            <div class="team-user">
              <div class="team-user-title">
                <h5>   people already going</h5>
              </div>
            </div>

          </div>
          <div class="share">
            <a><i class="fa fa-share" aria-hidden="true"></i> Share this event</a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <section class="section comm-event-section show">
    <div class="container">
      <div class="row">
        <div class="col-sm-9">


          <div class="row">
            <div class="col-sm-9">
              <div class="post about-event to_animate" data-animation="fadeInUp">
                <h3>About the Event</h3>
                {!! $desc !!}

              </div>
            </div>
            <div class="col-sm-3"></div>
          </div>

        </div>

        {{-- LEFT CARDS - COMMUNITY AND COMMUNITY LEADER --}}
        {{-- <div class="col-sm-3">
          <div class="rt-heading">
            <h2>Community</h2>
          </div>
          <div class="team to_animate" data-animation="fadeInUp">
            <ul>
              <li>
                <div class="team-user-up evn-te-user">
                  <div class="team-user ">
                    <a class="team-img" href="#"><img src="./images/user.jpg"></a>
                    <div class="team-user-title">
                      <h5>Female Entrepreneurs of Bombay</h5>

                    </div>
                  </div>
                  <p>A women community for up and coming entrepreneurs from Bombay -- from handicraft to operations
                    intensive businesses.</p>
                </div>
              </li>

            </ul>
            <div class="entire-team">
              <ul>
                <li><a class="entire-team-list"><img src="./images/user.jpg"></a></li>
                <li><a class="entire-team-list"><img src="./images/user.jpg"></a></li>
              </ul>
              <a href="#" class="entire-text">Join 19k followers</a>
            </div>
          </div>
          <div class="rt-heading">
            <h2>Community Leader</h2>
          </div>

          <div class="team to_animate" data-animation="fadeInUp">
            <ul>
              <li>
                <div class="team-user-up">
                  <div class="team-user">
                    <a class="team-img" href="#"><img src="./images/user.jpg"></a>
                    <div class="team-user-title">
                      <h5>Robin Smith<span class="check-icon"><img src="images/check-icon.png"></span></h5>
                      <span class="sub-dis">Fintech Guru</span>

                    </div>
                  </div>
                  <p>15 years of experience in ed-tech and community service.</p>
                </div>
              </li>

            </ul>

          </div>

        </div> --}}
      </div>

    </div>
  </section>


  {{-- ATTENDEES --}}
  <section class="comm-event-section hide">
    <section class="section">
      <div class="container display-flex">
        <div class="row" style="flex: auto;">

          <div class="post-comi-title">
            <div class="row display-flex">
              <div class=" ">
                <ul class="post-list display-flex"
                  style="padding: 0 !important; width: max-content; align-items: center;">
                  <li class="">
                    <a href="#1" aria-controls="1" role="tab" data-toggle="tab"
                      style="pointer-events: none;">Attendees</a>
                  </li>

                  <li class="search-candidates display-flex " style="position: relative">
                    <input type="text" placeholder="Search">
                    <i style="position: absolute;
                    right: 7%;
                    top: 18%;
                    color: #757575;" class="fas fa-search"></i>
                  </li>

                </ul>
              </div>
              <div class="col-sm-5">
                <div class="text-right">
                  <div class="comunities-header-sec text-left">
                    <ul>
                      <li class="display-flex" style="justify-content: center; align-items: center;">
                        <span class="sort-by-text" style="width: max-content;">Sort
                          by</span>
                        <select class="select sort-by">
                          <option>Most active</option>
                          <option>Most active</option>
                          <option>Most active</option>
                          <option>Most active</option>
                        </select>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">

            <div class=" " style="width: auto !important;">
              <div class="members-list-section">
                <ul>
                  <li class="display-flex member-li">
                    <p class="member-name">
                      Atul Ahlawat (You)
                    </p>
                    <p class="px-3 " style="color: #757575;">Social Worker</p>
                    <p class=" px-3">Applied 25 mins ago</p>
                    <i class="fa-solid fa-up-right-from-square"></i>
                    <p class="px-3 member-option">

                      <i class="fa-solid fa-ellipsis-vertical"></i>
                    </p>

                  </li>

                  <li class="display-flex member-li">
                    <p class="member-name">
                      Atul Ahlawat
                    </p>
                    <p class="px-3 " style="color: #757575;">Businessman</p>
                    <p class="px-3">Applied 1 hour ago</p>

                    <p class="px-3 member-option"><i class="fa-solid fa-ellipsis-vertical"></i>
                    </p>

                  </li>
                </ul>
              </div>

            </div>

            <div role="tabpanel" class="tab-pane" id="2"></div>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="rt-heading">
            <h2>Community</h2>
          </div>
          <div class="team to_animate" data-animation="fadeInUp">
            <ul>
              <li>
                <div class="team-user-up evn-te-user">
                  <div class="team-user ">
                    <a class="team-img" href="#"><img src="./images/user.jpg"></a>
                    <div class="team-user-title">
                      <h5>Female Entrepreneurs of Bombay</h5>

                    </div>
                  </div>
                  <p>A women community for up and coming entrepreneurs from Bombay -- from
                    handicraft
                    to
                    operations
                    intensive businesses.</p>
                </div>
              </li>

            </ul>
            <div class="entire-team">
              <ul>
                <li><a class="entire-team-list"><img src="./images/user.jpg"></a></li>
                <li><a class="entire-team-list"><img src="./images/user.jpg"></a></li>
              </ul>
              <a href="#" class="entire-text">Join 19k followers</a>
            </div>
          </div>
          <div class="rt-heading">
            <h2>Community Leader</h2>
          </div>

          <div class="team to_animate" data-animation="fadeInUp">
            <ul>
              <li>
                <div class="team-user-up">
                  <div class="team-user">
                    <a class="team-img" href="#"><img src="./images/user.jpg"></a>
                    <div class="team-user-title">
                      <h5>Robin Smith<span class="check-icon"><img src="images/check-icon.png"></span>
                      </h5>
                      <span class="sub-dis">Fintech Guru</span>

                    </div>
                  </div>
                  <p>15 years of experience in ed-tech and community service.</p>
                </div>
              </li>

            </ul>
          </div>
        </div>
      </div>

    </section>
  </section>

  {{-- JURY --}}
  <section class="comm-event-section hide mx-2 " style="margin-top: 3vw;">
    <div class="jury-members-section">
      <h3>Jury Members</h3>
      <br>
      <div class="jury-member-cards">
        <div class="jury-card">
          <div class="jury-image">
            <img src="https://upload.wikimedia.org/wikipedia/commons/3/37/Tripti_Shinghal_Somani.jpg" alt="">
          </div>

          <h3>Tripti Somani</h3>
          <p>Founder</p>
          <p>Womennovator</p>
        </div>

        <div class="jury-card">
          <div class="jury-image">
            <img src="TriptiSomani.jpg" alt="">
          </div>

          <h3>Tripti Somani</h3>
          <p>Founder</p>
          <p>Womennovator</p>
        </div>

        <div class="jury-card">
          <div class="jury-image">
            <img src="TriptiSomani.jpg" alt="">
          </div>

          <h3>Tripti Somani</h3>
          <p>Founder</p>
          <p>Womennovator</p>
        </div>

        <div class="jury-card">
          <div class="jury-image">
            <img src="TriptiSomani.jpg" alt="">
          </div>

          <h3>Tripti Somani</h3>
          <p>Founder</p>
          <p>Womennovator</p>
        </div>

        <div class="jury-card">
          <div class="jury-image">
            <img src="TriptiSomani.jpg" alt="">
          </div>

          <h3>Tripti Somani</h3>
          <p>Founder</p>
          <p>Womennovator</p>
        </div>
      </div>
    </div>
  </section>

  {{-- OTHER EVENTS OF THIS COMMUNITY --}}
  {{-- <section class="">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="up-com-head">Other events from this community & influencer</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 to_animate" data-animation="fadeInUp">
          <div class="post upcoming-event">

            <div class="img-post">
              <img src="images/post1.png">
            </div>
            <div class="post-title">
              <div class="row">
                <div class="col-sm-12">
                  <h3>Festival in a Box</h3>
                  <div class="inline-sec">
                    <h4>Monday, 20 Sep</h4>
                    <span class="time-in-block"><a href=""><i class="fa fa-clock-o" aria-hidden="true"></i> 12 PM -
                        1PM</a></span>
                  </div>
                  <ul class="communi-list communi-list-sm">
                    <li><a href=""><i class="fa fa-map-marker" aria-hidden="true"></i> D52 Worli, Mumbai</a></li>
                  </ul>
                </div>

              </div>
            </div>
            <div class="community-ban-cintent">
              <div class="female-user">
                <img src="images/femail-img.png">
              </div>
              <div class="female-user-content2">
                <h2>Female Entrepreneurs of Bombay</h2>

              </div>
            </div>
            <div class="attending">
              <p>12 Attending</p>
            </div>
          </div>
        </div>
        <div class="col-sm-3 to_animate" data-animation="fadeInUp">
          <div class="post upcoming-event">

            <div class="img-post">
              <img src="images/post1.png">
            </div>
            <div class="post-title">
              <div class="row">
                <div class="col-sm-12">
                  <h3>Festival in a Box</h3>
                  <div class="inline-sec">
                    <h4>Monday, 20 Sep</h4>
                    <span class="time-in-block"><a href=""><i class="fa fa-clock-o" aria-hidden="true"></i> 12 PM -
                        1PM</a></span>
                  </div>
                  <ul class="communi-list communi-list-sm">
                    <li><a href=""><i class="fa fa-map-marker" aria-hidden="true"></i> D52 Worli, Mumbai</a></li>
                  </ul>
                </div>

              </div>
            </div>
            <div class="community-ban-cintent">
              <div class="female-user">
                <img src="images/femail-img.png">
              </div>
              <div class="female-user-content2">
                <h2>Female Entrepreneurs of Bombay</h2>

              </div>
            </div>
            <div class="attending">
              <p>12 Attending</p>
            </div>
          </div>
        </div>
        <div class="col-sm-3 to_animate" data-animation="fadeInUp">
          <div class="post upcoming-event">

            <div class="img-post">
              <img src="images/post1.png">
            </div>
            <div class="post-title">
              <div class="row">
                <div class="col-sm-12">
                  <h3>Festival in a Box</h3>
                  <div class="inline-sec">
                    <h4>Monday, 20 Sep</h4>
                    <span class="time-in-block"><a href=""><i class="fa fa-clock-o" aria-hidden="true"></i> 12 PM -
                        1PM</a></span>
                  </div>
                  <ul class="communi-list communi-list-sm">
                    <li><a href=""><i class="fa fa-map-marker" aria-hidden="true"></i> D52 Worli, Mumbai</a></li>
                  </ul>
                </div>

              </div>
            </div>
            <div class="community-ban-cintent">
              <div class="female-user">
                <img src="images/femail-img.png">
              </div>
              <div class="female-user-content2">
                <h2>Female Entrepreneurs of Bombay</h2>

              </div>
            </div>
            <div class="attending">
              <p>12 Attending</p>
            </div>
          </div>
        </div>
        <div class="col-sm-3 to_animate" data-animation="fadeInUp">
          <div class="post upcoming-event">

            <div class="img-post">
              <img src="images/post1.png">
            </div>
            <div class="post-title">
              <div class="row">
                <div class="col-sm-12">
                  <h3>Festival in a Box</h3>
                  <div class="inline-sec">
                    <h4>Monday, 20 Sep</h4>
                    <span class="time-in-block"><a href=""><i class="fa fa-clock-o" aria-hidden="true"></i> 12 PM -
                        1PM</a></span>
                  </div>
                  <ul class="communi-list communi-list-sm">
                    <li><a href=""><i class="fa fa-map-marker" aria-hidden="true"></i> D52 Worli, Mumbai</a></li>
                  </ul>
                </div>

              </div>
            </div>
            <div class="community-ban-cintent">
              <div class="female-user">
                <img src="images/femail-img.png">
              </div>
              <div class="female-user-content2">
                <h2>Female Entrepreneurs of Bombay</h2>

              </div>
            </div>
            <div class="attending">
              <p>12 Attending</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

  {{-- APPLY MODAL --}}
  <section class="community-event-modal" id="community-event-modal">
    <div class="community-modal">
      <form action="{{ route('we.store_rsvp_modal') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="comm-modal-head"
          style="border-radius: 10px;  position: relative; background-color: #ffc61b; padding: 2vw 1vw;">
          <button class="comm-form-close" id="comm-form-close"> <i class="fas fa-close"></i></button>
          <strong>
            <h3></h3>
            <p>{{ Carbon\Carbon::parse($start_date)->format('M d, Y') }}</p>
            <p>{{ Carbon\Carbon::parse($start_time)->format('h:i A') }}</p>
            <p>Venue: {{ $mode }}</p>
          </strong>
          <br>


          <p>Organised by <strong>{{ $community_name }}</strong></p>
          <br>
        </div>

        <br>
        <div class="comm-modal-body mx-2">
          <h3>Hi, {{ session('FRONT_USER_LOGIN_NAME') ?? 'Visitor' }}</h3>
          <br>
          <div class="display-flex comm-input-group">
            <input type="hidden" name="event_id" id="event_id" value="{{ $event_id ?? '' }}">
            <input type="hidden" name="event_type" id="event_type" value="{{ $event_type ?? '' }}">
            <input type="hidden" name="user_id" id="user_id" value="{{ session('FRONT_USER_LOGIN_ID') ?? '' }}">
            <div class="comm-modal-inputs">
              <div class="">
                <label for="linkedin_link">Your Linkedin URL</label>
                <input name="linkedin_link" id="linkedin_link" type="text" placeholder="https://linkedin.com/">
              </div>
              <div class="">
                <label for="company_name">Company Name*</label>
                <input name="company_name" id="company_name" type="text" placeholder="ITC">
              </div>
              <div>
                <label for="expertise">Field of Expertise</label>
                <input name="expertise" id="expertise" type="text" placeholder="">
                {{-- <select name="expertise-field" id="expertise-field">
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                </select> --}}
              </div>
              <div>

                <label for="pitch_link">Kindly upload your pitch*</label>
                <input type="text" name="pitch_link" id="pitch_link" placeholder="Youtube Link">
                <p>Add video URL or upload the video.</p>

              </div>

            </div>
            <div class="comm-modal-inputs">
              <div>
                <label for="linkedin_link_co">Linkedin URL of the second co-founder</label>
                <input name="linkedin_link_co" id="linkedin_link_co" type="text" placeholder="https://linkedin.com/">

              </div>
              <div>
                <label for="community_website">Company Website/Social Media URL</label>
                <input name="community_website" id="community_website" type="text" placeholder="">
              </div>
              <div>
                <label for="progress">Progress so far </label>
                <input name="progress" id="progress" type="text" placeholder="">
                {{-- <select name="comm-progress" id="comm-progress">
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                </select> --}}
              </div>
              <div style="">
                <label for="comm-upload-video" class="upload-label">Upload a video</label>

                <input type="file" id="comm-upload-video" name="video">

              </div>

            </div>
            <div class="comm-modal-inputs ">
              <div class="company-select">
                <strong>
                  <p>Is your company incoperated?</p>
                </strong>
                <div class="display-flex " style="margin: 0; padding: 0;">
                  <div class="display-flex input-border"
                    style="padding: 0.5vw; margin: 0.5vw; width: max-content !important; height: max-content;">
                    <input type="radio" id="company-incoperated" name="is_incoperated" value="yes">
                    <label for="company-incoperated">Yes</label>
                  </div>
                  <div class="display-flex input-border"
                    style="padding: 0.5vw; margin: 0.5vw; width: max-content !important; height: max-content;">
                    <input type="radio" id="company-not-incoperated" name="is_incoperated" value="no">
                    <label for="company-not-incoperated">No</label>
                  </div>

                </div>
              </div>
              <div class="part-incubator ">
                <strong>
                  <p>Part of any incubator/accelator?</p>
                </strong>
                <div class="display-flex" style="margin: 0;  padding: 0;">
                  <div class="display-flex input-border"
                    style="padding: 0.5vw; margin: 0.5vw; width: max-content !important; height: max-content;">
                    <input type="radio" id="company-incubator" name="is_incubator" value="yes">
                    <label for="company-incubator">Yes</label>
                  </div>
                  <div class="display-flex input-border"
                    style="padding: 0.5vw; margin: 0.5vw; width: max-content !important; height: max-content;">
                    <input type="radio" id="company-not-incubator" name="is_incubator" value="no">
                    <label for="company-not-incubator">No</label>
                  </div>
                  <div class="display-flex input-border"
                    style="padding: 0.5vw; margin: 0.5vw; width: max-content !important; height: max-content;">
                    <input type="radio" id="comapny-in-talk" name="is_incubator" value="in_talks">
                    <label for="comapny-in-talk">In Talks</label>
                  </div>
                </div>
              </div>
              <div>
                <label for="applying_reason">Reason For Applying? </label>
                <input name="applying_reason" id="applying_reason" type="text" placeholder="">
                {{-- <select name="comm-reason" id="comm-reason">
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                </select> --}}
              </div>


            </div>
          </div>


        </div>
        <div style="display: flex; justify-content: center;">
          <input type="submit" value="Submit" class="comm-festive-submit">
        </div>
      </form>

    </div>
    <br>
  </section>


  <!-- <section class="section get-the-letest">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <p>Get the latest resources, reminders and alerts from us. Sign up to our newsletter!</p>
                                      <div class="mail-submit">
                                        <input placeholder="Please add your email id here."><button class="btn-submit">Submit</button>
                                      </div>
                                    </div>
                                    <div class="col-sm-12">

                                    </div>
                                  </div>

                                </div>
                              </section>-->

  <script>
    const commCloseBtn = document.getElementById("comm-form-close");
    const commOpenBtn = document.getElementById("join-btn");
    const commModal = document.getElementById("community-event-modal");
    commModal.classList.add("hide");
    commCloseBtn.addEventListener('click', (e) => {
      e.preventDefault();
      commModal.classList.remove("show");
      commModal.classList.add("hide");

    });
    commOpenBtn.addEventListener('click', (e) => {
      e.preventDefault();
      commModal.classList.remove("hide");
      commModal.classList.add("show");
    })

    var communityLinks = document.getElementsByClassName("community-nav-links");
    var commEvents = document.getElementsByClassName("comm-event-section");
    for (let i = 0; i <= communityLinks.length; i++) {
      communityLinks[i].addEventListener('click', () => {
        // console.log(communityLinks[i].id);
        if (communityLinks[i].id == "comm-home") {
          commEvents[0].classList.remove("hide")
          commEvents[0].classList.add("show")

          commEvents[1].classList.remove("show")
          commEvents[1].classList.add("hide")

          commEvents[2].classList.add("hide")
          commEvents[2].classList.remove("show")

          communityLinks[0].classList.add("active")
          communityLinks[1].classList.remove("active")
          communityLinks[2].classList.remove("active")
        } else if (communityLinks[i].id == "comm-attend") {
          commEvents[0].classList.add("hide")
          commEvents[0].classList.remove("show")

          commEvents[1].classList.add("show")
          commEvents[1].classList.remove("hide")

          commEvents[2].classList.add("hide")
          commEvents[2].classList.remove("show")

          communityLinks[0].classList.remove("active")
          communityLinks[1].classList.add("active")
          communityLinks[2].classList.remove("active")

        } else {
          commEvents[0].classList.add("hide")
          commEvents[0].classList.remove("show")

          commEvents[1].classList.remove("show")
          commEvents[1].classList.add("hide")

          commEvents[2].classList.remove("hide")
          commEvents[2].classList.add("show")



          communityLinks[0].classList.remove("active")
          communityLinks[1].classList.remove("active")
          communityLinks[2].classList.add("active")
        }
      })
    }

    function show_login_warning() {
      alert("You have to login first in order to apply in this event");
    }
  </script>
@endsection

<!-- eof #box_wrapper -->
<!--</div>-->
<!-- eof #canvas -->
