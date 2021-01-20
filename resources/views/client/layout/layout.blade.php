<!DOCTYPE html>
<html>

{{-- Header --}}
@include('client.partials.header')



<body>

    <div class="theme-layout" id="scrollup">

        @include('client.partials.header_menu')

        @yield('content')



        <footer>
            <div class="block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 column">
                            <div class="widget">
                                <div class="about_widget">
                                    <div class="logo">
                                        <a href="index.html" title=""><img src="images/resource/logo.png" alt="" /></a>
                                    </div>
                                    <span>Mera Recruter, India.</span>
                                    <span><a href="" class="__cf_email__" data-cfemail="345d5a525b745e5b565c415a401a575b59">support@merarecruiter.com</a></span>
                                    <div class="social">
                                        <a href="#" title=""><i class="fa fa-facebook"></i></a>
                                        <a href="#" title=""><i class="fa fa-twitter"></i></a>
                                        <a href="#" title=""><i class="fa fa-linkedin"></i></a>
                                        <a href="#" title=""><i class="fa fa-pinterest"></i></a>
                                        <a href="#" title=""><i class="fa fa-behance"></i></a>
                                    </div>
                                </div><!-- About Widget -->
                            </div>
                        </div>
                        <div class="col-lg-4 column">
                            <div class="widget">
                                <h3 class="footer-title">Frequently Asked Questions</h3>
                                <div class="link_widgets">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <a href="#" title="">Privacy & Seurty </a>
                                            <a href="#" title="">Terms of Serice</a>
                                            <a href="#" title="">Communications </a>
                                            <a href="#" title="">Referral Terms </a>
                                            <a href="#" title="">Lending Licnses </a>
                                            <a href="#" title="">Disclaimers </a>
                                        </div>
                                        <div class="col-lg-6">
                                            <a href="#" title="">Support </a>
                                            <a href="#" title="">How It Works </a>
                                            <a href="#" title="">For Employers </a>
                                            <a href="#" title="">Underwriting </a>
                                            <a href="#" title="">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 column">
                            <div class="widget">
                                <h3 class="footer-title">Find Jobs</h3>
                                <div class="link_widgets">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="#" title="">US Jobs</a>
                                            <a href="#" title="">Canada Jobs</a>
                                            <a href="#" title="">UK Jobs</a>
                                            <a href="#" title="">Emplois en Fnce</a>
                                            <a href="#" title="">Jobs in Deuts</a>
                                            <a href="#" title="">Vacatures China</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 column">
                            <div class="widget">
                                <div class="download_widget">
                                    <a href="#" title=""><img src="images/resource/dw1.png" alt="" /></a>
                                    <a href="#" title=""><img src="images/resource/dw2.png" alt="" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-line">
                <span>© 2018 Mera Recruter All rights reserved</span>
                <a href="#scrollup" class="scrollup" title=""><i class="la la-arrow-up"></i></a>
            </div>
        </footer>

    </div>

    <div class="account-popup-area signin-popup-box">
        <div class="account-popup">
            <span class="close-popup"><i class="la la-close"></i></span>
            <h3>User Login</h3>
            <span>Click To Login With Demo User</span>
            <div class="select-user">
                <span>Candidate</span>
                <span>Employer</span>
            </div>
            <form>
                <div class="cfield">
                    <input type="text" placeholder="Username" />
                    <i class="la la-user"></i>
                </div>
                <div class="cfield">
                    <input type="password" placeholder="********" />
                    <i class="la la-key"></i>
                </div>
                <p class="remember-label">
                    <input type="checkbox" name="cb" id="cb1"><label for="cb1">Remember me</label>
                </p>
                <a href="#" title="">Forgot Password?</a>
                <button type="submit">Login</button>
            </form>
        </div>
    </div><!-- LOGIN POPUP -->

    <div class="account-popup-area signup-popup-box">
        <div class="account-popup">
            <span class="close-popup"><i class="la la-close"></i></span>
            <h3>Sign Up</h3>
            <div class="select-user">
                <span>Candidate</span>
                <span>Employer</span>
            </div>
            <form>
                <div class="cfield">
                    <input type="text" placeholder="Username" />
                    <i class="la la-user"></i>
                </div>
                <div class="cfield">
                    <input type="password" placeholder="********" />
                    <i class="la la-key"></i>
                </div>
                <div class="cfield">
                    <input type="text" placeholder="Email" />
                    <i class="la la-envelope-o"></i>
                </div>
                <div class="cfield">
                    <input type="text" placeholder="Phone Number" />
                    <i class="la la-phone"></i>
                </div>
                <button type="submit">Signup</button>
            </form>
        </div>
    </div><!-- SIGNUP POPUP -->

    @include('client.partials.scripts')

</body>


</html>

