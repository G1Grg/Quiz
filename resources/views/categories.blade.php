@extends("layouts.app")

@section("title")
Select a Category
@endsection

@section("content")
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<button class="btn btn-lg btn-primary"
			data-toggle="modal" 
			data-target="#addNewCategoryModel">
			Add new category</button>
		</div>
		<div class="modal fade" id="addNewCategoryModel" tabindex="-1" role="dialog" aria-labelledby="addNewCategoryModelLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			  <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title" id="addNewCategoryModelLabel">Add New Category</h5>
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>
				<div class="modal-body">
				  <form action ="{{ route ('addCategory')}}" method="Post">
					<div class="form-group">
					  <label for="name" class="col-form-label">Category Name</label>
					  <input type="text" class="form-control" id="name">
					 
					</div>
					@csrf
				   
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  <button type="button" class="btn btn-primary">Add</button>
				</div>
			</form>
			  </div>
			</div>
		  </div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h4>Choose your category</h4>

			@foreach($categories as $category)
				<a class="btn btn-lg btn-success" href="{{ route('insideCategory', $category->name) }}">{{ $category->name }}</a>
			@endforeach
		</div>
		
		
	</div>
</div>
@endsection