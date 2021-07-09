@extends("layouts.app")

@section("title")
My Quizes
@endsection

@section("content")
<div class="container">
	<div class="row">
		<div class="col-md-12 m">
			<h3>Total Quizes Taken: {{ $quizCount }}</h3>
			<hr>
			<div id="accordion">
			@foreach($quizesTaken as $key => $quiz)
				  <div class="card">
				    <div class="card-header" id="{{ $quiz->id }}">
				      <h5 class="mb-0">
				        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $quiz->id }}">
				          <b>#{{ $key+1 }}. </b> <b>Points: {{ $quiz->total_points }}</b>
				        </button>
				      </h5>
				    </div>
				    <div id="collapse{{ $quiz->id }}" class="collapse @if($key == 0) show @endif" data-parent="#accordion">
				      <div class="card-body">
				        @foreach($quiz->quiztakenquestions as $q)
				        	<div class="mb-3">
					        	<h5>{{ $q->quizquestion->question }}</h5>
					        	@if($q->given_answer == $q->correct_answer)
					        		<div>
					        			<span>Your Answer was Correct <button class="btn btn-sm btn-success">{{ $q->correct_answer }}</button></span>
					        		</div>
					        	@else
					        	<div>
					        		<span>Given Answer: <button class="btn btn-sm btn-danger">{{ $q->given_answer }}</button></span><br>
					        		<span>Correct Answer: <button class="btn btn-sm btn-success">{{ $q->correct_answer }}</button></span>
					        	</div>
					        	@endif
				        	</div>
				        	<hr>
				        @endforeach
				      </div>
				    </div>
				  </div>
			  @endforeach
			</div>
		</div>
	</div>
</div>
@endsection