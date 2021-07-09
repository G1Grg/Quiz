{{-- @extends("layouts.app")

@section("title")
Register
@endsection

@section("content")
<div class="d-flex justify-content-center">
<div class="container login-reg-form">
	<div class="row">
		<div class="col-md-12">
			<h3>Register Now to Play</h3>
			<form action="{{ route('register') }}" method="POST">
				<div class="form-group">
				  <label>Full Name</label>
                  <input type="text" class="form-control" 
                    placeholder="Enter your name" name="name" value="{{ old('name') }}">
				</div>
			  <div class="form-group">
			    <label>Email address</label>
                <input type="email" class="form-control" 
                    placeholder="Enter your email" name="email" value="{{ old('email') }}">
			  </div> 
			  <div class="form-group">
			    <label>Password</label>
                <input type="password" class="form-control" 
                    placeholder="Password" name="password">
			  </div>
			  <button type="submit" class="btn btn-primary">Register</button>
			  @csrf
			</form>
			@if ($errors->any())
				{{ implode('', $errors->all(':message')) }}
			@endif
		</div>
	</div>
</div>
</div>
@endsection --}}