<?php
    session_start();
    error_reporting(0);
    require 'db/connection.php';
    require 'db/encrypt_decrypt.php';
    if (isset($_GET['id'])) {
        // $reffered_id = my_decrypt(trim(urldecode($_GET['id'])));
        $reffered_id = trim(urldecode($_GET['id']));
        $query = "SELECT * from `user` WHERE link = '$reffered_id'";
        $result = $con->query($query);
        $result = mysqli_fetch_array($result);
        $_SESSION['reffered_id'] = $result['id'];
    
    }else{
        $_SESSION['reffered_id'] = -1;
    }
    $_SESSION['honeymint_home'] = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    ?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1"/>
        <meta name="author" content="Theme Industry">
        <!-- description -->
        <meta name="description" content="boltex">
        <!-- keywords -->
        <meta name="keywords" content="">
        <!-- title -->
        <title>HoneyMint - Competition</title>
        <!-- favicon -->
        <link rel="icon" href="images/fav-icon.ico">
        <!-- animation -->
        <link rel="stylesheet" href="css/animate.min.css"/>
        <!-- bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <!-- font-awesome icon -->
        <link rel="stylesheet" href="css/font-awesome.min.css"/>
        <!-- magnific popup -->
        <link rel="stylesheet" href="css/magnific-popup.min.css"/>
        <!-- cube Portfolio -->
        <link rel="stylesheet" href="css/jquery.fancybox.min.css"/>
        <!-- revolution slider -->
        <link rel="stylesheet" href="revolution/css/settings.css"/>
        <!-- owl carousel -->
        <link rel="stylesheet" href="css/owl.carousel.min.css"/>
        <link rel="stylesheet" href="css/owl.theme.default.min.css"/>
        <!-- bundle css -->
        <link rel="stylesheet" href="css/core.css"/>
        <!-- style -->
        <link rel="stylesheet" href="css/style.css"/>
        <!-- Custom Style -->
        <link rel="stylesheet" href="css/custom.css"/>
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="90" class="bottom-nav side-nav">
        <div id="loader">
            <div class="loader-inner">
                <div class="spinner">
                    <div class="dot1"></div>
                    <div class="dot2"></div>
                </div>
            </div>
        </div>
        <!-- start slider -->
        <section class="no-padding no-transition" id="home">
            <h1 class="display-none" aria-hidden="true">HoneyMint</h1>
            <div id="revo_main_wrapper" class="rev_slider_wrapper fullwidthbanner-container">
                <div id="banner-main" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
                    <ul>
                        <!-- SLIDE 3  -->
                        <li data-index="rs-01" data-transition="fade" data-slotamount="default" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="2000" data-fsmasterspeed="1500">
                            <div class="opacity1 bg-black position-relative z-index-1"></div>
                            <!-- MAIN IMAGE -->
                            <img src="images/1.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
                            <div class="tp-caption tp-resizeme"
                                data-x="['right','right','right','center']" data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-50','-50']"
                                data-whitespace="nowrap" data-responsive_offset="on"
                                data-width="['none','none','none','none']" data-type="text"
                                data-textalign="['right','right','right','center']"
                                data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                                data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                data-start="1200" data-splitin="none" data-splitout="none">
                                <h2 class="text-white font-weight-700 alt-font">HoneyMint</h2>
                            </div>
                            <div class="tp-caption tp-resizeme"
                                data-x="['right','right','right','center']" data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                data-whitespace="nowrap" data-responsive_offset="on"
                                data-width="['none','none','none','none']" data-type="text"
                                data-textalign="['right','right','right','center']"
                                data-transform_idle="o:1;"
                                data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                data-start="1000" data-splitin="none" data-splitout="none">
                                <h2 class="text-white font-weight-100 alt-font">Marathon</h2>
                            </div>
                            <div class="tp-caption tp-resizeme"
                                data-x="['right','right','right','center']" data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['160','160','160','160']"
                                data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeInOut;"
                                data-transform_out="s:900;e:Power2.easeInOut;s:900;e:Power2.easeInOut;"
                                data-type="button" data-start="2000" data-splitin="none" data-splitout="none" data-responsive_offset="on">
                                <a class="btn btn-blue btn-hvr-white btn-rounded btn-large margin-5px-right participate">Participate</a>
                                <a class="btn btn-transparent-white btn-rounded btn-large details">Details</a>
                            </div>
                        </li>
                        <!-- SLIDE  -->
                        <li data-index="rs-02" data-transition="fade" data-slotamount="default" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="2000" data-fsmasterspeed="1500" class="rev_gradient">
                            <div class="opacity1 bg-black position-relative z-index-1"></div>
                            <!-- MAIN IMAGE -->
                            <img src="images/2.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10"  data-no-retina>
                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption tp-resizeme"
                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['-140','-140','-140','-140']"
                                data-whitespace="nowrap" data-responsive_offset="on"
                                data-width="['none','none','none','none']" data-type="text"
                                data-textalign="['center','center','center','center']"
                                data-transform_idle="o:1;"
                                data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-start="1000" data-splitin="none" data-splitout="none">
                                <h2 class="text-white font-weight-100 alt-font">Participate</h2>
                            </div>
                            <div class="tp-caption tp-resizeme"
                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-70','-70']"
                                data-whitespace="nowrap" data-responsive_offset="on"
                                data-width="['none','none','none','none']" data-type="text"
                                data-textalign="['center','center','center','center']"
                                data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                data-start="1200" data-splitin="none" data-splitout="none">
                                <h2 class="text-white alt-font font-weight-700">&</h2>
                            </div>
                            <div class="tp-caption tp-resizeme"
                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                data-whitespace="nowrap" data-responsive_offset="on"
                                data-width="['none','none','none','none']" data-type="text"
                                data-textalign="['center','center','center','center']"
                                data-transform_idle="o:1;"
                                data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                data-start="1000" data-splitin="none" data-splitout="none">
                                <h2 class="text-white font-weight-100 alt-font">Win</h2>
                            </div>
                            <div class="tp-caption tp-resizeme whitecolor"
                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['70','70','70','70']"
                                data-whitespace="nowrap" data-responsive_offset="on"
                                data-width="['none','none','none','none']" data-type="text"
                                data-textalign="['center','center','center','center']" data-fontsize="['24','24','20','20']"
                                data-transform_idle="o:1;"
                                data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:2;sY:2;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                data-start="1500" data-splitin="none" data-splitout="none">
                                <p class="text-white text-large font-weight-200">100 bottles of HoneyMint</p>
                            </div>
                            <div class="tp-caption tp-resizeme"
                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['160','160','160','160']"
                                data-width="200" data-height="none"
                                data-whitespace="normal" data-type="button"
                                data-actions='' data-responsive_offset="on"
                                data-textAlign="['center','center','center','center']"
                                data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]"
                                data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]"
                                data-frames='[{"delay":700,"speed":2000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:40px;","to":"o:1;fb:0;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"200","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;fb:0;"}]'
                                style=" box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;">
                                <a class="btn btn-blue btn-hvr-white btn-rounded btn-large margin-5px-right participate">Participate</a>
                            </div>
                        </li>
                        <!-- SLIDE 2  -->
                        <li data-index="rs-03" data-transition="fade" data-slotamount="default" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="2000" data-fsmasterspeed="1500" class="banner-overlay">
                            <div class="opacity1 bg-black position-relative z-index-1"></div>
                            <!-- MAIN IMAGE -->
                            <img src="images/3.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="7" data-no-retina>
                            <!--If you need youtube video-->
                            <!--<div class="rs-background-video-layer"
                                data-ytid="hEkiWaEp03k"
                                data-volume="mute"
                                data-forcerewind="on"
                                data-nextslideatend="true"
                                data-autoplay="true"
                                data-autoplayonlyfirsttime="true"
                                data-videoloop="loopandnoslidestop"
                                data-videoattributes="version=3&enablejsapi=1&html5=1&hd=1&autoplay=1&wmode=opaque&showinfo=0&rel=0&
                                origin=http://server.local"></div>-->
                            <div class="tp-caption tp-resizeme"
                                data-x="['left','left','left','center']" data-hoffset="['0','50','0','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-50','-50']"
                                data-whitespace="nowrap" data-responsive_offset="on"
                                data-width="['none','none','none','none']" data-type="text"
                                data-textalign="['left','left','left','center']"
                                data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                data-start="1200" data-splitin="none" data-splitout="none">
                                <h2 class="text-white font-weight-700 alt-font">Register, Share & Win</h2>
                            </div>
                            <div class="tp-caption tp-resizeme whitecolor"
                                data-x="['left','left','left','center']" data-hoffset="['0','50','0','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['-10','-10','0','0']"
                                data-whitespace="nowrap" data-responsive_offset="on"
                                data-width="['none','none','none','none']" data-type="text"
                                data-textalign="['left','left','left','center']" data-fontsize="['24','24','20','20']"
                                data-transform_idle="o:1;"
                                data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:2;sY:2;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                data-start="1500" data-splitin="none" data-splitout="none">
                                <p class="text-white text-large font-weight-300">100 bottles of HoneyMint</p>
                            </div>
                            <div class="tp-caption tp-resizeme text-center button btnwhite-hole pagescroll"
                                data-x="['left','left','left','center']" data-hoffset="['0','50','0','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['90','80','80','80']"
                                data-whitespace="nowrap" data-type="button" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeInOut;"
                                data-transform_out="s:900;e:Power2.easeInOut;s:900;e:Power2.easeInOut;"
                                data-start="2000" data-splitin="none" data-splitout="none" data-responsive_offset="on">
                                <a class="btn btn-blue btn-hvr-white btn-rounded btn-large margin-5px-right participate">Register</a>
                                <a class="btn btn-transparent-white btn-rounded btn-large details">Details</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Main Slider ends -->
        <!-- start feature -->
        <section id="details-section" class="how-it-work text-center bg-light-gray no-transition">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 text-center center-col last-paragraph-no-margin">
                        <div class="sec-title margin-100px-bottom">
                            <div class="text-large text-red margin-10px-bottom font-weight-400 text-blue">All You Need To Know</div>
                            <h4 class="text-capitalize alt-font text-extra-dark-gray font-weight-300">
                            Follow below steps to win the contest
                            </h3>
                            <p class="width-75 margin-lr-auto md-width-90 xs-width-100 xs-margin-30px-bottom">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="how-one-container">
                    <!--how it work Box-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="how-box-one inner-box xs-margin-100px-bottom">
                            <div class="icon-box bg-blue">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </div>
                            <div class="text-large text-extra-dark-gray margin-20px-bottom">1. Registration</div>
                            <p>Register yourself for getting started.
                            </p>
                        </div>
                    </div>
                    <!--how it work Box-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="how-box-one inner-box sm-margin-100px-bottom xs-margin-100px-bottom">
                            <div class="icon-box bg-blue">
                                <i class="fa fa-group" aria-hidden="true"></i>
                            </div>
                            <div class="text-large text-extra-dark-gray margin-20px-bottom">2. Share</div>
                            <p>Share the link to others to increase your chance of winning.
                            </p>
                        </div>
                    </div>
                    <!--how it work Box-->
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="how-box-one inner-box">
                            <div class="icon-box bg-blue">
                                <i class="fa fa-gift" aria-hidden="true"></i>
                            </div>
                            <div class="text-large text-extra-dark-gray margin-20px-bottom">3. Earn Points</div>
                            <p>Each successfull registration with your reffered link will earn you a point and increase your chance of winning.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--end feature -->
        <!-- contact-->
        <section id="participate-section" class="btn-version">
            <div class="get-quote-section xs-text-center">
                <div class="container">
                    <div class="row clearfix">
                        <!--Form Column-->
                        <div class="col-md-6">
                            <div class="sec-title margin-50px-bottom">
                                <h3 class="text-capitalize alt-font text-extra-dark-gray font-weight-300">
                                    Let's Get Started
                                </h3>
                                <img src="images/prize.jpg" style="width: 60%">
                            </div>
                        </div>
                        <div class="form-column col-md-6 margin-100px-top">
                            <div class="contact-form">
                                <!--Title-->
                                <form class="form_class" method="POST">
                                    <div class="row">
                                        <div class="col-sm-6 margin-20px-top">
                                            <div class="form-group">
                                                <input type="text" class="form_inputs" name="fname" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 margin-20px-top">
                                            <div class="form-group">
                                                <input type="text" class="form_inputs" name="lname" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 margin-20px-top">
                                            <div class="form-group">
                                                <input type="text" class="form_inputs" name="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 margin-20px-top">
                                            <div class="form-group">
                                                <?php require 'countryCodes.php' ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-8 margin-20px-top">
                                            <div class="form-group">
                                                <input type="text" class="form_inputs" name="phone" placeholder="Phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 no-padding margin-20px-top">
                                        <div class="button">
                                            <input type="submit"  class="btn btn-blue btn-rounded btn-large text-extra-small width-100">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Sweet alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <!-- javascript libraries -->
        <script src="js/jquery-3.2.1.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.appear.min.js"></script>
        <!-- owl carousel -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- magnific popup -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <!-- fancybox -->
        <script src="js/jquery.fancybox.min.js"></script>
        <!-- wow -->
        <script src="js/wow.js"></script>
        <!-- parallax -->
        <script src="js/parallaxie.min.js"></script>
        <!-- equal hieght -->
        <script src="js/jquery.matchHeight-min.js"></script>
        <!-- text-rotate -->
        <script src="js/morphext.min.js"></script>
        <!-- text-rotate -->
        <script src="js/isotope.pkgd.min.js"></script>
        <!-- revolution -->
        <script src="revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="revolution/js/jquery.themepunch.revolution.min.js"></script>
        <!-- revolution extension -->
        <script src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="revolution/js/extensions/revolution.extension.video.min.js"></script>
        <!-- Google Map Api -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgC6ZapXdUzFdeQOFhdm_wucwlDMMQ8CQ"></script>
        <script src="js/map.js"></script>
        <!-- setting -->
        <script src="js/main.js"></script>
        <script src="js/register.js"></script>
    </body>
</html>