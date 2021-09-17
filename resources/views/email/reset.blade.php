{{-- @component('mail::message') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CommuniApp</title>
</head>
<body style="background: #edf2f7; padding: 20px;font-family: Arial, Helvetica, sans-serif; padding: 25px 20px 20px 25px;">
    <div style="background: white; padding: 20px; border-radius: 6px;">
        <br>
        <div style="display: flex; justify-content: center; align-items: center;margin-top: 10px;">
            <h4>CommunicApp</h4>
        </div>
        <br><br>
        <p>Welcome to Icosol , Mr/Mrs {{$user->name}} !</p>
        <br>
        <p>Verify your account.</p>

        @component('mail::button', ['url' => 'https://app.cdevlop.com/user/verification/'.$code->code])
        To Verify Click !!!
        @endcomponent

        <h3>Thank you for choosing us !!!</h3>

    </div>
</body>
</html>
