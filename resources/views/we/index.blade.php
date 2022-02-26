@extends('we.layouts.layout') @section('front_content')
  <section class="top-banner">
    <div class="container">
      <div class="row justify">
        <div class="col-sm-6 to_animate" data-animation="fadeInRight" data-delay="300">
          <h2>Alone we can do little; together we can do so much.</h2>
          <p>Our deepest fear is not that we are inadequate. Our deepest fear is that we are powerful beyond measure. It
            is our light, not our darkness that most frightens us. </p>
          <a href="{{ route('we.create_community_main') }}" class="community-btn">Create a community!</a>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-5">
          <div class="banner-rt">
            <div class="row justify ">
              <div id="my-pics" class="carousel slide" data-ride="carousel"
                style="width:68vw; height: 60vh ; margin-top: 1vw;">

                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#my-pics" data-slide-to="0" class="active"></li>
                  <li data-target="#my-pics" data-slide-to="1"></li>
                  <li data-target="#my-pics" data-slide-to="2"></li>
                  <li data-target="#my-pics" data-slide-to="3"></li>
                  <li data-target="#my-pics" data-slide-to="4"></li>
                  <li data-target="#my-pics" data-slide-to="5"></li>
                </ol>

                <!-- Content -->
                <style>
                  .item img {
                    height: 55vh !important;
                    width: 35vw;
                    border-radius: 10px;

                  }

                  @media (max-width: 767px) {
                    .container {
                      justify-content: center;
                      display: block;
                    }
                  }

                  @media screen and (max-width: 430px) {
                    .item img {
                      height: 50vh !important;
                      width: 90vw;
                    }

                    .carousel-container {
                      display: block !important;
                    }

                    .carousel-indicators {
                      bottom: 0px;
                    }
                   
                    .carousel-indicators li{
                        background-color: grey;
                    } 
                    .carousel {
                      height: 60vh !important;
                    }

                    .carousel-control.left,
                    .carousel-control.right {

                      opacity: 0;

                    }

                  }

                </style>
                <div class="carousel-inner justify" style="justify-content: center;" role="listbox">

                  <!-- Slide 1 -->
                  <div class="item active ">
                    <img src="{{ url('we/Slide1.PNG') }}">
                  </div>

                  <!-- Slide 2 -->
                  <div class="item">
                    <img src="{{ url('we/Slide2.PNG') }}">
                  </div>

                  <!-- Slide 3 -->
                  <div class="item">
                    <img src="{{ url('we/Slide3.PNG') }}">
                  </div>
                  <!-- Slide 4 -->
                  <div class="item">
                    <img src="{{ url('we/Slide4.PNG') }}">
                  </div>

                  <!-- Slide 5 -->
                  <div class="item">
                    <img src="{{ url('we/Slide5.PNG') }}">
                  </div>

                  <!-- Slide 6 -->
                  <div class="item">
                    <img src="{{ url('we/Slide6.PNG') }}">
                  </div>

                </div>

                <!-- Previous/Next controls -->
                <a class="left carousel-control" href="#my-pics" role="button" data-slide="prev">
                  <span aria-hidden="true"><i class="fa-solid fa-angle-left"></i></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#my-pics" role="button" data-slide="next">
                  <span aria-hidden="true"><i class="fa-solid fa-angle-right"></i></span>
                  <span class="sr-only">Next</span>
                </a>

              </div>

              {{-- <div class="col-sm-6 to_animate" data-animation="fadeInLeft" data-delay="300">
                <div class="img-ban">
                  <img src="{{ url('we/Slide1.PNG') }}">
                </div>
              </div>
              <div class="col-sm-6 to_animate" data-animation="fadeInLeft" data-delay="300">
                <div class="img-ban">
                  <img src="{{ url('we/Slide2.PNG') }}">
                </div>
              </div>
              <div class="col-sm-6 to_animate" data-animation="fadeInLeft" data-delay="300">
                <div class="img-ban">
                  <img src="{{ url('we/Slide3.PNG') }}">
                </div>
              </div>
              <div class="col-sm-6 to_animate" data-animation="fadeInLeft" data-delay="300">
                <div class="img-ban">
                  <img src="{{ url('we/Slide4.PNG') }}">
                </div>
              </div>
              <div class="col-sm-6 to_animate" data-animation="fadeInLeft" data-delay="300">
                <div class="img-ban">
                  <img src="{{ url('we/Slide5.PNG') }}">
                </div>
              </div>
              <div class="col-sm-6 to_animate" data-animation="fadeInLeft" data-delay="300">
                <div class="img-ban">
                  <img src="{{ url('we/Slide6.PNG') }}">
                </div>
              </div> --}}

            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section bg2">
    <div class="container">
      <div class="row">
        <div class="col-sm-7 to_animate" data-animation="fadeInRight" data-delay="300">
          <div class="why-we">
            <h2>Why WE?</h2>
            <p>WE is a community focused, community driven platform to empower women entrepreneurs at grassroot level.
            </p>

            <p>We aim to create a revolution of upskilling, elevating, connecting and comunion for the “other” half of the
              population.</p>

            <p>Join the revolution.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-6 col-sm-3 to_animate" data-animation="fadeInUp">
          <div class="why-inr-box">
            <img src="{{ url('we/images/Lead-a-community.jpg') }}">
          </div>
          <div class="inr-box-content">
            <h2>Lead a Community</h2>
          </div>
        </div>
        <div class="col-xs-6 col-sm-3 to_animate" data-animation="fadeInUp">
          <div class="why-inr-box">
            <img src="{{ url('we/images/Incubate-your-startup.jpg') }}">
          </div>
          <div class="inr-box-content">
            <h2>Incubate Your Startup</h2>
          </div>
        </div>
        <div class="col-xs-6 col-sm-3 to_animate" data-animation="fadeInUp">
          <div class="why-inr-box">
            <img src="{{ url('we/images/virtual-shop.jpeg') }}">
          </div>
          <div class="inr-box-content">
            <h2>Create a Virtual Shop</h2>
          </div>
        </div>
        <div class="col-xs-6 col-sm-3 to_animate" data-animation="fadeInUp">
          <div class="why-inr-box">
            <img src="{{ url('we/images/upskill.jpg') }}">
          </div>
          <div class="inr-box-content">
            <h2>Upskill</h2>
          </div>
        </div>
      </div>


    </div>
  </section>

  <section class="section join-communuty">
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          <h2>Join a community</h2>
          <p>For women, by anyone.</p>
        </div>
        <div class="col-sm-4">
          <div class="text-right"><a class="view-all" href="#">View all</a></div>
        </div>
      </div>
      <div class="row flex-sec">
        @foreach ($communities as $community)
          <div class="col-sm-3 to_animate min-width" data-animation="fadeInUp">
            <a href="{{ url('community/' . $community->id) }}">
              <div class="community-box">
                @if (!empty($community->tag))
                  :
                  <div class="start-up">{{ $community->tag }}</div>
                @endif
                <h3>{{ \Illuminate\Support\Str::limit($community->name, 20, '...') }}</h3>
                <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $community->city }},
                  {{ $community->country }}
                </p>
                <br>
                <br>
                <p><i class="fa fa-globe" aria-hidden="true"></i> {{ $community->followers }} Followers</p>
                <p><i class="fa fa-star" aria-hidden="true"></i> Led by</p>
                <div class="comu-user"><img
                    src="{{ asset('backEnd/image/community_image/' . $community->logo) }}">
                  {{ $community->led_by }}</div>
              </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <section class="section join-communuty bg-yellow to_animate" data-animation="fadeInUp">
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          <h2>Latest Resources</h2>
        </div>
        <div class="col-sm-4">
          <div class="text-right"><a class="view-all" href="{{ url('/we/blog') }}">View all</a></div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="slider">
            @foreach ($blogs as $blog)
              <div class="slick-slideshow__slide">
                <div class="latest-res-box">
                  <center>
                    <div class="res-box-img">
                      <img src="{{ asset('backEnd/image/blog_image/' . $blog->image) }}" alt="">
                    </div>
                  </center>
                  <a href="{{ url('blog/' . $blog->id) }}">
                    <h3>{{ $blog->name }}</h3>
                  </a>
                  <p>by {{ $blog->author_name }}</p>
                  <p>
                    <span class="post_info_date search">{!! substr($blog->description, 0, 100) !!}...

                      <a href="{{ url('/blog/' . $blog->id) }}" style="color:#be9656;" class="prev_button">Read
                        More<i class="fa fa-angle-double-right"></i></a>
                  </p>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section join-communuty to_animate" data-animation="fadeInUp">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2>Our Backers</h2>
        </div>
        <div class="col-sm-12">
          <div class="backers">

            <div class="bac-logo">
              <img src="{{ url('we/images/backers/guftagu-cafe-final.jpg') }}">
            </div>
            <div class="bac-logo">
              <img src="{{ url('we/images/backers/Inq-Innovation.jpg') }}">
            </div>
            <div class="bac-logo">
              <img src="{{ url('we/images/backers/Invest-India.png') }}">
            </div>
            <div class="bac-logo">
              <img src="{{ url('we/images/backers/anantaya-decor.png') }}">
            </div>
            <div class="bac-logo">
              <img src="{{ url('we/images/backers/Arrow-PC.jpeg') }}">
            </div>
            <div class="bac-logo">
              <img src="{{ url('we/images/backers/bk.png') }}">
            </div>
            <div class="bac-logo">
              <img src="{{ url('we/images/backers/CEPRlogo-4.png') }}">
            </div>
            <div class="bac-logo">
              <img src="{{ url('we/images/backers/Cisne.jpeg') }}">
            </div>
            <div class="bac-logo">
              <img src="{{ url('we/images/backers/Consulate-National-Emb(VM)-1.jpg') }}">
            </div>
            <div class="bac-logo">
              <img src="{{ url('we/images/backers/DCMSME.jpg') }}">
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!--  <section class="section get-the-letest to_animate" data-animation="fadeInRight">
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
