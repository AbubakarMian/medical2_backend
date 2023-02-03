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

    .gssw {
        /* display: inline-block; */
        width: 50%;
        /* height: 80%; */
        margin: 0 auto;
        border: 1px solid gray;
        border-radius: 12px;
        /* background: #eee url(https://i.pinimg.com/originals/b3/17/db/b317db2….jpg) no-repeat; */
        /* background-size: 100%; */
        background: #e9e3e31f;
        margin-top: 50px;
        margin-bottom: 50px;
        text-align: center;
        padding: 25px;
    }

    h1#cert-holderup {
        font-size: 20px;
        color: #be2d24;
    }

    p.smaller {
        font-size: 16px !important;
        font-weight: 500 !important;
    }

    div#cert-desc {
        width: 70%;
    }

    p#cert-from {
        color: #f1582b;
        font-family: sans-serif;
        font-weight: 600;
        font-size: 14px !important;
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
        font-size: 18px;
        font-family: system-ui;
        color: #595959;
        font-weight: 500;
    }

    .ahc {
        text-align: center;
    }

    .ahcdsa img {
        height: 100px;
        margin-top: 30px;
    }

    .gsd b {
        font-size: 15px !important;
        margin-left: 8px;
    }

    .fote {
        text-align: center;
        padding-top: 25%;
    }

    .crez {
        background: #f1582b !important;
        color: white !important;
        width: 64px;
    height: 30px;
    }

    .ahcdsa img {
        margin: 0 auto;
    }

    .container.asdcka {
        /* width: 40%; */
        margin: 0 auto !important;
    }

    @media only screen and (max-width : 480px) {
        .gssw {
            width: 80%;
        }

        .container.asdcka {
            width: fit-content;
        }
        .gssw {
    /* display: inline-block; */
    width: fit-content;
    /* height: 80%; */
    /* margin: 0 auto; */
    border: 1px solid gray;
    border-radius: 12px;
    /* background: #eee url(https://i.pinimg.com/originals/b3/17/db/b317db2….jpg) no-repeat; */
    /* background-size: 100%; */
    background: #e9e3e31f;
    margin-top: 50px;
    margin-bottom: 50px;
    text-align: center;
    padding: 25px;
}
    }
</style>

<body>

    <?php
  $payment = $details['payment'];
  ?>

    <div class="gssw">
        <div class="container asdcka">
            <div class="row">
                <div class="col-sm-12 ahc">
                    <div class="ahcdsa">
                        {{-- <img src="images/logo-icon.png" class="img-responsive"> --}}
                        <a href="#"><img src="{!! asset('theme/user_theme/images/logo-icon.png') !!}" class="img-responsive" /></a>
                    </div>
                </div>
            </div>

            <b>
                <center>
                    <h5> Your payment is successfully refunded</h5>
                    {{-- <a href="{!! $payment->receipt_url !!}"> --}}
                        <button type="button" class="btn btn-success crez">Recipt</button>
                    {{-- </a> --}}
                </center>
            </b>

            <div class="fote">
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
    </div>

</body>
