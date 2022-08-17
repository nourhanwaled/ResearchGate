@extends('layouts.app')
@section('content')
<section class="form">
            <div class="container">
                <div class="form-content">
                    <div class="form-form">
                        <h2 class="form-title" style="color:#008B8B">Login</h2>
                         <form method="POST" action="{{ route('login') }}">
                          @csrf
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"class=" @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus />

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="password" name="password" id="password" placeholder="Your Password" class=" @error('password') is-invalid @enderror" value="{{ old('password') }}" required autocomplete="password" autofocus/>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                                    
                            <div class="form-group form-button">
                                <input type="submit" name="form" style="background-color:#008B8B;color:white;" id="form" class="btn ntn-info" value="Login"/>
                            </div>
                            <div class="form-group row mb-0">
                        
                                @if (Route::has('password.request'))
                                    <a style="text-decoration:none;color:#088B8B" class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif    
                        </div>
                        </form>
                    </div>
                    <div class="form-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                      
                    </div>
                </div>
            </div>
        </section>
@endsection