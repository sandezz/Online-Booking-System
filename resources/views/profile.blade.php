@extends( 'layouts.header-footer')

@section('content')

<div class="container content">

      @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

      <section class="hero-section spad">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-10 offset-xl-1">
					<div class="row">
						<div class="col-lg-8">
							<div class="hero-text">
								<h4>Hi, {{ $user[0]->name }}</h4>
								<p></p>
							</div>
							<div class="hero-info">
								<h2>General Information</h2>
								<ul>
									<li><span>Name</span>{{ $user[0]->name}}</li>
									<li><span>Username</span>{{ $user[0]->username}}</li>
									<li><span>Gender</span>{{ $user[0]->gender}}</li>
									<li><span>Date of Birth</span>{{ $user[0]->dob}}</li>
									<li><span>Address</span>{{ $user[0]->address}}</li>
									<li><span>Email</span>{{ $user[0]->email}}</li>
									<li><span>Phone </span>{{ $user[0]->contact}}</li>
								</ul>
							<a href="{{ route('update_profile') }}" class="btn btn-primary">Edit Profile</a>
							<a href="{{ route('change_password') }}" class="btn btn-primary">Change Password</a>
							</div>
						</div>
						<div class="col-lg-4">
            @if($user[0]->photo)
							<figure class="hero-image">
								<img src="{{ asset('images/'.$user[0]->photo) }}" alt="user image">
							</figure>
            @endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection