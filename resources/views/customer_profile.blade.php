
@extends( 'layouts.header-footer')

@section('content')

<div class="container content">
      @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{ $user[0]->name }}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                @if($user[0]->photo)
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="{{ asset('images/'.$user[0]->photo) }}" class="img-circle img-responsive"> </div>
                @endif
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>username:</td>
                        <td>{{ $user[0]->username}}</td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td>{{ $user[0]->dob}}</td>
                      </tr>
                         
                      <tr>
                        <td>Gender</td>
                        <td>{{ $user[0]->gender}}</td>
                      </tr>

                        <tr>
                        <td>Address</td>
                        <td>{{ $user[0]->address}}</td>
                      </tr>

                      <tr>
                        <td>Email</td>
                        <td>{{ $user[0]->email}}</td>
                      </tr>
                      <tr>
                        <td>Phone Number</td>
                        <td>{{ $user[0]->contact}}
                        </td>
                           </tr>
                     
                    </tbody>
                  </table>
                  <a href="javascript: history.go(-1)" class="btn btn-default  btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp; Go Back</a>
                 @if($user[0]->status == 1)
        <a href="{{ url('/block_user/'.$user[0]->id) }}" class="btn btn-info btn-sm" onclick="return confirm('Are you sure you want to block this user?')">Block</a>
          @else
             <a href="{{ url('/unblock_user/'.$user[0]->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to unblock this user?')">unblock</a>
             @endif
          
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection