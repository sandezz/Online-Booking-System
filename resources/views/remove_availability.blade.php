
@extends( 'layouts.header-footer')

@section('content')
    <div class="container content">
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading ">Remove Availability</div>
                        <div class="panel-body">
                            <p>Please manage your Availability here:</p>
                        </div>
                        <br>
                        <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                        <div class="table-responsive">
                            <table class="table table-striped datatable">
                            <thead class="thead-light">
                                <tr class="info">
                                    <th scope="col">Unavailable Date</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($availability as $a)
                                <tr>
                                
                                <td>{{ $a->unavailable_date }}</td>
                                <td></td>
                                <td></td>
                                <td>
                                    @if ($a->unavailable_date > date('Y-m-d'))
                                        <a href="delete_availability\<?php echo $a->id; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
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



