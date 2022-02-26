@extends('we.layouts.layout') @section('front_content')
	
 <div class="community-banner incubation-banner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                        
                        <div class="community-ban-cintent">
                            <div class="female-user">
                                <img src="images/femail-img-wt.png">
                            </div>
                            <div class="female-user-content">
                                <h2>Womennovator Incubation <br>Programme 2022</h2>
                                <ul class="communi-list">
                                    <li>Get your startup incubated with award winning teams that’ve led 100s of early stage startups through Angel and Series A rounds. </li>
                                </ul>
                            </div>
                            </div>
                            <nav class="comunity-nav">
                                <ul>
                                    <li><a  href="{{ url('we/incubation') }}">Home</a></li>
                                    <li><a class="active" href="{{ route('incubation.success')}}">Success Stories</a></li>
                                    <li><a href="{{ url('we/incubation/about') }}">About</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!--<div class="col-sm-3">
                            <a href="#" class="join-btn">Join this community</a>
                            <div class="lead-by">
                            <p>Led by </p>
                                <div class="team-user">
                                    <a class="team-img" href="#"><img src="./images/user.jpg"></a>
                                    <div class="team-user-title">
                                        <h5>Silviya Plath</h5>
                                        <span class="sub-dis">CEO, StartupPath</span>
                                    </div>                                                
                                </div>
                            
                            </div>
                        </div>-->
                    </div>
                </div>
                
                
</div>
<section class="success-story-section">
    <center>
        <strong>
            <h1 class="story-heading">
                SUCCESS STORIES
            </h1>
        </strong>
    </center>

    <div class="success-story-cards">
        <div class="story-card-row1">
            @foreach ($stories as $story)
            <div class="story-card">
                <center>
                    <div class="story-img">
                        <img src="{{asset('backEnd/image/success_stories/'.$story->image)}}" alt="success-story">
                    </div>
                </center>
                <center>
                    <p class="story-name">{{$story->name}}</p>
                </center>
                <div class="story-desc display-flex">
                    <div class="left-sec">
                        <div class="story-timeline">
                            <div></div>
                            <div class="my-2"></div>
                            <div class="my-5"></div>
                        </div>
                    </div>
                    <div class="right-sec">
                        <div class="story-desc1">
                            <p>{{$story->designation}}</p>
                        </div>
                        <div class="story-desc2">
                            <p>{{$story->company}}</p>
                        </div>
                        <div class="story-desc3">
                            <strong>
                                <p style="line-height:normal;">"{{$story->industry}}"</p>
                            </strong>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
            <!-- card 2 -->
            {{-- <div class="story-card">
                <center>
                    <div class="story-img">
                        <img src="Lakshmi-Gupta.png" alt="">
                    </div>
                </center>
                <center>
                    <p class="story-name">Lakshmi Dutta Gupta</p>
                </center>
                <div class="story-desc display-flex">
                    <div class="left-sec">
                        <div class="story-timeline">
                            <div></div>
                            <div class="my-2"></div>
                            <div class="my-5"></div>
                        </div>
                    </div>
                    <div class="right-sec">
                        <div class="story-desc1">
                            <p>Founder, Lakshya</p>
                        </div>
                        <div class="story-desc2">
                            <p>Clothing and Accessories</p>
                        </div>
                        <div class="story-desc3">
                            <strong>
                                <p>"Helped me to understand "Go to Market Strategy" and it's methodology" </p>
                            </strong>
                        </div>
                    </div>
                </div>

            </div>
            <!-- card3 -->
            <div class="story-card">
                <center>
                    <div class="story-img">
                        <img src="Savina-Sharan.jpg" alt="">
                    </div>
                </center>
                <center>
                    <p class="story-name">Savina Sharan</p>
                </center>
                <div class="story-desc display-flex">
                    <div class="left-sec">
                        <div class="story-timeline">
                            <div></div>
                            <div class="my-2"></div>
                            <div class="my-5"></div>
                        </div>
                    </div>
                    <div class="right-sec">
                        <div class="story-desc1">
                            <p> Kidsy Winsy</p>
                        </div>
                        <div class="story-desc2">
                            <p>DIY Paper Crafts for Kids</p>
                        </div>
                        <div class="story-desc3">
                            <strong>
                                <p>"Womennovator is the God's Gift sent to me. Product Development trainings helped
                                    me to grow my work"</p>
                            </strong>
                        </div>
                    </div>
                </div>

            </div>
            <!-- card4 -->
            <div class="story-card">
                <center>
                    <div class="story-img">
                        <img src="Sarifa-Yasmin.jpeg" alt="">
                    </div>
                </center>
                <center>
                    <p class="story-name">Sarifa Yasmin Hussain</p>
                </center>
                <div class="story-desc display-flex">
                    <div class="left-sec">
                        <div class="story-timeline">
                            <div></div>
                            <div class="my-2"></div>
                            <div class="my-5"></div>
                        </div>
                    </div>
                    <div class="right-sec">
                        <div class="story-desc1">
                            <p> Kochi Foods</p>
                        </div>
                        <div class="story-desc2">
                            <p>Foods & Spices</p>
                        </div>
                        <div class="story-desc3">
                            <strong>
                                <p>"Through implementing marketing strategies for my product, it helped me to
                                    fulfill my dream to become an entrepreneur"</p>
                            </strong>
                        </div>
                    </div>
                </div>

            </div> --}}


        </div>
        {{-- <div class="story-card-row2">
            <div class="story-card">
                <center>
                    <div class="story-img">
                        <img src="Meera-Haridas.jpeg" alt="">
                    </div>
                </center>
                <center>
                    <p class="story-name">Meera Haridas</p>
                </center>
                <div class="story-desc display-flex">
                    <div class="left-sec">
                        <div class="story-timeline">
                            <div></div>
                            <div class="my-2"></div>
                            <div class="my-5"></div>
                        </div>
                    </div>
                    <div class="right-sec">
                        <div class="story-desc1">
                            <p> Verkenner Business Associates</p>
                        </div>
                        <div class="story-desc2">
                            <p>Business Consulting</p>
                        </div>
                        <div class="story-desc3">
                            <strong>
                                <p>Womennovator has curated a lot of wonderful sessions that helped me to understand
                                    practical and theoretical inputs about the startup ecosystem</p>
                            </strong>
                        </div>
                    </div>
                </div>

            </div>



            <div class="story-card">
                <center>
                    <div class="story-img">
                        <img src="pinkyJayaprakash.jpg" alt="">
                    </div>
                </center>
                <center>
                    <p class="story-name">Pinky Jayaprakash</p>
                </center>
                <div class="story-desc display-flex">
                    <div class="left-sec">
                        <div class="story-timeline">
                            <div></div>
                            <div class="my-2"></div>
                            <div class="my-5"></div>
                        </div>
                    </div>
                    <div class="right-sec">
                        <div class="story-desc1">
                            <p>JPNME Pvt. Ltd.</p>
                        </div>
                        <div class="story-desc2">
                            <p>Education</p>
                        </div>
                        <div class="story-desc3">
                            <strong>
                                <p>Learn Canvas Modal Session was taking me into various aspect of building a team,
                                    Team Management, Revenue Model and Sales tracker which Helped me to grow my
                                    business</p>
                            </strong>
                        </div>
                    </div>
                </div>

            </div>


            <div class="story-card">
                <center>
                    <div class="story-img">
                        <img src="Nidhi-Sinha.jpeg" alt="">
                    </div>
                </center>
                <center>
                    <p class="story-name">Nidhi Sinha</p>
                </center>
                <div class="story-desc display-flex">
                    <div class="left-sec">
                        <div class="story-timeline">
                            <div></div>
                            <div class="my-2"></div>
                            <div class="my-5"></div>
                        </div>
                    </div>
                    <div class="right-sec">
                        <div class="story-desc1">
                            <p> Deputy Manager (Finance), Coal India Limited</p>
                        </div>
                        <div class="story-desc2">
                            <p>Coal Industry</p>
                        </div>
                        <div class="story-desc3">
                            <strong>
                                <p>Before the session, I was not sure whether this will be positive or negative. But
                                    after attending 10 weeks program, I really felt value addition to my work and
                                    profession.</p>
                            </strong>
                        </div>
                    </div>
                </div>

            </div>

            <div class="story-card">
                <center>
                    <div class="story-img">
                        <img src="Divya-Mathur.png" alt="">
                    </div>
                </center>
                <center>
                    <p class="story-name">Divya Mathur</p>
                </center>
                <div class="story-desc display-flex">
                    <div class="left-sec">
                        <div class="story-timeline">
                            <div></div>
                            <div class="my-2"></div>
                            <div class="my-5"></div>
                        </div>
                    </div>
                    <div class="right-sec">
                        <div class="story-desc1">
                            <p>Pureza Solutions Pvt. Ltd.</p>
                        </div>
                        <div class="story-desc2">
                            <p>Healthcare</p>
                        </div>
                        <div class="story-desc3">
                            <strong>
                                <p>Thank you so much to the whole team of Womennovator for bringing a change to
                                    life, my work, my profession and to my business. </p>
                            </strong>
                        </div>
                    </div>
                </div>

            </div>
        </div> --}}
    </div>
</section>
@endsection