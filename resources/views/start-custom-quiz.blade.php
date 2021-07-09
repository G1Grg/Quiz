@extends("layouts.app")

@section("title")
Playing Custom Quiz
@endsection

@section("content")

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<hr>
			<div id="questionContainer">
				<form action="{{ route("submitQuiz") }}" method="POST">
				@foreach($quizQuestions as $qstn)
					<h3>{{ $qstn->question }}</h3>
					<div class="radio-toolbar">
					@foreach($qstn->questionoptions as $optn)
					  	<input type="radio" name="{{ $qstn->id }}" id="{{ $optn->option }}" value="{{ $optn->option }}">
					    <label for="{{ $optn->option }}">{{ $optn->option }}</label>
					@endforeach
					</div>
				@endforeach
				@csrf
				<button type="submit" class="btn btn-lg btn-primary">Submit Quiz</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection