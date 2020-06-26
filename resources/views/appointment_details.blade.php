@extends( 'layouts.header-footer')
@section('content')
<?php //var_dump($physio); ?>
<div class="container content">
      @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif


 <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Appointment Details</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>

                      <tr>
                        <td>Counsellor's Name:</td>
                        <td>{{ $app[0]->physio_name}}</td>
                      </tr>

                      <tr>
                        <td>Client's Name</td>
                        <td>{{ $app[0]->customer_name }}</td>
                      </tr>
                         
                      <tr>
                        <td>Appointment Date</td>
                        <td>{{ $app[0]->appointment_date}}</td>
                      </tr>

                      <tr>
                        <td>Appointment Time</td>
                        <td>{{ $app[0]->appointment_time}}</td>
                      </tr>
                      <tr>
                        <td>Status</td>
                        <td>
                               @if($app[0]->status == 1)
                 <span class="label label-success">Active</label>
                  @else
                <span class="label label-danger">Cancelled</span>
                @endif
                  </td>
                      </tr>

                 @if($app[0]->status == 1)      
					       	<tr>
                        <td>Remarks</td>
                      @if(session('user') == 'physio' )
                      <td>
                      <form class="form-horizontal" method="POST" action="{{ url('update_appointment/'.$app[0]->id) }}">
                        {{ csrf_field() }}
                         <textarea class="form-control" name="remarks">{{$app[0]->remarks}}</textarea> 
 						           <br/>
                                <button type="submit" class="btn btn-primary">
                                    Save Remarks
                                </button>
                    </form>
               		 </td>
                      @else
                        <td>{{ $app[0]->remarks}}</td>
                      @endif
                     </tr>
                    @endif
                    </tbody>
                  </table>
                  <a href="javascript: history.go(-1)" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp; Go Back</a>
                </div>
              </div>
            </div>
          </div>

	</div>
@endsection

