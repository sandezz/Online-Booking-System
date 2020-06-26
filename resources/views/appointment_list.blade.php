
@extends( 'layouts.header-footer')

@section('content')
<div class="container content">
      @if(Session::has('message'))
      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
      @endif
      <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading ">All Appointments</div>
                        <div class="panel-body">
                            <p>Please view/manage Appointments here:</p>
                        </div>
                        <br>
                        <div class="row">
                        <div class="col-md-10 col-md-offset-2">


      <div class="table-responsive">
      <table class="table table-striped datatable">
        <thead class="thead-light">
          <tr class="info">
            <th scope="col">Counsellor's Name</th>
            <th scope="col">Client's Name</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Status</th>
            <th scope="col">Remarks</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($physio as $p)
          <td>{{ $p->physio_name }}</td>
          <td>{{ $p->customer_name }}</td>
          <td>{{ $p->appointment_date }}</td>
          <td>{{ $p->appointment_time }}</td>
            @if(($p->status == 1) && ($p->appointment_date > date('Y-m-d')))
            <td> <span class="label label-success">Active</label></td>
            
            @elseif ($p->status != 1)
            <td><span class="label label-danger">Canceled</span></td>
            @else
            
            <!-- if (($p->status == 1) && ($p->appointment_date <= date('Y-m-d')) && ($p->appointment_time) <= date('H:i', time()+36000))
            -->
            <td><span class="label label-success">Completed</span></td>
            @endif
          <td>{{ $p->remarks}}</td>
          <td>
              <a href="{{ url('/appointment_details/'.$p->id) }}" class="btn btn-primary btn-sm">View</a>
                @if(($p->status == 1) && ($p->appointment_date > date('Y-m-d')))
                @if(session('user')!='physio')

              <a href="cancel_appointment\<?php echo $p->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to cancel this appointment?');">Cancel</a>
              @endif
              @endif
          </td>
      </tr>
      @endforeach
        </tbody>
      </table>

      </div>
      </div>
                            
                    </div>
                            </div>
                            
                    </div>
                    </div>
                </div>
            </div>
</div>
@endsection
