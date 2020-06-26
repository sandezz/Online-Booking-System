@extends( 'layouts.header-footer')

@section('content')

<div class="container content">
      @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

<div class="row">
              <div class="col-md-12">
                <h3>Manage Counsellors</h3>
              </div>
            </div>
            
            <div class="row">
                  @foreach($physio as $p)
                <div class="col-sm-6 col-md-6 col-lg-6"> 

                    <!-- Begin Listing: 609 W GRAVERS LN-->
                    <div class="list_back">
                          <div class="col-sm-4 col-md-4 col-lg-4">
                            <a class="pull-left" href="physio_profile\<?php echo $p->physio_id; ?>" target="_parent">
                            @if($p->user->photo)
                            <img alt="image" class="img-responsive" src="{{ asset('images/'.$p->user->photo) }}">
                            @else
                            <img alt="image" class="img-responsive" src="{{ asset('images/temp.png') }}">
                            @endif
                          </a>
                      </div>

                       <div class="col-sm-8 col-md-8 col-lg-8">
                            <div class="clearfix visible-sm"></div>
                                <h4 class="media-heading">

                                  <a href="physio_profile\<?php echo $p->physio_id; ?>" target="_parent">{{ $p->user->name }}</a></h4>
                                    <p>{{ $p->qualification }}</p>

                                    <p><span class="glyphicon glyphicon-phone-alt"></span> &nbsp; {{ $p->user->contact }} </p>

                <a href="mailto:{{ $p->user->email }}"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> &nbsp; {{ $p->user->email }}</a>
                <br/>
                <br/>
        <span class="pull-right">
          <a href="update_physio\<?php echo $p->physio_id; ?>" class="btn btn-warning btn-xs">Edit</a>
        <a href="view_appointment\<?php echo $p->physio_id; ?>" class="btn btn-primary btn-xs">View Appointments</a>
        @if($p->user->status == 1)
        <a href="block_user\<?php echo $p->user->id; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to block this user?')">Block</a>
          @else
             <a href="unblock_user\<?php echo $p->user->id; ?>" class="btn btn-success btn-xs" onclick="return confirm('Are you sure you want to unblock this user?')">Unblock</a>
             @endif
        </span>
              </div>
                  </div>
                    </div>
                    @endforeach
</div>
</div>
@endsection
