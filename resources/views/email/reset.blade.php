<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
    body {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    * {
        font-family: 'Inter';
    }

    .wrapper{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    h2{
        font-weight: 900;
        font-size: 25px;
        color: #010414;
    }

    h3{
        font-weight: 400;
        font-size: 18px;
        color: #010414;
        margin: 30px;
        text-align: center;
        line-height: 1.5;
    }

    button {
        width: 392px;
        height: 56px;
        background: #0FBA68;
        border-radius: 8px;
        font-weight: 900;
        font-size: 16px;
        color: #FFFFFF;
        cursor: pointer;
        border: none;
    }

    .img-wrapper{
        max-width: 520px;
    }

    img {
        width: 100%;
        height: 100%;
    }

    @media (max-width: 375px) {
        .img-wrapper {
            width: 300px;
        }

        button {
            width: 300px;
        }
    }

    @media (min-width: 375px) {
        .img-wrapper {
            width: 343px;
        }

        button {
            width: 343px;
        }
    }

    @media (min-width: 768px) {
        .img-wrapper{
            width: 520px;
        }

        button {
            width: 392px;
        }
    }
</style>

<div class="wrapper">
    <div class="img-wrapper">
        <img src="{{ URL('storage/email-verification.png') }}" />
    </div>

    <h2>{{ __('general.recover') }}</h2>

    <h3>{{ __('general.click_for_recover') }}</h3>

    <a href="{{ $url }}">
        <button>{{ __('general.recover_password') }}</button>
    </a>
</div>

