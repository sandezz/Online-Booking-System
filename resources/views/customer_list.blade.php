@extends( 'layouts.header-footer')

@section('content')

<div class="container content">
      @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
<div class="table-responsive">
<table class="table table-striped datatable">
  <thead class="thead-light">
     <tr class="info">
    	<th scope="col">Name</th>
    	<th scope="col">Username</th>
    	<th scope="col">Address</th>
    	<th scope="col">Email</th>
    	<th scope="col">Gender</th>
    	<th scope="col">Date of Birth</th>
    	<th scope="col">Contact</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  	@foreach($customer as $c)
  	<tr>
    
    <td><a href="<?php echo 'customer_profile/'.$c->id; ?>">{{ $c->name }}</td>
    <td>{{ $c->username }}</td>
    <td>{{ $c->address }}</td>
    <td>{{ $c->email }}</td>
    <td>{{ $c->gender }}</td>
    <td>{{ $c->dob }}</td>
    <td>{{ $c->contact }}</td>
    <td>

      <a href="<?php echo 'customer_profile/'.$c->id; ?>" class="btn btn-primary btn-xs">View Profile </a>
        @if($c->status == 1)
        <a href="block_user\<?php echo $c->id; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to block this user?')">Block</a>
          @else
             <a href="unblock_user\<?php echo $c->id; ?>" class="btn btn-success btn-xs" onclick="return confirm('Are you sure you want to unblock this user?')">unblock</a>
             @endif
   </td>
</tr>
@endforeach
  </tbody>
</table>

</div>

</div>


@endsection
