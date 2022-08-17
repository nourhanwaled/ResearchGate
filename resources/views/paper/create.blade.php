@extends('layouts.app')

@section('content')
    <div class="main">
        <!-- Sign up form -->
        <section class="form">
            <div class="container" style="background-color:white;margin-top:50px;border-radius: 15px">
                <div class="form-content">
                    <div class="form-form">
                        <h2 class="form-title" style="color:#008b8b;text-align:center;padding-top:30px">Upload Paper</h2>
                        <form method="POST" action="{{route('paper.store')}}" enctype="multipart/form-data">
                         @csrf
                         @method('PUT')
                            <div class="form-group">
                                <label for="title"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input id="title" type="text" placeholder="Title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input id="category" type="text" placeholder="Category" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category" autofocus>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                           
                            <div class="form-group">
                            <label style="color:#008B8B;font-weight:bold"> Description </label>
                            <textarea class="form-control" name="description" rows="3">
                            </textarea>
                                 @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                            </div>

                            <div class="form-group">  
                            <label style="color:#008B8B;font-weight:bold"> Choose participations </label>
                            <select id="tags" name="users[]" multiple="multiple" class="form-control" > 
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                           </select>
                            </div>

                            <div class="form-group">
                                <label for="file"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input id="file" type="file" placeholder="File" class="form-control @error('file') is-invalid @enderror" name="file">
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                 <div class="form-group">
	             <input type="submit" style="background-color:#008B8B;color:white;margin-bottom:20px;" class="btn ntn-info"value="Upload">
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

