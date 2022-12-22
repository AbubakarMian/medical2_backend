<style>
    @import url('https://fonts.googleapis.com/css?family=Saira+Condensed:700');

    hr {
        background-color: #be2d24;
        height: 3px;
        margin: 5px;
    }

    div#cert-footer {
        position: absolute;
        width: 60%;
        top: 550px;
        text-align: center;
    }

    #cert-stamp,
    #cert-ceo-sign {
        width: 60%;
        display: inline-block;
    }

    div#cert-issued-by,
    div#cert-ceo-design {
        width: 40%;
        display: inline-block;
        float: left;
    }

    div#cert-ceo-design {
        margin-left: 10%;
    }

    h1 {
        font-family: 'Saira Condensed', sans-serif;
        margin: 5px 0px;
    }

    body {
        /* width: 950px;
        height: 690px;
        position: absolute; */
        left: 30px;
        top: 30px;

    }

    p {
        font-family: 'Arial', sans-serif;
        font-size: 18px;
        margin: 5px 0px;
    }

    html {
        display: inline-block;
        width: 1024px;
        height: 768px;
        margin: 0 auto;
        background: #eee url("https://i.pinimg.com/originals/b3/17/db/b317db24945589699a4ef18150dc5b73.jpg") no-repeat;
        background-size: 100%;
        margin-top: 50px;
    }

    h1#cert-holderup {
        font-size: 20px;
        color: #be2d24;
    }

    p.smaller {
        font-size: 16px !important;
    }

    div#cert-desc {
        width: 70%;
    }

    p#cert-from {
        color: #3bb54a;
        font-family: initial;
    }



    div#cert-verify {
        opacity: 1;
        position: absolute;
        top: 680px;
        left: 60%;
        font-size: 12px;
        color: grey;
    }

    .gssw h5 {
        font-size: 20px;
        font-family: initial;
        color: #1a1a1a;
    }

    .ahc {
        text-align: center;
    }

    .ahcdsa img {
        height: 89px;
        margin-top: 21px;
    }

    .gsd b {
        font-size: 15px !important;
        margin-left: 8px;
    }
</style>

<body>

    <?php
    $payment = $details['payment'];
    ?>

    <div class="gssw">

        <div class="row">
            <div class="col-sm-12 ahc">
                <div class="ahcdsa">
                    <a href="#"><img src="{!! asset('theme/user_theme/images/logo-icon.png') !!}" class="img-responsive" /></a>
                </div>
            </div>
        </div>

        <b>
            <center>
                <h5> Your payment is successfully refunded
                    <a href="{!! $payment->receipt_url !!}">
                        Recipt
                    </a>
                </h5>
            </center>
        </b>

        <div style="padding-top: 8%">
            <b>
                <p id="cert-from" class="smaller">
                    &nbsp; from {!! $details['from'] !!}
                </p>
                <p class="smaller gsd" id='cert-issued'>
                    <b>Issued on:</b> {!! $details['dated'] !!},
                </p>
                <p class="smaller gsd" id='cert-issued'>
                    <b>
                        Thankyou Medical2
                    </b>
                </p>
        </div>
    </div>

</body>
