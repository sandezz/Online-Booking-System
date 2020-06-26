
@extends( 'layouts.header-footer')

@section('content')
    <div class="container content">
      @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@else
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading ">Change Availability</div>
                   <div class="panel-body">
                    <p>Please select a day you are not available:</p>
                    </div>
                    <br>
                    <div id="loading"> </div>
                    <div id="date_availability">
                      <hr/>
                      <div class="row">
                        <div id="unavailability_datepicker" class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
                        
                        </div>
                      </div>
                       <br>
                       <div class="row">
                      <button class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 btn btn-primary" id="confirm_unavailability">Confirm Unavailability </button>
                      </div>
                      <br>
                       </div>
                  <div>
                </div>
              </div>
            </div>
          </div>
          </div>
    @endif
</div>

@endsection



