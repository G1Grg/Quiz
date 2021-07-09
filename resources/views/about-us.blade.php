@extends("layouts.app")

@section("title")
About Us Page
@endsection

@section("content")
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h2>About Us</h2>
			<hr>
			<p>
				<div>We believe that everyone's got talent and skills to recognize, solve and think critically. However not all is perfect in every fields. </div>
<div>Quiz application shall help students, teachers and all the educational related or not related personal in understanding basic terms, ideas in various real world fields. </div>
<div>We believe with this application, with fun, academic qualification shall also build up reminding people basic yet important aspect of our daily missing lives.</div>
			</p>
		</div>
		<img src="{{asset('image/AboutUs.jpg')}}" style="width: 350px; height: 350px;">
	</div>
</div>
@endsection