@extends("layouts.app")

@section("title")
Create New Quiz
@endsection

@section("content")
<div class="container">
	<div class="row">
		<div class="col-md-12 mb-5">
			<h3>Create a quiz</h3>
			
			<form action="{{ route("createQuizQuestionSave") }}" method="POST">
				<label for="">Select a SubCategory:</label>
				<select name="subcategory_id">
					@foreach($subcategories as $subcategory)
				  		<option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
				  	@endforeach
				</select>

				<div class="form-group">
				    <label>Question 1</label>
				    <input type="text" class="form-control" name="question1" required>
				</div>
				<div class="form-group">
				    <label>Question 2</label>
				    <input type="text" class="form-control" name="question2" required>
				</div>
				<div class="form-group">
				    <label>Question 3</label>
				    <input type="text" class="form-control" name="question3" required>
				</div>
				<div class="form-group">
				    <label>Question 4</label>
				    <input type="text" class="form-control" name="question4" required>
				</div>
				<div class="form-group">
				    <label>Question 5</label>
				    <input type="text" class="form-control" name="question5" required>
				</div>
				<div class="form-group">
				    <label>Question 6</label>
				    <input type="text" class="form-control" name="question6" required>
				</div>
				<div class="form-group">
				    <label>Question 7</label>
				    <input type="text" class="form-control" name="question7" required>
				</div>
				{{-- <div class="form-group">
				    <label>Question 8</label>
				    <input type="text" class="form-control" name="question8" required>
				</div>
				<div class="form-group">
				    <label>Question 9</label>
				    <input type="text" class="form-control" name="question9" required>
				</div>
				<div class="form-group">
				    <label>Question 10</label>
				    <input type="text" class="form-control" name="question10" required>
				</div>
				<div class="form-group">
				    <label>Question 11</label>
				    <input type="text" class="form-control" name="question11" required>
				</div>
				<div class="form-group">
				    <label>Question 12</label>
				    <input type="text" class="form-control" name="question12" required>
				</div>
				<div class="form-group">
				    <label>Question 13</label>
				    <input type="text" class="form-control" name="question13" required>
				</div>
				<div class="form-group">
				    <label>Question 14</label>
				    <input type="text" class="form-control" name="question14" required>
				</div>
				<div class="form-group">
				    <label>Question 15</label>
				    <input type="text" class="form-control" name="question15" required>
				</div> --}}

				@csrf
				<button type="submit" class="btn btn-lg btn-primary">Sumbit</button>
			</form>
		</div>
	</div>
</div>
@endsection