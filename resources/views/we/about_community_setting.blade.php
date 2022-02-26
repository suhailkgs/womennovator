@extends('we.layouts.layout') @section('front_content')
  <div class="community-banner" style="background: white !important;">
    <div class="container">
      <div class="row">
        <div class="col-sm-9">
          <div class="community-ban-cintent">
            <div>
              <h3>About the community</h3>
              <hr style="background: black; width: 40%;">
              <br>
              {{ $about->about }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <section class="section get-the-letest">
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
  </section>
@endsection

<!-- eof #box_wrapper -->
<!--</div>-->
<!-- eof #canvas -->
