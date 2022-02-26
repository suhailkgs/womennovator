@extends('frontEnd.layout.layout')

@section('frontend_content')


<!-- main-signin-wrapper -->
<div class="my-auto page page-h" >
    <div class="main-signin-wrapper col-lg-12" style="float:center;padding:right;">
    <img src="{{ url('backEnd/img/login.png')}}" style="width: 40%;height: 40%;" class="main-logo">
        
            
            <div class="p-4 wd-md-100p col-lg-4" style="float:right;">
                <div class="main-signin-header">
                  <!-- <h2><img src="{{ url('backEnd/img/0km.png')}}" style="width: 30%;height: 70%;" class="main-logo"></h2>
                   -->
                   <h4>Find Your Account.</h4><br/>
                 <div>
    @if(session()->has('success'))
    <div class="alert alert-success">
        @if(is_array(session()->get('success')))
        @foreach (session()->get('success') as $message)
        <p>{{ $message }}</p>
        @endforeach
        @else
        <p>{{ session()->get('success') }}</p>
        @endif
    </div>
    @endif
    @if(session()->has('statuss'))
    <div class="alert alert-danger">
      @if(is_array(session()->get('statuss')))
      @foreach (session()->get('statuss') as $message)
          <p>{{ $message }}</p>
      @endforeach
      @else
          <p>{{ session()->get('success') }}</p>
      @endif
    </div>
@endif
    <div>
        <ul>
            @foreach ($errors->all() as $e)
            <li style="color:red;">{{$e}}</li>
            @endforeach
        </ul>
    </div></div>
                   <hr style="background-color:purple">
                    <form method="POST" action="{{ url('buyers/forget/store') }}">
                        @csrf

                        <div class="form-group">
                            <label>{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control form-rounded @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Enter your email" style="border-color:black;">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                      
                        <button type="submit" class="btn btn-primary" role="button">Submit</button>
                    </form>
                </div>
                {{-- <div class="main-signin-footer mt-3 mg-t-5">
                    <p>   @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif</p>
                   <!-- <p>Don't have an account? <a href="signup.html">Create an Account</a></p> -->
                </div> --}}
            </>
        
    </div>
</div>
                
<!-- /main-signin-wrapper -->

@endsection
