@extends('we.layouts.layout') @section('front_content')
  <div class="empty-community">
    <div class="container-fluid">
      <div class="community-banner">
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
                  <li><a href=""><i class="fa fa-globe" aria-hidden="true"></i>
                      @if ($community->followers != 0)
                        {{ $community->followers }}
                      @else
                        0
                      @endif Followers
                    </a></li>
                </ul>
              </div>
            </div>
            <nav class="comunity-nav">
              <ul>
                <li><a href="{{ url('community/' . $community->id) }}">Home</a></li>
                <li><a href="{{ url('community/events/' . $community->id) }}">Events</a></li>
                <li><a href="#">Members</a></li>
                <li><a href="{{ route('community.about', ['com_id' => $community->id]) }}">About</a></li>
              </ul>
            </nav>
          </div>
          <div class="col-sm-3">
            <a href="{{ route('we.community_setting', ['com_id' => $community->id]) }}" class="join-btn"><i
                class="fa fa-cog" aria-hidden="true"></i> Community Settings</a>

          </div>
        </div>
      </div>
    </div>


  </div>


  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-sm-9">
          <div class="post-comi-title">
            <div class="row">
              <div class="col-sm-7">
                <ul class="post-list" role="tablist">
                  <li class="active">
                    <a href="#1" aria-controls="1" role="tab" data-toggle="tab">Posts</a>
                  </li>
                  <li>
                    <a href="#2" aria-controls="2" role="tab" data-toggle="tab">Drafts</a>
                  </li>
                </ul>
              </div>
              <div class="col-sm-5">
                <div class="text-right">
                  <div class="comunities-header-sec text-left">
                    <ul>
                      <li>
                        <span class="sort-by-text">Sort by</span>
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

          @if (session()->has('success'))
            {{ session('success') }}
          @elseif(session()->has('fail'))
            {{ session('fail') }}
          @endif

          <div class="row">
            <div class="col-sm-7">
              <div class="tab-content tab-content-no">
                <div role="tabpanel" id="1" class="tab-pane post-main fade-in 'active'">
                  <div class="post-tab-sec d-flex">
                    <div class="post-tab tablinks active-tabs" id="post" data-toggle="post">
                      <a style="display: block"><img src="{{ url('we/images/post-icon.png') }}" />
                        Post</a>
                    </div>
                    <div class="post-tab tablinks" id="poll">
                      <a style="display: block"><img src="{{ url('we/images/poll-icon.png') }}" />
                        Poll</a>
                    </div>
                    <div class="post-tab tablinks " id="resources">
                      <a class="" style="display: block"><img
                          src="{{ url('we/images/resource-icon.png') }}" />
                        Resource</a>
                    </div>
                  </div>
                  <div class="post-content" id="post-content">

                    {{-- POST --}}
                    <div id="post-tab" class="tabcontent">
                      @if (Request::get('action') == 'edit')
                        <form action="{{ route('we.community_post_poll_update') }}" method="post" id="post_form"
                          enctype="multipart/form-data">
                        @else
                          <form action="{{ route('we.community_post_poll') }}" method="post" id="post_form"
                            enctype="multipart/form-data">
                      @endif

                      @csrf
                      <input type="hidden" name="community_id" id="community_id" value="{{ $community->id }}">
                      <input type="hidden" name="community_name" id="community_name" value="{{ $community->name }}">
                      <input type="hidden" name="creator_id" id="creator_id"
                        value="{{ session('FRONT_USER_LOGIN_ID') }}">
                      <input type="hidden" name="type" value="post"></input>
                      <input type="hidden" name="post_id" value="{{$post->id ?? ''}}"></input>

                      <input type="text" name="post_title" placeholder="Post Title" value="{{ $post->post_title ?? '' }}"
                        required></input>

                      @if (Request::get('action') == 'edit')
                        <input type="file" name="post_image" placeholder="Post Image"></input>
                      @else
                        <input type="file" name="post_image" placeholder="Post Image" required></input>
                      @endif
                      <br>
                      <textarea placeholder="Add the first post on your community" name="post_content"
                        required>{!! $post->post_content ?? '' !!}</textarea>

                      <div class="post-footer text-right draft-btn">
                        <a href="#" onclick="form_submit_post()" class="draft-btn">Save as a draft</a>
                        @if (Request::get('action') == 'edit')
                          <button type="submit" class="post-btn">Upate</button>
                        @else
                          <button type="submit" class="post-btn">Post</button>
                        @endif
                      </div>
                      </form>
                      <h2 style="font-size: 1.2rem;">All Posts in this community</h2>
                      <div class="container" style="border: 1px solid rgb(196, 196, 196); margin-top: 15px;">
                        @if (isset($all_post[0]))
                          @foreach ($all_post as $item)
                            <div class="row" style="padding: 1rem;">
                              <div class="col-md-8">
                                <span style="font-size: 14px;">{{ $item->post_date }}</span><br>
                                <img src="{{ asset('we/images/' . $item->post_image) }}" height="40" width="40" alt="">
                                <soan>{{ $item->post_title }}</soan>
                                <p style="font-size: 14px;">Likes: {{ $item->like_count }}</p>
                              </div>
                              <div class="col-md-2">
                                <a href="{{ url('community/' . $community->id . '?action=edit&pid=' . $item->id) }}"
                                  class="btn btn-success btn-sm">Edit</a>
                                <a href="{{ url('community/' . $community->id . '?action=delete&pid=' . $item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                              </div>
                            </div>
                          @endforeach
                          @else
                          <div class="row">
                            <p style="text-align: center;">No Posts are there</p>
                          </div>
                        @endif
                      </div>  
                    </div>

                
                    {{-- POLL --}}
                    <div id="post-poll" class="tabcontent hidden">
                      <form action="{{ route('we.community_post_poll') }}" method="post" id="poll_form">
                        @csrf
                        <input type="hidden" name="community_id" id="community_id" value="{{ $community->id }}">
                        <input type="hidden" name="community_name" id="community_name" value="{{ $community->name }}">
                        <input type="hidden" name="creator_id" id="creator_id"
                          value="{{ session('FRONT_USER_LOGIN_ID') }}">
                        <input type="hidden" name="type" value="poll"></input>

                        <textarea placeholder="Add the first poll on your community" name="poll_title"></textarea>
                        <label for="poll_end_time">Poll End Time:</label>
                        <br>
                        <input type="time" name="poll_end_time" id="poll_end_time" placeholder="Poll End Time">
                        <div id="poll-options">
                          <div class="chose">
                            <input type="text" placeholder="Choice 1" name="poll_options[]"></input>
                          </div>
                          <div class="chose">
                            <input type="text" placeholder="Choice 2" name="poll_options[]"></input>
                          </div>
                        </div>
                        <a class="add-btn" id="add-btn" onclick="openit()">+</a>
                        <div class="post-footer text-right draft-btn">
                          <a href="#" onclick="form_submit_poll()" class="draft-btn">Save as a draft</a>
                          <button type="submit" class="post-btn">Post</button>
                        </div>
                      </form>

                    </div>

                    {{-- RESOURCE --}}
                    <div id="post-resource" class="tabcontent hidden">
                      <form action="{{ route('we.community_post_poll') }}" method="post" id="resource_form"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="community_id" id="community_id" value="{{ $community->id }}">
                        <input type="hidden" name="community_name" id="community_name" value="{{ $community->name }}">
                        <input type="hidden" name="creator_id" id="creator_id"
                          value="{{ session('FRONT_USER_LOGIN_ID') }}">
                        <input type="hidden" name="type" value="resource"></input>

                        <input type="text" placeholder="Title" name="resource_title" required />
                        <br>
                        Upload Image: <input type="file" name="resource_image" id="resource_image">
                        <br>
                        Upload Resource in pdf: <input type="file" name="resource_file" id="resource_file" accept=".pdf">
                        <br>
                        <textarea placeholder="Content" name="resource_content" required></textarea>
                        <div class="post-footer text-right draft-btn">
                          <a href="#" onclick="form_submit_resource()" class="draft-btn">Save as a draft</a>
                          <button type="submit" class="post-btn">Post</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="2">

                </div>

              </div>
            </div>
            <div class="col-sm-5"></div>
          </div>
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
    </div>
  </section>



  {{-- <section class="section get-the-letest">
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
  </section> --}}

  <script>
    const tablinks = document.getElementsByClassName("tablinks");
    const postContent = document.getElementById("post-content");
    for (let i = 0; i <= tablinks.length; i++) {
      tablinks[i].addEventListener('click', () => {
        if (tablinks[i].id == "post") {
          tablinks[0].classList.add("active-tabs");
          tablinks[1].classList.remove("active-tabs");
          tablinks[2].classList.remove("active-tabs");
          // console.log(postContent.children[1])
          postContent.children[0].classList.add("show");
          postContent.children[0].classList.remove("hidden");
          postContent.children[1].classList.add("hidden");
          postContent.children[1].classList.remove("show");
          postContent.children[2].classList.add("hidden");
          postContent.children[2].classList.remove("show");
        } else if (tablinks[i].id == "poll") {
          tablinks[1].classList.add("active-tabs");
          tablinks[0].classList.remove("active-tabs");
          tablinks[2].classList.remove("active-tabs");
          postContent.children[0].classList.remove("show");
          postContent.children[0].classList.add("hidden");
          postContent.children[1].classList.add("show");
          postContent.children[1].classList.remove("hidden");
          postContent.children[2].classList.add("hidden");
          postContent.children[2].classList.remove("show");
        } else {
          tablinks[2].classList.add("active-tabs");
          tablinks[1].classList.remove("active-tabs");
          tablinks[0].classList.remove("active-tabs");
          postContent.children[0].classList.remove("show");
          postContent.children[0].classList.add("hidden");
          postContent.children[1].classList.remove("show");
          postContent.children[1].classList.add("hidden");
          postContent.children[2].classList.add("show");
          postContent.children[2].classList.remove("hidden");
        }
      })
    }
    // if (tablinks[1].clicked) {
    //     const plusBtn = document.getElementById("add-btn");
    //     const postPoll = document.getElementById("post-poll");
    //     const choose = document.getElementsByClassName("chose")[0];

    //     plusBtn.addEventListener('click', () => {
    //         postPoll.insertBefore(choose, postPoll.childNodes[3])
    //     })
    // }
    function openit() {
      const plusBtn = document.getElementById("add-btn");
      const postPoll = document.getElementById("post-poll");
      const choose = document.getElementsByClassName("chose");
      const pollOption = document.getElementById("poll-options");
      var number = 3;
      let node = document.createElement("div")
      node.classList.add("chose")
      let inputTag2 = document.createElement("input")
      inputTag2.type = "text"
      inputTag2.placeholder = "Your Option";
      inputTag2.name = "poll_options[]";
      node.appendChild(inputTag2)
      pollOption.appendChild(node)
      number = number + 1;
    }

    // For post draft
    function form_submit_post() {
      let html = `<input type="hidden" name="status" id="status" value="0">`;
      $("#post_form").append(html);
      $("#post_form").submit();
    }

    // For poll draft
    function form_submit_poll() {
      let html = `<input type="hidden" name="status" id="status" value="0">`;
      $("#poll_form").append(html);
      $("#poll_form").submit();
    }

    // For resource draft
    function form_submit_resource() {
      let html = `<input type="hidden" name="status" id="status" value="0">`;
      $("#resource_form").append(html);
      $("#resource_form").submit();
    }
  </script>
@endsection


<!-- eof #box_wrapper -->
<!--</div>-->
<!-- eof #canvas -->
