
@extends('backEnd.layouts.layout') @section('admin_content')
<!-- container -->
<div class="container-fluid">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <h4 class="content-title mb-2">Hi, welcome back!</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <!--<li class="breadcrumb-item"><a href="#">Dashboard</a></li>-->
                    <li class="breadcrumb-item active" aria-current="page">Career</li>
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
                               Add Career
                         
                            </div>
                            <form method="post" action="{{ route('careerpage.store')}}" enctype="multipart/form-data">
                                @csrf
                                @component('backEnd.components.alert')

                                @endcomponent
                 
                                @include('backEnd.careerpage.form')
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