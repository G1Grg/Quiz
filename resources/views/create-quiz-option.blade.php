@extends("layouts.app")

@section("title")
Create options
@endsection

@section("content")
<div class="container">
	<div class="row">
		<div class="col-md-12 mb-5">
		
			<div id="instructions">
				<h3>Please enter options for the questions that were created</h3>
				<h5>Insert value as 1 for correct option and 0 for all case otherwise</h5>
			</div>

			@foreach($questions as $key => $qstn)
				<form action="{{ route("saveQuestionOption", $unique_id) }}" @if(!$qstn->questionoptions->isEmpty()) class="hidden" @endif>
					<p> #{{ $key+1 }}. {{ $qstn->question }} </p>
					<input type="hidden" value="{{ $qstn->id }}" name="question_id" required>
					<div class="form-control">
				    	<input type="text" class="form-control" name="option1" placeholder="First Option" required>
					</div>
					<div class="form-control">
				    	<input type="text" class="form-control" name="is_correct1" value="0" required>
				    </div>
					<div class="form-control">
				    	<input type="text" class="form-control" name="option2" placeholder="Second Option" required>
				    </div>
				    	<div class="form-control">
				    	<input type="text" class="form-control" name="is_correct2" value="0" required>
					</div>
					<div class="form-control">
				    	<input type="text" class="form-control" name="option3" placeholder="Third Option" required>
				    </div>
				    	<div class="form-control">
				    	<input type="text" class="form-control" name="is_correct3" value="0" required>
					</div>
					<div class="form-control">
				    	<input type="text" class="form-control" name="option4" placeholder="Forth Option" required>
					</div>
					<div class="form-control">
				    	<input type="text" class="form-control" name="is_correct4" value="0" required>
				    </div>
					@csrf
					<button class="btn btn-md btn-primary">Save Options </button>
					<hr>
					<br>
				</form>
			@endforeach

			
			<div id="afterComplete">
				<p><h3>You have filled all the options and your quiz code is ready to share.. Find the quiz code below.</h3></p>
					<button class="btn btn-lg btn-primary">Play code: {{ $unique_id }}</button>
					<a href="{{ route('home') }}" class="btn btn-lg btn-success">Go Back</a>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$("#afterComplete").hide();
		let len = $(".hidden").length;
		console.log(len);
		if (len === 15) {
			$("#afterComplete").show();
			$("#instructions").hide();
		}
	});
</script>
@endsection