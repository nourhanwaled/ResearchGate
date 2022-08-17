@extends('layouts.app')

@section('content')
    <div class="main">
        <!-- Sign up form -->
        <section class="form">
            <div class="container" style="background-color:white;margin-top:50px;border-radius: 15px">
                <div class="form-content">
                    <div class="form-form">
                        <h2 class="form-title" style="color:#008b8b;text-align:center;padding-top:30px">Edit profile</h2>
                        <h3>{{$user->name}}</h3>
                        <form method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data" >
                         @csrf
                         @method('PUT')
                            <div class="form-group">
                                <label for="country"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input id="country" type="text" value="{{$user->profile->country}}" class="form-control @error('name') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="university"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input id="university" type="text" value="{{$user->profile->university}}" class="form-control @error('university') is-invalid @enderror" name="university" value="{{ old('university') }}" required autocomplete="university" autofocus>
                                @error('university')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="department"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input id="department" type="text" value="{{$user->profile->department}}" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}" required autocomplete="department" autofocus>
                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="facebook"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input id="facebook" type="text" value="{{$user->profile->facebook}}" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ old('facebook') }}" required autocomplete="facebook" autofocus>
                                @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="photo"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input id="photo" type="file" value="{{$user->profile->photo}}" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" required autocomplete="photo" autofocus>
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                            <textarea class="form-control" name="info" rows="3">
                            {{$user->profile->info}}
                            </textarea>
                                 @error('info')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                 <div class="form-group">
	             <input type="submit" style="background-color:#008B8B;color:white;margin-bottom:20px;" class="btn ntn-info"value="update">
                </div>

                        </form>
                    </div>
                   
                </div>
            </div>
        </section>

                 </div>
                </div>
            </div>
        </section>

    </div>

 @endsection

