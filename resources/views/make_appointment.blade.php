
@extends( 'layouts.header-footer')

@section('content')
    <div class="container content">
      @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading ">Make Appointment</div>
                   <div class="panel-body">

                      <p>Please select a Counsellor and schedule an appointment to visit:</p>

                      @if(isset($physio) &&  ! empty($physio))
                        <ul class="list-group nav-list" id="nav-list">
                          @foreach($physio as $p)
                        <li class="list-group-item physio_available" rel="{{ $p->physio_id }}" >
                          <div class="row">
                        
                         
                          <div class="col-md-2">
                          @if($p->photo)
                            <img alt="image" class="img-responsive" src="{{ asset('images/'.$p->photo) }}">
                            @else
                            <img alt="image" class="img-responsive" src="{{ asset('images/temp.png') }}">
                            @endif
                          </div>

                      
                      <div class="col-md-10">
                        
                        <h4>
                      {{ $p->name }}<br/>
                        <small class="text-muted muted_cus">{{ $p->qualification}}</small>
                      </h4>

                        <p class="mb-0">{{ $p->description }}</p>
                      </div>
                      </div>
                        </li>
                      @endforeach
                      <br/>
                      <button class="btn btn-primary pull-right" id="get_schedule">Check Availability</button>
                      </ul>
                      @else
                      <p>No record Found!
                        </p>
                        @endif
                    </div>
<br>
<div id="loading">
</div>

<div id="date_time_select">
<div id="selected_physio"></div>
<hr/>
<div class="row">
 <div id="datepicker" class="col-md-6">
</div>
<div id="time_slots" class="col-md-6">
</div>
</div>
<br>
<button class="btn btn-primary" id="back">Back</button>
<button class="btn btn-primary" id="confirm_appointment">Confirm</button>
</div>
<div> 
    </div>
        </div>
            </div>
                </div>

</div>

@endsection



