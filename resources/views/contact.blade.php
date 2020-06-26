
@extends( 'layouts.header-footer')

@section('content')
        <div class="banner-image background-cover" style="background-image: url('images/contact_us.jpg')">
            <div class="container">
                <div class="banner-text" style="color:white;"><br>
                    <h2 style="color:white;"> Contact Us</h2><br>
                    <br>
                </div><br>
            </div>
        </div>
        <div class="contact-us-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <p> To make an Appointment, or to enquire about how we may help you, 
                    it is preferred that you call us during business hours, Monday to Friday,
                     so our Receptionist can immediately answer your call.</p>
                        
                    </div>
                </div><br>
                
                <div class="row">
                    <div class="col-sm-7">
                        <div class="contact-us-form">
                            
                            <form class="contact-us-form-wrap">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Email Address</label>
                                    <input type="text" class="form-control" placeholder="Enter your email address">
                                </div>
                                <div class="form-group">
                                    <label for="message" class="sr-only">Message</label>
                                    <textarea name="message" class="form-control" id="message" rows="5" placeholder="Enter your message"></textarea>
                                </div>
                                <div class="form-group">
                                    <small class="text-muted">
                                    * All fields are mandatory.
                                    </small>
                                </div>
                                <br>
                                <div class="button-wrap">
                                    <a href="{{ url('/about') }}" class="button default-button">Enquire Now</a>
                                </div>
                            
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="address-form">
                            <p>Information</p>
                                <ul class="contacts-info">
                                    <li>
                                        <p class="contact-info-text"> Leave us your details,
                        <br>
                        We will get back to you as soon as possible.
                    </p>
                                    </li>
                                    
                                </ul>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>

@endsection
