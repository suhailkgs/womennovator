@extends('backEnd.layouts.layout') @section('admin_content')
  <!-- container -->
  <div class="container-fluid">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
      <div>
        <h4 class="content-title mb-2">Hi, welcome back!</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Project</li>
          </ol>
        </nav>
      </div>

    </div>
    <!-- /breadcrumb -->
    <!-- main-content-body -->
    <!-- row -->
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="main-content-label mg-b-5">
              Edit Partner
            </div>
            @if (Request::get('pending'))
              <form method="post" action="{{ url('/admin/partner/'. $partner->id.'?pending=true') }}" enctype="multipart/form-data">
              @else
                <form method="post" action="{{ route('partner.update', $partner->id) }}" enctype="multipart/form-data">
            @endif

            @method('PATCH')
            @csrf
            @component('backEnd.components.alert')
            @endcomponent

            @include('backEnd.partner.form')
            </form>
          </div>
        </div>
      </div>

    </div>
    <!-- /row -->

    <!-- /row -->
  </div>
  <!-- /container -->
  </div>
  <!-- /main-content -->
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
  //jQuery.noConflict();
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        jQuery('#profile-img-tag').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  jQuery("#profile-img").change(function() {
    readURL(this);
  });
</script>

<script>
  $(document).ready(function() {
    $("#state").change(function(e) {
      e.preventDefault();
      console.log("yes");
      let state_id = $('#state').val();
      let _token = $('input[name=_token]').val();
      $.ajax({
        type: "post",
        url: "{{ url('/admin/get_cities') }}",
        data: {
          _token,
          state_id
        },
        success: function(result) {
          $('#city').html(result);
        }
      });
    });
  });
</script>
