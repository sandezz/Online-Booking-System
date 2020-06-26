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
              <h3 class="panel-title">{{ $physio[0]->user->name }}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                @if($physio[0]->user->photo)
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="{{ asset('images/'.$physio[0]->user->photo) }}" class="img-circle img-responsive"> </div>
                @endif
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>username:</td>
                        <td>{{ $physio[0]->user->username}}</td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td>{{ $physio[0]->user->dob}}</td>
                      </tr>
                         
                      <tr>
                        <td>Gender</td>
                        <td>{{ $physio[0]->user->gender}}</td>
                      </tr>

                        <tr>
                        <td>Address</td>
                        <td>{{ $physio[0]->user->address}}</td>
                      </tr>

                      <tr>
                        <td>Email</td>
                        <td>{{ $physio[0]->user->email}}</td>
                      </tr>
                      <tr>
                        <td>Phone Number</td>
                        <td>{{ $physio[0]->user->contact}}
                          </td>
                   </tr>
                   <tr>
                       <td>Qualificaton</td>
                        <td>{{ $physio[0]->qualification}}
                        </td>
                      <tr>
                        <td>Description</td>
                        <td>{{ $physio[0]->description}}</td>
                      </tr>
                    </tr>

                    </tbody>
                  </table>
                 
                  <a href="javascript: history.go(-1)" class="btn btn-default  btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp; Go Back</a>
                   <a href="{{ url('/update_physio/'.$physio[0]->physio_id)}}" class="btn btn-warning btn-sm">Edit</a>
        @if($physio[0]->user->status == 1)
             <a href="{{ url('/block_user/'.$physio[0]->user->id)}}" class="btn btn-info btn-sm" onclick="  return confirm('Are you sure you want to block this user?')">Block</a>
          @else
             <a href="{{ url('/unblock_user/'.$physio[0]->user->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to unblock this user?')">unblock</a>
             @endif

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection