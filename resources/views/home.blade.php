@extends('layouts.app')

@section("title")
Welcome to Quiz
@endsection

@section("content")
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h3>Welcome to Quiz</h3>
				<span>Quiz as name indicate will show you numbers of questions which will be interesting and fun to do so.
				</span><br>
				<span>Why Quiz?
				As any quiz application, we have introduced set of questions which will be seemingly useful in your daily lives.
				<ul>
					<li>Have a fun with your friends by creating quiz on various categories</li>
					<li> Share code with your friends and make them solve the quiz. </li>
					<li>View and customize your quiz </li>
				</ul>		
					
		</div>
		<div class="col-md-4">
			<img src="{{ asset('image/home.jpg') }}" alt ="image here"  class="img-fluid" >
		</div>
	</div>

	<div class="row mt-5">
		<div class="col-md-8">
			<h3>Futute plans</h3>
			<div><h4>Stay tuned we have a lot of updates coming soon only in My Quiz</h4></div>
			<div> <ul>
				<li>Quiz will be more interactive asking user one question at a time</li>
				<li>Player shall be able to see the time required by them to complete the game</li>
				<li>Player shall be challenged to complete set of questions in a fixed time period.</li>
			</ul>

		</div>
	</div>
</div>
@endsection