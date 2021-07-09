@extends("layouts.app")

@section("title")
Quizes I Created
@endsection

@section("content")
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>List Of Quizes Created</h3>
				<table class="table table-responsive">
					<thead>
						<tr>
							<th>ID</th>
							<th>Play Code</th>
						</tr>
					</thead>
					<tbody>
						@foreach($quizes as $key => $quiz)
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $quiz->unique_id }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
		</div>
	</div>
</div>
@endsection