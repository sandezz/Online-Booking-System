<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> 7 Day Psychology</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/care/7.png') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
   
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >


    <link rel="stylesheet" href="{{ asset('css/care/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/care/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/care/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/care/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/care/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/care/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/care/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/care/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/care/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/care/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/care/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/care/profile/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/care/profile/bootstrap.min.css') }}">


</head>

<body>
<div id="page-container">
    <header>
        <div class="header-area ">

            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('images/care/logo2.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="{{ (request()->is('/')) ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
                                        @if(Auth::check())
                                            <li><a class="{{ ((request()->is('profile')) || (request()->is('update_profile')) || (request()->is('change_password'))) ? 'active' : '' }}"  href="#">Profile <i class="glyphicon glyphicon-chevron-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="{{ route('profile') }}">Profile</a>
                                                    </li>
                                                    <li><a href="{{ route('update_profile') }}">Edit
                                                            Profile</a></li>
                                                    <li><a href="{{ route('change_password') }}">Change
                                                            Password</a></li>
                                                </ul>
                                            </li>


                                            @if(session('user')=='admin')
                                            <li><a class="{{ ((request()->is('insert_physio')) || (request()->is('physio_list'))) ? 'active' : '' }}" href="#">Counsellors <i class="glyphicon glyphicon-chevron-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="{{ route('insert_physio') }}">Add
                                                    Counsellors</a></li>
                                                    <li><a href="{{ route('physio_list') }}">Manage
                                                    Counsellors</a></li>
                                                </ul>
                                            </li>

                                            <li><a class="{{ ((request()->is('all_customer')) ||(request()->is('customer_profile*'))) ? 'active' : '' }}" href="#">Client <i class="glyphicon glyphicon-chevron-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="{{ route('all_customer') }}">Manage
                                                            Client</a></li>
                                                </ul>
                                            </li>

                                            <li><a class="{{ ((request()->is('all_appointments')) || (request()->is('appointment_details*'))) ? 'active' : '' }}" href="#">Appointment <i class="glyphicon glyphicon-chevron-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="{{ route('all_appointments') }}">Manage
                                                            Appointments</a></li>
                                                </ul>
                                            </li>
                                        @endif

                                        @if(session('user')=='physio')
                                        <li><a class="{{ ((request()->is('physio_appointments')) || (request()->is('appointment_details*'))) ? 'active' : '' }}" href="#">Appointment <span class="glyphicon glyphicon-chevron-down"></span></a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('physio_appointments') }}">View
                                                        Appointments</a></li>
                                            </ul>
                                        </li>
                                        <li><a class="{{ ((request()->is('change_availability')) || (request()->is('remove_availability*'))) ? 'active' : '' }}" href="#">Availabilty <span class="glyphicon glyphicon-chevron-down"></span></a>
                                            <ul class="submenu">
                                                        <li><a href="{{ route('change_availability') }}">Add New Unavailabilty
                                                        </a></li>
                                                        <li><a href="{{ route('remove_availability') }}">Remove Unavailabilty
                                                        </a></li>
                                            </ul>
                                        </li>
                                        @endif

                                        @if(session('user')=='customer')                                       
                                         <li><a class="{{ ((request()->is('make_appointment')) || (request()->is('appointment_list*'))) ? 'active' : '' }}" href="#">Appointment <i class="glyphicon glyphicon-chevron-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('make_appointment') }}">Make
                                                        Appointment</a></li>
                                                <li><a href="{{ route('appointment_list') }}">Manage
                                                        Appointments</a></li>
                                            </ul>
                                        </li>
                                        @endif
                                        @endif
                                        
                                        @if(session('user')!='admin' && session('user')!='physio')
                                        <li><a class="{{ (request()->is('about')) ? 'active' : '' }}" href="{{ url('/about') }}">About Us</a></li>
                                        <li><a class="{{ (request()->is('contact')) ? 'active' : '' }}" href="{{ url('/contact') }}">Contact Us</a></li>
                                        <li><a class="{{ (request()->is('faq')) ? 'active' : '' }}" href="{{ url('/faq') }}">FAQ</a></li>
                                        @endif
                                        @if(Auth::guest())

                                            <li><a class="{{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">Register</a></li>

                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>


                        @if(Auth::guest())
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="book_btn d-none d-lg-block">
                                        <a href="{{ route('login') }}">Sign In</a>
                                    </div>
                                </div>
                            </div>
                        @else

                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="book_btn d-none d-lg-block">
                                        <li> 
                                                @if(Auth::check())
                                                    
                                                        @if(session('user')=='admin')
                                                        Admin&nbsp;
                                                    @endif
                                                    
                                                    @if(session('user')=='physio')         
                                                         Dr.&nbsp;
                                                    @endif
                                                    @if(session('user')=='customer')
                                                        Welcome&nbsp;
                                                    @endif
                                                @endif

                                                {{ Auth::user()->name }}
                                           
                                        </li>
                                        <br>
                                        <li>
                                            <ul class="submenu">
                                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Logout</a>
                                                    <form id="logout-form"
                                                        action="{{ route('logout') }}" method="POST"
                                                        style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    </div>
                                </div>
                            </div>
                        @endif


                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->


    @yield('content')

    <!-- footer start --><br><br><br>
</div>
    <footer class="footer">

        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-lg-4">
                            <div class="footer_widget">
                                <div class="site_logo">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ asset('images/care/logo2.png') }}" alt="7 day logo">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-lg-3">
                        </div> 
                        <div class="col-xl-4 col-md-6 col-lg-3">
                            <div class="footer_widget">
                                <p class="text-center">
                                    400 Kent Street,Sydney, NSW, 2000 <br>
                                    +61-0450-50525 <br>
                                    contact@7dayPsychology.com
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                                    <p class="copy_right text-center">

                                        Copyright &copy;<script>
                                            document.write(new Date().getFullYear());
                                        </script> All rights reserved

                                    </p>
                        </div>    
                        </div>
                        </div>
                    
                    
        </div>
    </div>
 </footer>
    <!-- footer end  -->



    <!-- JS here -->
    
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="{{asset('/js/main.js')}}" rel="javascript" type="text/javascript"></script>

  
<script src="{{asset('js/care/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{asset('js/care/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{asset('js/care/popper.min.js') }}"></script>
    <script src="{{asset('js/care/bootstrap.min.js') }}"></script>
    <script src="{{asset('js/care/owl.carousel.min.js') }}"></script>
    <script src="{{asset('js/care/isotope.pkgd.min.js') }}"></script>
    <script src="{{asset('js/care/ajax-form.js') }}"></script>
    <script src="{{asset('js/care/waypoints.min.js') }}"></script>
    <script src="{{asset('js/care/jquery.counterup.min.js') }}"></script>
    <script src="{{asset('js/care/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{asset('js/care/scrollIt.js') }}"></script>
    <script src="{{asset('js/care/jquery.scrollUp.min.js') }}"></script>
    <script src="{{asset('js/care/wow.min.js') }}"></script>
    <script src="{{asset('js/care/nice-select.min.js') }}"></script>
    <script src="{{asset('js/care/jquery.slicknav.min.js') }}"></script>
    <script src="{{asset('js/care/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{asset('js/care/plugins.js') }}"></script>
    <script src="{{asset('js/care/gijgo.min.js') }}"></script>
    <!--contact js-->
    <script src="{{asset('js/care/contact.js') }}"></script>
    <script src="{{asset('js/care/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{asset('js/care/jquery.form.js') }}"></script>
    <script src="{{asset('js/care/jquery.validate.min.js') }}"></script>
    <script src="{{asset('js/care/mail-script.js') }}"></script>
   <script src="{{asset('/js/care/main.js') }}" rel="javascript" type="text/javascript"></script>  
   <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

   
    <script>
        jQuery.noConflict();
    </script>
    
</body>

</html>