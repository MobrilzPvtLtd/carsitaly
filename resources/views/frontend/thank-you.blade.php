@extends('frontend.layouts.services-app')

@section('title')
    {{ app_name() }}
@endsection
@section('style')
<style>
    .wrapper-1 {
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .wrapper-2 {
        padding: 30px;
        text-align: center;
    }

    h1 {
        font-family: 'Kaushan Script', cursive;
        font-size: 4em;
        letter-spacing: 3px;
        color: #00de87;
        margin: 0;
        margin-bottom: 20px;
    }

    .wrapper-2 p {
        margin: 0;
        font-size: 1.3em;
        color: #aaa;
        font-family: 'Source Sans Pro', sans-serif;
        letter-spacing: 1px;
    }

    .go-home {
        color: #fff;
        background: #00de87;
        border: none;
        padding: 10px 50px;
        margin: 30px 0;
        border-radius: 30px;
        text-transform: capitalize;
        box-shadow: 0 10px 16px 1px rgba(174, 199, 251, 1);
    }

    .footer-like {
        margin-top: auto;
        background: #D7E6FE;
        padding: 6px;
        text-align: center;
    }

    .footer-like p {
        margin: 0;
        padding: 4px;
        color: #00de87;
        font-family: 'Source Sans Pro', sans-serif;
        letter-spacing: 1px;
    }

    .footer-like p a {
        text-decoration: none;
        color: #00de87;
        font-weight: 600;
    }

    @media (min-width:360px) {
        h1 {
            font-size: 4.5em;
        }

        .go-home {
            margin-bottom: 20px;
        }
    }

    @media (min-width:600px) {
        .content {
            max-width: 1000px;
            margin: 0 auto;
        }

        .wrapper-1 {
            height: initial;
            max-width: 620px;
            margin: 0 auto;
            margin-top: 50px;
            box-shadow: 4px 8px 40px 8px #02be732a;
        }

    }
</style>
@endsection
@section('services-content')
<div class="row vertical-search">
    <div class=container>
        <div class=content>
            <div class="wrapper-1">
                <div class="wrapper-2">
                    <h1>Thank you !</h1>
                    <p>Thanks for getting in touch with us. </p>
                    <p>We will get back to you very soon </p>
                    <button class="go-home">
                        <a href="/" style="color: #fff">go home</a>
                    </button>
                </div>
                <!-- <div class="footer-like">
                <p>Email not received?
                <a href="#">Click here to send again</a>
                </p>
            </div> -->
            </div>
        </div>
    </div>
</div>

    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">
@endsection
