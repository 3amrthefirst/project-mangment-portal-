<!DOCTYPE html>
<html>
<head>
    <title>welcome call</title>

<link rel="stylesheet" href="{{asset('pdf/css/style.css')}}">
<link rel="stylesheet" href="{{asset('pdf/css/bootstrap.css')}}">
<style>
    section p {
        line-height: 2em;
        font-size: larger;
    }
    .blue{
        color:  #0D3A59 ;
    }
    .bg-blue{
        background-color: #0D3A59;
    }
    .zeti{
        color: #93BA3D;
    }
    .bg-zeti{
        background-color: #93BA3D;
    }
</style>
</head>
<body>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-12">
            <section class="px-3">


                <h4 class="blue"> A WELCOME FROM THE PRESIDENT </h4>
                <p>
                    Please let me extend to you a very warm welcome to All Premium Contractors family! All Premium is deeply committed to providing intelligent and sustainable alternatives to constantly rising energy costs. All Premium Contractors is proud to be an established industry leader in the Residential Solar Installation, Energy Reduction sector and General Contractor for all Home Improvement needs throughout the State of California. With decades of experience Contracting, energy reduction and production, we are pleased to provide custom tailored solutions designed specifically for your home. <br><br>

                    Whether the need is saving money or making your home safer or more comfortable, we partner with you to make that happen. All Premium Contractors is the clear choice and trusted partner to help you save thousands your utility bill. Having built luxury homes for over a decade and being licensed in California since 2008, All Premium Contractors vast experience and trained attention to detail has been combined to serve you, our valued client. We are grateful to have the opportunity to care for you and your home and are dedicated to making your energy saving experience positive and seamless. <br><br>

                    Today is a great day for to take your power back and we are grateful to be your partner in this grand endeavor!

                <h6>
                    Warmest Regards,
                </h6>
                <h5>
                    Melissa Rivera <br> President
                </h5>


                <p>
                    I AM PLEASED TO INTRODUCE YOU TO YOUR DEDICATED AND HIGHLY SKILLED <br>
                    <span class="blue"> {{$name}} </span> 	OUR PRIMARY POINT OF CONTACT
                    THROUGHOUT YOUR ENERGY SAVINGS PROJECT.

                </p>

                <div class="row py-4 bg-zeti">
                    <div class="col-lg-8">
                        <h6 class="text-light fw-bolder fs-4"> {{$name}} </h6>
                        <hr style="width:40%">
                        <ul>
                            <li> {{ $name }} </li>
                            <li> {{ $email }} </li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <img src="http://pmb.boxbyld.tech/profiles/welcome_images/all-premium.png" class="img-fluid" alt="">
                    </div>
                </div>
            </section>

            <section class="p-5 my-5 text-light bg-blue">
                <h4> A WELCOME FROM {{$name}} </h4>

                <p>
                    I am truly honored to be your dedicated Project Manager. I am passionate about your project and will work to streamline your energy upgrade and solar delivery experience. In order to keep you informed and in the loop, I will be in touch with you through phone calls and emails throughout the process. As your dedicated Project Manager, I welcome your calls and emails and look forward to serving you, so please don't hesitate to call me with any updates or questions you may ever have.
                </p>
                <h6>
                    Respectfully,
                </h6>
                <h6>
                    {{$name}} <br>
                    Project Manager
                </h6>
                <div style="margin-top: 500px; " class="text-center fw-bold">
                    <p class="zeti">
                        WHEN WE LIVE UP TO YOUR EXPECTATIONS, PLEASE BE SURE TO <span class="text-light ">TELL EVERYONE</span>.
                    </p>
                    <p class="zeti">
                        IF FOR ANY REASON l FALL SHORT, PLEASE REACH OUT TO MY MANAGER: <br>
                    <p class="text-light"> {{$email}} </p>

                </div>
            </section>
            <div class="row">
                <div class="col-lg-12">
                    <img src="http://pmb.boxbyld.tech/profiles/welcome_images/english3.png" alt="" class="img-fluid w-100">
                </div>
                <div class="col-lg-12">
                    <img src="http://pmb.boxbyld.tech/profiles/welcome_images/english4.png" alt="" class="img-fluid w-100">
                </div>
                <div class="col-lg-12">
                    <img src="http://pmb.boxbyld.tech/profiles/welcome_images/english5.png" alt="" class="img-fluid w-100">
                </div>
                <div class="col-lg-12">
                    <img src="http://pmb.boxbyld.tech/profiles/welcome_images/english6.png" alt="" class="img-fluid w-100">
                </div>
                <div class="col-lg-12">
                    <img src="http://pmb.boxbyld.tech/profiles/welcome_images/english7.png" alt="" class="img-fluid w-100">
                </div>
                <div class="col-lg-12">
                    <img src="http://pmb.boxbyld.tech/profiles/welcome_images/english8.png" alt="" class="img-fluid w-100">
                </div>
                <div class="col-lg-12">
                    <img src="http://pmb.boxbyld.tech/profiles/welcome_images/english9.png" alt="" class="img-fluid w-100">
                </div>
                <div class="col-lg-12">
                    <img src="http://pmb.boxbyld.tech/profiles/welcome_images/english10.png" alt="" class="img-fluid w-100">
                </div>
                <div class="col-lg-12">
                    <img src="http://pmb.boxbyld.tech/profiles/welcome_images/english11.png" alt="" class="img-fluid w-100">
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
