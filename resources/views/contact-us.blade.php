@extends("layouts.app")

@section("title")
Contact Us Page
@endsection

@section("content")
    <div class="container">
        <div class="row">
            <h2>Contact Us</h2>
                <hr>
                    <p>
                        <span><b>We are always happy to learn from our players. If you have used this application and have found gliches, turn to us. 
                        Your inputs helps us improve our products and give you new solutions.</b></span><br/>
                        <span>For more information and advice, please contact <b>(+61)452 328 983</b> or email us at
                        <a href ="jiwangurung1993@gmail.com" target = "_self">jiwangurung1993@gmail.com</a> or complete the form below:</span>
                        <span></span>
                    </p>
            {{-- form div --}}
            <div class="col-md-8 mb-5"> 
                <form action="{{ route('saveContactUs') }}" method="POST">
                    <div class="row mb-3">
                        <label for="">Name:</label>
                        <input type="text" 
                            class="form-control input-style" 
                            name="name" placeholder="Enter your name" required>
                    </div>

                    <div class="row mb-3">
                        <label for="">Email:</label>
                        <input type="email" 
                            class="form-control input-style" 
                            placeholder="Enter your email" name="email" required>
                    </div>

                    <div class="row mb-3">
                        <label for="">Phone:</label>
                        <input type="text"
                            class="form-control input-style" 
                            placeholder="Enter your phone number" name="phone" required>  
                    </div>

                    <div class="row mb-3">
                        <label for="">Message:</label>
                        <textarea 
                            class="form-control input-style" 
                            name="message" cols="30" rows="10" required="required"></textarea>
                    </div>
                    
                    <div class="row mb-3">
                        <button class="btn btn-md btn-primary">Sumbit</button>
                    </div>
                    
                    @csrf
                </form>
                {{-- End of form div --}}
        </div>
        
        <div class="col-md-4">
            <img src="{{asset('image/contact1.jpg')}}" style="width: 350px; height: 350px;">
        </div>

        </div> {{-- end of row--}}
    </div> {{--container end--}}

    <p>
    @if ($errors->any())
        {{ implode('', $errors->all(':message')) }}
    @endif
    </p>

@endsection