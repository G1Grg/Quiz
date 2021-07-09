@extends("layouts.app")

@section("title")
Welcome to Quizz
@endsection

@section("content")

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>You choosed "{{ $subcategoryName }}"</h3>
			<hr>
			<div id="questionContainer">
				<form action="{{ route("submitQuiz") }}" method="POST" class="mb-5">
				@foreach($quizQuestions as $key => $qstn)
					<h3>{{ $key+1 }}. {{ $qstn->question }}</h3>
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