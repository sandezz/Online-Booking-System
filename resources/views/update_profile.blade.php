@extends( 'layouts.header-footer')

@section('content')

<div class="container content">
    @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(isset($user))
            <div class="panel panel-info">
                <div class="panel-heading">Update Profile</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/save_updated_profile/" enctype="multipart/form-data">
                        {{ csrf_field() }}

                             <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Full Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$user[0]->name) }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username',$user[0]->username) }}" required autofocus>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email',$user[0]->email) }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address',$user[0]->address) }}" required>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="contact" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                               
                                <input name="gender" type="radio" value="male" {{ old('gender',$user[0]->gender) == 'male' ? 'checked="checked"' : '' }}>&nbsp; Male &nbsp;

                                <input name="gender" type="radio" value="female" {{ old('gender',$user[0]->gender) == 'female' ? 'checked="checked"' : ''}}>&nbsp; Female

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                            <label for="contact" class="col-md-4 control-label">Contact</label>
                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control" name="contact" value="{{ old('contact',$user[0]->contact) }}" required>
                                @if ($errors->has('contact'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
  
                      <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <label for="dob" class="col-md-4 control-label">Date of Birth</label>

                            <div class="col-md-6">
                                <input id="dob" type="text" class="form-control" name="dob" value="{{ old('dob',$user[0]->dob) }}" required>
                                @if ($errors->has('dob'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    

                         @if($user[0]->photo)

                           <img src= "{{ asset('images/'.old('old_image', $user[0]->photo)) }}" class="img-circle img-responsive col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4">
                    <div class="clearfix"></div>
                         <input type="hidden" name="old_image" value='{{ $user[0]->photo}}'/>
                   @endif
                       <div class="form-group">
                            <label for="image" class="col-md-4 control-label">Change Profile picture</label>

                            <div class="col-md-6">
                               <input type="file" name="image" />
                                  @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                     
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><br><br>
            @endif

        </div>
    </div>
</div>
@endsection
