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

    div{
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
</style>

<div>
    <img src="{{ URL('storage/email-verification.png') }}" />

    <h2>{{ __('general.confirm_email') }}</h2>

    <h3>{{ __('general.click_for_verify') }}</h3>

    <a href="{{ $url }}">
        <button>{{ __('general.verify_email') }}</button>
    </a>
</div>

