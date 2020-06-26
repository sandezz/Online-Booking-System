@extends( 'layouts.header-footer')

@section('content')

<div class="container content">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            @if(isset($physio))
            <div class="panel panel-info">
                <div class="panel-heading">Update Doctors</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/save_update_physio/<?php echo $physio[0]->physio_id; ?>" enctype="multipart/form-data">
                        {{ csrf_field() }}

                                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Full Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$physio[0]->user->name) }}" required autofocus>
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
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username',$physio[0]->user->username) }}" required autofocus>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email',$physio[0]->user->email) }}" required>

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
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address',$physio[0]->user->address) }}" required>

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
                               
                                <input name="gender" type="radio" value="male" {{ old('gender',$physio[0]->user->gender) == 'male' ? 'checked="checked"' : '' }}>&nbsp; Male &nbsp;

                                <input name="gender" type="radio" value="female" {{ old('gender',$physio[0]->user->gender) == 'female' ? 'checked="checked"' : ''}}>&nbsp; Female

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
                                <input id="contact" type="text" class="form-control" name="contact" value="{{ old('contact',$physio[0]->user->contact) }}" required>
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
                                <input id="dob" type="text" class="form-control" name="dob" value="{{ old('dob',$physio[0]->user->dob) }}" required>
                                @if ($errors->has('dob'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description', $physio[0]->description) }}" required autofocus>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('qualification') ? ' has-error' : '' }}">
                            <label for="qualification" class="col-md-4 control-label">Qualification</label>

                            <div class="col-md-6">
                                <input id="qualification" type="text" class="form-control" name="qualification" value="{{ old('qualification', $physio[0]->qualification) }}" required>
                                @if ($errors->has('qualification'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('qualification') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                    @if($physio[0]->user->photo)
                    <img src= "{{ asset('images/'.old('old_image', $physio[0]->user->photo)) }}" class="img-circle img-responsive col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4">
                    <div class="clearfix"></div>
                         <input type="hidden" name="old_image" value='{{ $physio[0]->user->photo}}'/>
                   @endif
                       <div class="form-group">
                            <label for="image" class="col-md-4 control-label">change Profile picture</label>

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
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
