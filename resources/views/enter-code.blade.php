@extends("layouts.app")

@section("title")
Enter Code to Play
@endsection

@section("content")

<div class="d-flex justify-content-center">
	<div class="container login-reg-form">
		<div class="row">
			<div class="col-md-12">
				<h3 style="text-align: center">Enter Quiz Play Code</h3>
				<form action="{{ route("playCustomQuizPost") }}" method="POST" style="text-align: center">
						<div class="enter-code">
							<input type="text" name="play_code" placeholder="Enter a Code to play the quiz" required="required">
						</div>
						@if($not_valid)
						 <p>Code is not valid...</p>
						 @endif
						@csrf
						<button class="btn btn-md btn-danger"> Play Now</button>
					</form>
			</div>
		</div>
	</div>
</div>
@endsection