<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
<div style="text-align: center">

    <div style="max-width: 520px; height: 365px; margin: 10px auto; padding: 10px">
        <img style="width: 100%; height: 100%" src="{{ url('https://res.cloudinary.com/dt5wsfrex/image/upload/v1663517694/email-verification_raalr9.png') }}" />
    </div>

    <h2 style="font-family: 'Inter';
                font-weight: 900;
                font-size: 25px;
                color: #010414;"
    >{{ __('general.confirm_email') }}</h2>

    <h3 style="font-family: 'Inter';
                font-weight: 400;
                font-size: 18px;
                color: #010414;
                text-align: center;
                line-height: 1.5;"
    >{{ __('general.click_for_verify') }}</h3>

    <a href="{{ $url }}" style="padding: 5px; max-width: 392px">
        <button style="font-family: 'Inter';
                    width: 40%;
                    height: 56px;
                    background: #0FBA68;
                    border-radius: 8px;
                    font-weight: 900;
                    font-size: 16px;
                    color: #FFFFFF;
                    cursor: pointer;
                    border: none;"
        >{{ __('general.verify_email') }}</button>
    </a>
</div>

</body>
</html>

