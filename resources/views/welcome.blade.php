@extends('layouts.header-footer')

   @section('content')
   <!-- slider_area_start -->
   <div class="slider_area">
        <div class="slider_active owl-carousel">
       
        @if (Auth::check()) 
        <div class="single_slider  d-flex align-items-center slider_bg_1" style="background-image: url('images/care/about/img10.jpg')">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3> <span style="color:white;">Helpful</span> <br>
                                    </h3>
                                <p style="color:white;">Counselling and Psychotherapy are most helpful when you are feeling<br>
                                 'stuck' and not sure how to move forward <br>
                                 in one aspect or even most aspects of your day to day life.</p>
                                <a href="{{ url('/about') }}" class="boxed-btn3">Check Our Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        @endif

        <div class="single_slider  d-flex align-items-center slider_bg_2" style="background-image: url('images/care/about/img9.png')">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3> <span>Mental Health care</span> <br>
                                    For Whole Family </h3>
                                <p>In healthcare sector, service excellence is the facility of <br> the hospital as
                                    healthcare service provider to consistently.</p>
                                <a href="{{ url('/about') }}" class="boxed-btn3">Check Our Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="single_slider  d-flex align-items-center slider_bg_1" style="background-image: url('images/care/about/img10.jpg')">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3> <span style="color:white;">Helpful</span> <br>
                                    </h3>
                                <p style="color:white;">Counselling and Psychotherapy are most helpful when you are feeling<br>
                                 'stuck' and not sure how to move forward <br>
                                 in one aspect or even most aspects of your day to day life.</p>
                                <a href="{{ url('/about') }}" class="boxed-btn3">Check Our Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="single_slider  d-flex align-items-center slider_bg_2">
            <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                        @if (Auth::guest()) <img src="{{ asset('images/care/banner/img66.jpg') }}" alt="">@else
                        <img src="{{ asset('images/care/banner/img66.jpg') }}" alt="">
                        @endif
                </div></div></div>
            </div>
            
        </div>
    </div><br><br>
    <!-- slider_area_end -->

    <!-- service_area_start -->
    <div class="service_area">
        <div class="container p-0">
            <div class="row no-gutters">
                <div class="col-xl-4 col-md-4">
                    <div class="single_service">
                         <h3>Sign Up</h3>
                        <p>If you are a new client <a href="{{ route('register') }}">here</a></p>
                       
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service">
                        
                        <h3>Need Help?</h3>
                        <p>Please call us - +61-0450-50525</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service">
                       
                        <h3>Service</h3>
                        <p>Received a reminder from us?</p>
                         </div>  
                </div>
                
            </div>
        </div>
    </div><br>
    <!-- service_area_end -->

    <!-- welcome_7-day_area_start -->
            <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                            <img src="{{ asset('images/care/about/imgg3.jpg') }}" alt="">
                            <a href="#" class="boxed-btn3-white-2">Learn More</a>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_docmed_info">
                        <h2>Welcome to 7-Day Psychology</h2>
                        <h3>Best Care For Your <br>
                                Good Health</h3>
                                <p  class="about-desc center">We established in order to provide high quality psychological care to the local community and has assembled a group of psychologists and psychotherapists who are highly qualified individuals with well established practices over a number of specialist areas.
                    Counselling and Psychotherapy are most helpful when you are feeling 'stuck' and not sure how to move forward in one aspect or even most aspects of your day to day life. </p>
                       
                        
                    </div>
                </div>
            </div>
        </div>
    
    <!-- welcome_docmed_area_end -->

    <!-- offers_area_start -->
    <div class="our_department_area">
    <h3><center>We'll match you to a counselor that can help with.. <center></h3>                   
           
        <div class="container">  
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="{{ asset('images/care/banner/dep.jpg') }}" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">Depression</a></h3>
                            <p>Esteem spirit temper too say adieus who direct esteem.</p>
                            <a href="#" class="learn_more">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="{{ asset('images/care/banner/stress.jpeg') }}" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">Stress</a></h3>
                            <p>Esteem spirit temper too say adieus who direct esteem.</p>
                            <a href="#" class="learn_more">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="{{ asset('images/care/banner/anx.jpeg') }}" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">Anxiety</a></h3>
                            <p>Esteem spirit temper too say adieus who direct esteem.</p>
                            <a href="#" class="learn_more">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="{{ asset('images/care/banner/self.jpg') }}" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">Self-Esteem</a></h3>
                            <p>Esteem spirit temper too say adieus who direct esteem.</p>
                            <a href="#" class="learn_more">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="{{ asset('images/care/banner/anger.jpg') }}" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">Anger</a></h3>
                            <p>Esteem spirit temper too say adieus who direct esteem.</p>
                            <a href="#" class="learn_more">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="{{ asset('images/care/banner/grief.jpg') }}" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">Grief</a></h3>
                            <p>Esteem spirit temper too say adieus who direct esteem.</p>
                            <a href="#" class="learn_more">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offers_area_end -->

    

    <!-- expert_doctors_area_start -->
    <div class="expert_doctors_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="doctors_title mb-55">
                        <h3>Expert Councellers</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="expert_active owl-carousel">
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="{{ asset('images/care/experts/1.jpg') }}" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Mirazul Alom</h3>
                                <span>Neurologist</span>
                            </div>
                        </div>
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="{{ asset('images/care/experts/9.jpg') }}" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Mirazul Alom</h3>
                                <span>Neurologist</span>
                            </div>
                        </div>
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="{{ asset('images/care/experts/3.jpg') }}" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Mirazul Alom</h3>
                                <span>Neurologist</span>
                            </div>
                        </div>
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="{{ asset('images/care/experts/4.jpg') }}" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Mirazul Alom</h3>
                                <span>Neurologist</span>
                            </div>
                        </div>
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="{{ asset('images/care/experts/5.jpg') }}" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Mirazul Alom</h3>
                                <span>Neurologist</span>
                            </div>
                        </div>
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="{{ asset('images/care/experts/6.jpg') }}" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Mirazul Alom</h3>
                                <span>Neurologist</span>
                            </div>
                        </div>

                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="{{ asset('images/care/experts/7.jpg') }}" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Mirazul Alom</h3>
                                <span>Neurologist</span>
                            </div>
                        </div>

                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="{{ asset('images/care/experts/8.jpg') }}" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Mirazul Alom</h3>
                                <span>Neurologist</span>
                            </div>
                        </div>

                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="{{ asset('images/care/experts/2.jpg') }}" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>Mirazul Alom</h3>
                                <span>Neurologist</span>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- expert_doctors_area_end -->

<br>
    <!-- Emergency_contact start -->
    <div class="Emergency_contact">
        <div class="conatiner-fluid p-0">
            <div class="row no-gutters">
                <div class="col-xl-6">
                    <div class="single_emergency d-flex align-items-center justify-content-center emergency_bg_1 overlay_skyblue">
                        <div class="info">
                            <h3>For Any Emergency Contact</h3>
                            <p>Esteem spirit temper too say adieus.</p>
                        </div>
                        <div class="info_button">
                            <a href="#" class="boxed-btn3-white">+10 378 4673 467</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="single_emergency d-flex align-items-center justify-content-center emergency_bg_2 overlay_skyblue">
                        <div class="info">
                            <h3>Make an Online Appointment</h3>
                            <p>Esteem spirit temper too say adieus.</p>
                        </div>
                        <div class="info_button">
                            <a href="#" class="boxed-btn3-white">Make an Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <!-- Emergency_contact end -->
   
   
 @endsection

