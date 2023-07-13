<?php

namespace Database\Seeders;

use App\Models\About_us;
use Illuminate\Database\Seeder;

class About_us_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $about_us = About_us::find(1);
        if(!$about_us){
            $about_us = new About_us();
            $about_us->id = 1;
            $about_us->name = 'Aboutus';
        }

        $description =  '  <!DOCTYPE html>
        <html>
        <head>
            <title></title>
        </head>
        <body>
        <div class="ct-pageWrapper dvdascva" id="ct-js-wrapper">
        <section class="company-heading intro-type" id="parallax-one">
        <div class="container">
        <div class="row product-title-info">
        <div class="col-md-12">
        <h1>About Us</h1>
        </div>
        </div>
        </div>

        <div class="parallax" id="parallax-cta" style="background-image:url(https://www.solodev.com/assets/hero/hero.jpg);">&nbsp;</div>
        </section>

        <section class="story-section company-sections ct-u-paddingBoth100 paddingBothHalf noTopMobilePadding" id="section">
        <div class="container text-center">
        <h2>WHAT DRIVES US</h2>

        <h3>Medical2 -Career College</h3>

        <div class="col-md-8 col-md-offset-2">
        <div class="red-border">&nbsp;</div>

        <p class="ct-u-size22 ct-u-fontWeight300 marginTop40">Medical2 Career College is a division of Medical2 Inc. And the sister company of Medical2 National Certification Agency. We are providing healthcare career courses and for our future degree programs under "Medical2 Career College" Licensed by the State of Mississippi Commission on Proprietary School and College Registration, License No.C-675..</p>
        <!-- <a class="ct-u-marginTop60 btn btn-solodev-red btn-fullWidth-sm ct-u-size19" href="#">Learn More</a> --></div>
        </div>
        </section>

        <section class="culture-section company-sections ct-u-paddingBoth100 paddingBothHalf noTopMobilePadding">
        <div class="container">
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <h2>We Are Offering</h2>

        <h3>What We Have</h3>

        <p class="ct-u-size22 ct-u-fontWeight300 ct-u-marginBottom60">Our courses provide online continuing education and training programs for <br />
            medical and allied healthcare professionals under Medical2 Certification <br>
            Agency..
        </p>
        </div>
        </div>

        <div class="row ct-u-paddingBoth20">
        <div class="col-xs-6 col-md-4">
        <div class="company-icons-white">
        <p>Continuing Healthcare Education</p>

        <p class="company-icons-subtext hidden-xs">Individuals who choose Medical2 as their certification agency realize that when they successfully pass our programs, workshops, or exams, they are nationally certified through a reputable company dedicated to their continuing healthcare education.</p>
        </div>
        </div>

        <div class="col-xs-6 col-md-4">
        <div class="company-icons-white">
        <p>Available 24/7.</p>

        <p class="company-icons-subtext hidden-xs"> Our continuing education courses and training programs are available 24/7. We offer a variety of hands-on, e-learning, and certification courses designed to educate medical healthcare professionals. </p>
        </div>
        </div>

        <div class="col-xs-6 col-md-4">
        <div class="company-icons-white">
        <p>Affordable  Courses</p>

        <p class="company-icons-subtext hidden-xs">. The courses are affordable,The choice to become a certified healthcare professional includes formal theoretical and clinical training with supervised practice. </p>
        </div>
        </div>
        </div>

        <div class="row ct-u-paddingBoth20">
        <div class="col-xs-6 col-md-4">
        <div class="company-icons-white">
        <p>Instructors and Staff</p>

        <p class="company-icons-subtext hidden-xs">Our instructors and staff come from healthcare backgrounds. They understand your needs and concerns, and they are always ready to assist.</p>
        </div>
        </div>

        <div class="col-xs-6 col-md-4">
        <div class="company-icons-white">
        <p>Pioneer Of Online Phlebotomy</p>

        <p class="company-icons-subtext hidden-xs">We are the pioneer of online Phlebotomy Technician Certification, OB Tech and IV Therapy certification. Medical2 Career College works with various state agencies.</p>
        </div>
        </div>

        <div class="col-xs-6 col-md-4">
        <div class="company-icons-white">
        <p>Accredited by the BBB</p>

        <p class="company-icons-subtext hidden-xs">We are accredited by the BBB and are also registered with Dun & Bradstreet registration number 843579363. Continuing Education Providers “Provider approved by the California board of Registered Nursing" License Number #15509.</p>
        </div>
        </div>
        </div>
        <a class="ct-u-marginTop60 btn btn-solodev-red-reversed btn-fullWidth-sm ct-u-size19" href="/careers/">Ready to Learn More?</a></div>
        </section>

        <section class="customers-section company-sections ct-u-paddingBoth100 paddingBothHalf noTopMobilePadding">
        <div class="container">
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <h2>CUSTOMERS</h2>

        <h3>Trusted by some of the world&rsquo;s leading brands.</h3>

        <p class="ct-u-size22 ct-u-fontWeight300 ct-u-marginBottom60 marginTop40">We are accredited by the BBB and are also registered with Dun & Bradstreet registration number 843579363. Continuing Education Providers “Provider approved by the California board of Registered Nursing" License Number #15509. We also have a career college in Tupelo, MS under the name of "Medical2 Career College" "Licensed by the State of Mississippi Commission on Proprietary School and College Registration, License No.C-675.</p>
        </div>

        <div class="clearfix">&nbsp;</div>
        </div>
        </div>
        </section>
        </div>

        <main>
        <div class="container ct-u-paddingTop40 ct-u-paddingBottom100">
        <div class="row">
        <div class="col-md-12 ct-content">
        <section class="clients-home">
        <div class="container">
        <div class="clients-logos text-center">
        <div class="row">
        <div class="col-md-4 client-logos-repeater"><a class="Zeina" href="/path/to/detail/zeina.html"><img alt="https://www.solodev.com/assets/clients/logo-zeina.png" src="https://www.solodev.com/assets/clients/logo-zeina.png" /></a>

        <div class="logo-title">
        <div class="displayTable">
        <div class="displayTableCell">Zeina - 0</div>
        </div>
        </div>
        </div>

        <div class="col-md-4 client-logos-repeater"><a class="Logic" href="/path/to/detail/logic.html"><img alt="https://www.solodev.com/assets/clients/logic.png" src="https://www.solodev.com/assets/clients/logic.png" /></a>

        <div class="logo-title">
        <div class="displayTable">
        <div class="displayTableCell">Logic</div>
        </div>
        </div>
        </div>

        <div class="col-md-4 client-logos-repeater"><a class="Smart" href="/path/to/detail/smart.html"><img alt="https://www.solodev.com/assets/clients/client3.png" src="https://www.solodev.com/assets/clients/client3.png" /></a>

        <div class="logo-title">
        <div class="displayTable">
        <div class="displayTableCell">Smart</div>
        </div>
        </div>
        </div>
        </div>

        <div class="row">
        <div class="col-md-4 client-logos-repeater"><a class="Softtech" href="/path/to/detail/softtech.html"><img alt="https://www.solodev.com/assets/clients/softtech.png" src="https://www.solodev.com/assets/clients/softtech.png" /></a>

        <div class="logo-title">
        <div class="displayTable">
        <div class="displayTableCell">Softtech</div>
        </div>
        </div>
        </div>

        <div class="col-md-4 client-logos-repeater"><a class="Wheel" href="/path/to/detail/wheel.html"><img alt="https://www.solodev.com/assets/clients/logo-target.png" src="https://www.solodev.com/assets/clients/logo-target.png" /></a>

        <div class="logo-title">
        <div class="displayTable">
        <div class="displayTableCell">Wheel</div>
        </div>
        </div>
        </div>

        <div class="col-md-4 client-logos-repeater"><a class="3designs" href="/path/to/detail/3designs.html"><img alt="https://www.solodev.com/assets/clients/designx.png" src="https://www.solodev.com/assets/clients/designx.png" /></a>

        <div class="logo-title">
        <div class="displayTable">
        <div class="displayTableCell">3designs</div>
        </div>
        </div>
        </div>
        </div>

        <div class="row">
        <div class="col-md-4 client-logos-repeater"><a class="Heart" href="/path/to/detail/heart.html"><img alt="https://www.solodev.com/assets/clients/client7.png" src="https://www.solodev.com/assets/clients/client7.png" /></a>

        <div class="logo-title">
        <div class="displayTable">
        <div class="displayTableCell">Heart</div>
        </div>
        </div>
        </div>

        <div class="col-md-4 client-logos-repeater"><a class="Devtech" href="/path/to/detail/devtech.html"><img alt="https://www.solodev.com/assets/clients/devtech.png" src="https://www.solodev.com/assets/clients/devtech.png" /></a>

        <div class="logo-title">
        <div class="displayTable">
        <div class="displayTableCell">Devtech</div>
        </div>
        </div>
        </div>

        <div class="col-md-4 client-logos-repeater"><a class="Chartz" href="/path/to/detail/chartz.html"><img alt="https://www.solodev.com/assets/clients/chartz.png" src="https://www.solodev.com/assets/clients/chartz.png" /></a>

        <div class="logo-title">
        <div class="displayTable">
        <div class="displayTableCell">Chartz</div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </section>
        </div>
        </div>
        </div>
        </main>
        <style type="text/css">.separator-type,
                .title-type,
                .intro-type,
                .content-type .intro-type p {
                    position: relative;
                }

                .intro-type .container {
                    padding: 107px 0px 102px 0px !important;
                }

                #product-header-section,
                .intro-type .container {
                    padding: 68px 15px 72px !important;
                }

                @media (min-width: 1630px) .container {
                    width: 1630px;
                }

                .parallax {
                    background-attachment: inherit !important;
                }

                .parallax {
                    background-attachment: inherit !important;
                    background-repeat: repeat;
                    background-size: cover;
                    position: absolute;
                    top: 0px;
                    bottom: 0px;
                    width: 100%;
                    z-index: -10;
                }

                .company-heading h1 {
                    margin-bottom: 40px;
                    line-height: 80px;
                    color: #fff;
                    font-weight: 700 !important;
                    text-align: center;
                }

                .seo-header,
                .product-header,
                .intro-type .container h1.white,
                .company-heading h1 {
                    font-family: sans-serif;
                    font-weight: 100 !important;
                    text-transform: capitalize;
                    font-size: 65px;
                    margin-bottom: 20px;
                }

                .company-sections h2,
                .careers-sections h2,
                .perks-section h2 {
                    font-weight: 800;
                    font-size: 50px;
                }

                .company-sections h2,
                .company-sections h3,
                .careers-sections h2,
                .perks-section h2 {
                    font-family: , sans-serif;
                }

                .company-sections h3 {
                    font-size: 25px;
                    font-weight: 700;
                    margin: 14px 0;
                    font-family: , sans-serif;
                    text-transform: capitalize;
                }

                .red-border {
                    width: 50%;
                    border-bottom: 1px solid #d2282e;
                    margin: 0 auto;
                    height: 16px;
                }

                .company-sections p {
                    margin-top: 20px;
                }

                .ct-u-size22 {
                    font-size: 22px;
                }

                .ct-u-fontWeight300 {
                    font-weight: 300;
                }

                .marginTop40 {
                    margin-top: 40px !important;
                }

                .ct-u-paddingBoth100 {
                    padding: 100px 15px;
                }

                .culture-section {
                    background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url(https://www.solodev.com/assets/culture.jpg) top no-repeat;
                    / background-color: #095c87; /
                    / color: #fff; /
                }

                .company-sections,
                .careers-sections,
                .left-headquarter-section-img,
                .right-headquarter-section-img {
                    text-align: center;
                }

                .ct-u-paddingBoth100 {
                    padding: 100px 15px;
                }

                .company-sections h2,
                .careers-sections h2,
                .perks-section h2 {
                    font-weight: 800;
                    font-size: 50px;
                }

                .company-sections h2,
                .company-sections h3,
                .careers-sections h2,
                .perks-section h2 {
                    font-family: , sans-serif;
                }

                .slick-slider {
                    margin-bottom: 0;
                }

                .slick-slider {
                    position: relative;
                    display: block;
                    -moz-box-sizing: border-box;
                    box-sizing: border-box;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                    -webkit-touch-callout: none;
                    -khtml-user-select: none;
                    -ms-touch-action: pan-y;
                    touch-action: pan-y;
                    -webkit-tap-highlight-color: transparent;
                }

                .slick-slider .slick-track,
                .slick-slider .slick-list {
                    -webkit-transform: translate3d(0, 0, 0);
                    -moz-transform: translate3d(0, 0, 0);
                    -ms-transform: translate3d(0, 0, 0);
                    -o-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                }

                .slick-list {
                    position: relative;
                    display: block;
                    overflow: hidden;
                    margin: 0;
                    padding: 0;
                }

                .slick-track {
                    position: relative;
                    top: 0;
                    left: 0;
                    display: block;
                }

                .slider .item {
                    overflow: hidden;
                }

                .slick-slide {
                    display: none;
                    float: left;
                    height: 100%;
                    min-height: 1px;
                }

                .logos {
                    margin-right: -5px;
                    margin-left: -5px;
                }

                ul.logos li {
                    cursor: pointer;
                }

                .logos>li {
                    float: left;
                    width: 16.66666%;
                    padding: 5px;
                }

                .logos .logos-inner {
                    position: relative;
                }

                .slick-slide img {
                    display: inline-block;
                }

                .logo-image {
                    position: relative;
                    width: 100%;
                }

                ul.logos li {
                    cursor: pointer;
                }

                .logos>li {
                    float: left;
                    width: 16.66666%;
                    padding: 5px;
                }

                .logos .logos-inner {
                    position: relative;
                }

                .slick-slide img {
                    display: inline-block;
                }

                img {
                    display: inline-block;
                    max-width: 100%;
                    vertical-align: middle;
                }

                .fa {
                    font-size: 42px;
                }

                .btn-solodev-red-reversed {
                    background-color: #fff;
                    color: #d2282e;
                    -webkit-transition: all 0.3s ease;
                    transition: all 0.3s ease;
                    padding: 12px 35px;
                }

                .btn,
                .btn-blk {
                    font-size: 18px !Important;
                }

                a:hover,
                a:focus {
                    text-decoration: none;
                }

                .ct-u-size19 {
                    margin-top: 40px;
                }

                a:hover {
                    color: #000;
                }

                section.clients-home .clients-logos .client-logos-repeater {
                    height: 260px;
                    border-right: 1px solid #ccc;
                    border-bottom: 1px solid #ccc;
                    cursor: pointer;
                }

                section.clients-home .clients-logos .client-logos-repeater img {
                    position: absolute;
                    top: 0;
                    bottom: 0;
                    margin: auto;
                    left: 0;
                    right: 0;
                }

                .logo-title {
                    position: absolute;
                    display: none;
                    top: 0px;
                    left: 0px;
                    width: 100%;
                    height: 100%;
                    font-size: 16px;
                    font-weight: 700;
                    line-height: 16px;
                    text-transform: uppercase;
                    color: #FFF;
                    background-color: #0079c2;
                }

                .ct-u-paddingBottom100 {
                    margin-top: 40px;
                }

                .culture-section {
                    background-size: cover;
                    color: #fff;
                }
        </style>
        </body>
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" />
        <link href="about-us.css" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" /></html>
            ';
        $about_us->description = $description;
        $about_us->save();


    }
}
