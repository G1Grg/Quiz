@extends("layouts.app")

@section("title")
Welcome to Quizz
@endsection

@section("content")
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>You choosed "{{ $category }}"</h3>
			<h3>Choose your subcategory</h3>
			@foreach($subcategories as $sub)
				<a class="btn btn-lg btn-success" href="{{ route('startQuiz', [$category, $sub->name]) }}">{{ $sub->name }}</a>
			@endforeach
		</div>
	</div>
</div>
@endsection