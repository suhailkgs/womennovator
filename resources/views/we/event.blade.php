@extends('we.layouts.layout') @section('front_content')


  @if (session()->has('FRONT_USER_LOGIN_NAME'))
    <div class="community-banner" style="min-height: 192px;">
      <div class="container">
        <div class="row">
          <h2 style="color:#CE199A;font-weight:700;">Welcome, {{ session('FRONT_USER_LOGIN_NAME') }}!</h2>
          <p style="font-style:bold;">Thank you for joining Womennovator! Here is your homepage.</p>
        </div>
      </div>
    </div>
  @endif


  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="post-comi-title">
            <div class="row">
              <div class="col-sm-7">
                <h3 class="up-com-head">Upcoming events </h3>
              </div>
              <div class="col-sm-5">
                <div class="text-right">
                  <div class="comunities-header-sec text-left">
                    <ul>

                      {{-- <li>
                        <span class="sort-by-text">Sort by</span>
                        <select class="select sort-by">
                          <option>Most active</option>
                          <option>Most active</option>
                          <option>Most active</option>
                          <option>Most active</option>
                        </select>
                      </li> --}}
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            {{-- Upcoming Normal Events --}}
            @isset($upcoming_event_normal)
              @foreach ($upcoming_event_normal as $up_event_normal)
                <div class="col-sm-4 to_animate" data-animation="fadeInUp">
                  <div class="post upcoming-event">
                    <!--  <a href="{{ url('event/' . $up_event_normal->id) }}">-->
                    <div class="img-post">
                      <img src="{{ asset('we/images/' . $up_event_normal->normal_event_poster) }}">
                    </div>
                    <div class="post-title">
                      <div class="row">
                        <div class="col-sm-7">
                          <h3>{{ $up_event_normal->normal_event_title }}</h3>
                          <h4>{{ Carbon\Carbon::parse($up_event_normal->normal_event_start_date)->format('jS F, Y') }}
                          </h4>
                          <ul class="communi-list">
                            <li><a href=""><i class="fa fa-clock-o" aria-hidden="true"></i>
                                {{ Carbon\Carbon::parse($up_event_normal->normal_event_from)->format('h:i A') }}</a>
                            </li>
                            <li><a class="com-addres" href=""><i class="fa fa-map-marker" aria-hidden="true"></i>
                                {{ $up_event_normal->city_name ?? '---' }},
                                {{ $up_event_normal->state_name ?? '---' }}</a>
                            </li>
                          </ul>
                        </div>
                        <div class="col-sm-5">
                          <div class="post-title-rt-sec">
                            <a href="{{url('we/event-page/'. $up_event_normal->id. '/'. $up_event_normal->type)}}" class="rsvp">RSVP</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- <div class="community-ban-cintent">
                      <div class="female-user">
                        <img src="{{ url('we/images/femail-img.png') }}">
                      </div>
                      <div class="female-user-content">
                        <h2>Female Entrepreneurs of Bombay</h2>

                      </div>
                    </div> --}}
                    <div class="attending">
                      <p>0 Attending</p>
                    </div>
                    <!--  </a>-->
                  </div>
                </div>
              @endforeach
            @endisset

            {{-- Upcoming Round Table Events --}}
            @isset($upcoming_event_round)
              @foreach ($upcoming_event_round as $up_event_round)
                <div class="col-sm-4 to_animate" data-animation="fadeInUp">
                  <div class="post upcoming-event">
                    <!--  <a href="{{ url('event/' . $up_event_round->id) }}">-->
                    <div class="img-post">
                      <img src="{{ asset('we/images/' . $up_event_round->round_table_poster) }}">
                    </div>
                    <div class="post-title">
                      <div class="row">
                        <div class="col-sm-7">
                          <h3>{{ $up_event_round->round_table_title }}</h3>
                          <h4>{{ Carbon\Carbon::parse($up_event_round->round_table_start_date)->format('jS F, Y') }}</h4>
                          <ul class="communi-list">
                            <li><a href=""><i class="fa fa-clock-o" aria-hidden="true"></i>
                                {{ Carbon\Carbon::parse($up_event_round->round_table_from)->format('h:i A') }}
                            </li>
                            <li><a class="com-addres" href=""><i class="fa fa-map-marker" aria-hidden="true"></i>
                                {{ $up_event_round->city_name ?? '---' }},
                                {{ $up_event_round->state_name ?? '---' }}</a>
                            </li>
                          </ul>
                        </div>
                        <div class="col-sm-5">
                          <div class="post-title-rt-sec">
                            <a href="{{url('we/event-page/'. $up_event_round->id. '/'. $up_event_round->type)}}" class="rsvp">RSVP</a>
                          </div>

                        </div>
                      </div>
                    </div>
                    {{-- <div class="community-ban-cintent">
                      <div class="female-user">
                        <img src="{{ url('we/images/femail-img.png') }}">
                      </div>
                      <div class="female-user-content">
                        <h2>Female Entrepreneurs of Bombay</h2>

                      </div>
                    </div> --}}
                    <div class="attending">
                      <p>0 Attending</p>
                    </div>
                    <!--  </a>-->
                  </div>
                </div>
              @endforeach
            @endisset

            {{-- Upcoming We Pitch Events --}}
            @isset($upcoming_event_we_pitch)
              @foreach ($upcoming_event_we_pitch as $up_event_we_pitch)
                <div class="col-sm-4 to_animate" data-animation="fadeInUp">
                  <div class="post upcoming-event">
                    <!--  <a href="{{ url('event/' . $up_event_we_pitch->id) }}">-->
                    <div class="img-post">
                      <img src="{{ asset('we/images/' . $up_event_we_pitch->we_pitch_poster) }}">
                    </div>
                    <div class="post-title">
                      <div class="row">
                        <div class="col-sm-7">
                          <h3>{{ $up_event_we_pitch->we_pitch_title }}</h3>
                          <h4>{{ Carbon\Carbon::parse($up_event_we_pitch->we_pitch_start_date)->format('jS F, Y') }}</h4>
                          <ul class="communi-list">
                            <li><a href=""><i class="fa fa-clock-o" aria-hidden="true"></i>
                                {{ Carbon\Carbon::parse($up_event_we_pitch->we_pitch_from)->format('h:i A') }}
                            </li>
                            <li><a class="com-addres" href=""><i class="fa fa-map-marker" aria-hidden="true"></i>
                                {{ $up_event_we_pitch->city_name ?? '---' }},
                                {{ $up_event_we_pitch->state_name ?? '---' }}</a>
                            </li>
                          </ul>
                        </div>
                        <div class="col-sm-5">
                          <div class="post-title-rt-sec">
                            <a href="{{url('we/event-page/'. $up_event_we_pitch->id. '/'. $up_event_we_pitch->type)}}" class="rsvp">RSVP</a>
                          </div>

                        </div>
                      </div>
                    </div>
                    {{-- <div class="community-ban-cintent">
                      <div class="female-user">
                        <img src="{{ url('we/images/femail-img.png') }}">
                      </div>
                      <div class="female-user-content">
                        <h2>Female Entrepreneurs of Bombay</h2>

                      </div>
                    </div> --}}
                    <div class="attending">
                      <p>0 Attending</p>
                    </div>
                    <!--  </a>-->
                  </div>
                </div>
              @endforeach
            @endisset

          </div>
          <div class="row">
            <div class="col-sm-7">
              <h3 class="up-com-head">Past events</h3>
            </div>
            <div class="col-sm-5">
              <div class="text-right">
                <div class="comunities-header-sec text-left">
                  <ul>

                    {{-- <li>
                      <span class="sort-by-text">Sort by</span>
                      <select class="select sort-by">
                        <option>Most active</option>
                        <option>Most active</option>
                        <option>Most active</option>
                        <option>Most active</option>
                      </select>
                    </li> --}}
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            {{-- Past Normal Event --}}
            @isset($past_event_normal)
              @foreach ($past_event_normal as $event_normal)
                <div class="col-sm-3 to_animate" data-animation="fadeInUp">
                  <div class="post upcoming-event">
                    {{-- <a href="{{ url('event/' . $event->id) }}" --}}
                    <div class="img-post">
                      <img src="{{ asset('we/images/' . $event_normal->normal_event_poster) }}">
                    </div>
                    <div class="post-title">
                      <div class="row">
                        <div class="col-sm-12">
                          <h3>{{ $event_normal->normal_event_title }}</h3>
                          <div class="">
                            <h4>{{ Carbon\Carbon::parse($event_normal->normal_event_start_date)->format('jS F, Y') }}
                            </h4>
                            <div class="">
                              <i class="fa fa-clock-o" aria-hidden="true"></i>
                              {{ Carbon\Carbon::parse($event_normal->normal_event_from)->format('h:i A') }}
                            </div>
                          </div>
                          <ul class="communi-list communi-list-sm">
                            <li><a href=""><i class="fa fa-map-marker" aria-hidden="true"></i>
                                {{ $event_normal->city_name ?? '---' }},
                                {{ $event_normal->state_name ?? '---' }}</a></li>
                          </ul>
                        </div>

                      </div>
                    </div>
                    {{-- <div class="community-ban-cintent">
                      <div class="female-user">
                        <img src="{{ url('we/images//femail-img.png') }}">
                      </div>
                      <div class="female-user-content2">
                        <h2>Female Entrepreneurs of Bombay</h2>

                      </div>
                    </div> --}}
                    <div class="attending">
                      {{-- <p>12 Attending</p> --}}
                    </div>
                    {{-- </a> --}}
                  </div>
                </div>
              @endforeach
            @endisset


            {{-- Past Round Table Event --}}
            @isset($past_event_round)
              @foreach ($past_event_round as $event_round)
                <div class="col-sm-3 to_animate" data-animation="fadeInUp">
                  <div class="post upcoming-event">
                    {{-- <a href="{{ url('event/' . $event->id) }}" --}}
                    <div class="img-post">
                      <img src="{{ asset('we/images/' . $event_round->round_table_poster) }}">
                    </div>
                    <div class="post-title">
                      <div class="row">
                        <div class="col-sm-12">
                          <h3>{{ $event_round->round_table_title }}</h3>
                          <div class="">
                            <h4>{{ Carbon\Carbon::parse($event_round->round_table_start_date)->format('jS F, Y') }}</h4>
                            <div class="">
                              <i class="fa fa-clock-o" aria-hidden="true"></i>
                              {{ Carbon\Carbon::parse($event_round->round_table_from)->format('h:i A') }}
                            </div>
                          </div>
                          <ul class="communi-list communi-list-sm">
                            <li><a href=""><i class="fa fa-map-marker" aria-hidden="true"></i>
                                {{ $event_round->city_name ?? '---' }},
                                {{ $event_round->state_name ?? '---' }}</a></li>
                          </ul>
                        </div>

                      </div>
                    </div>
                    {{-- <div class="community-ban-cintent">
                      <div class="female-user">
                        <img src="{{ url('we/images//femail-img.png') }}">
                      </div>
                      <div class="female-user-content2">
                        <h2>Female Entrepreneurs of Bombay</h2>

                      </div>
                    </div> --}}
                    <div class="attending">
                      {{-- <p>12 Attending</p> --}}
                    </div>
                    {{-- </a> --}}
                  </div>
                </div>
              @endforeach
            @endisset

            {{-- Past We Pitch Event --}}
            @isset($past_event_we_pitch)
              @foreach ($past_event_we_pitch as $event_we_pitch)
                <div class="col-sm-3 to_animate" data-animation="fadeInUp">
                  <div class="post upcoming-event">
                    {{-- <a href="{{ url('event/' . $event->id) }}" --}}
                    <div class="img-post">
                      <img src="{{ asset('we/images/' . $event_we_pitch->we_pitch_poster) }}">
                    </div>
                    <div class="post-title">
                      <div class="row">
                        <div class="col-sm-12">
                          <h3>{{ $event_we_pitch->we_pitch_title }}</h3>
                          <div class="">
                            <h4>{{ Carbon\Carbon::parse($event_we_pitch->we_pitch_start_date)->format('jS F, Y') }}</h4>
                            <div class="">
                              <i class="fa fa-clock-o" aria-hidden="true"></i>
                              {{ Carbon\Carbon::parse($event_we_pitch->we_pitch_from)->format('h:i A') }}
                            </div>
                          </div>
                          <ul class="communi-list communi-list-sm">
                            <li><a href=""><i class="fa fa-map-marker" aria-hidden="true"></i>
                                {{ $event_we_pitch->city_name ?? '---' }},
                                {{ $event_we_pitch->state_name ?? '---' }}</a></li>
                          </ul>
                        </div>

                      </div>
                    </div>
                    {{-- <div class="community-ban-cintent">
                      <div class="female-user">
                        <img src="{{ url('we/images//femail-img.png') }}">
                      </div>
                      <div class="female-user-content2">
                        <h2>Female Entrepreneurs of Bombay</h2>

                      </div>
                    </div> --}}
                    <div class="attending">
                      {{-- <p>12 Attending</p> --}}
                    </div>
                    {{-- </a> --}}
                  </div>
                </div>
              @endforeach
            @endisset



          </div>

        </div>

      </div>

    </div>
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



@endsection

<!-- eof #box_wrapper -->
<!--</div>-->
<!-- eof #canvas -->
