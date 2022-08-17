@extends('layouts.app')
@section('content')
<section class="form">
            <div class="container">
                <div class="form-content">
                    <div class="form-form">
                        <h2 class="form-title" style="color:#008B8B">Register</h2>
                         <form method="POST" action="{{ route('register') }}">
                          @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"class=" @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus />

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" class=" @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus/>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" placeholder="Your Password" class=" @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                           
                                <input id="password-confirm" placeholder="Confirm Password" type="password" name="password_confirmation" required autocomplete="new-password">
                           
                        </div>
                          
                            <div class="form-group form-button">
                                <input type="submit" name="form" style="background-color:#008B8B;color:white;" id="form" class="btn ntn-info" value="Register"/>
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