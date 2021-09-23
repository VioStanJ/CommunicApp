<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CommunicApp :: Check Image</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <style>
        img{
            -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
            box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
            width: 80%;
            height: auto;
            object-fit: contain;
            border-radius: 5px;
        }
        #left{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }
        #right{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }
        .btn {
            text-align: center;
            padding: 10px 20px;
            background : white;
            text-decoration: none;
            color :rgb(8, 155, 160);
        }
    </style>
    <div style="width: 100%; height: 100vh; background: rgb(8, 155, 160);">
        <div class="row">
            <div class="col-md-6" id="left">
                <img src="{{asset($chat->link)}}" alt="{{$chat->id}}"/>
            </div>
            <div class="col-md-6" style="display: flex; flex-direction: column;" id="right">
                <div>
                    <h2 class="text-white">Resultat</h2>
                    <h2 class="text-warning font-weight-bold">{{$output['status']}}</h2>
                </div>
                <hr>
                <div style="display: flex; flex-direction: column;">


                    @if (isset($output['nudity']))
                        <h3>Nudité</h3>
                        <div class="row">
                            @foreach ($output['nudity'] as $key => $item)
                            <div class="alert alert-primary ml-2" role="alert">
                                {{$key}} :: {{$item*100}} %
                            </div>
                            @endforeach
                        </div>
                    @endif

                    @if (isset($output['weapon']))
                    <h3>Arme</h3>
                    <div class="alert alert-primary ml-2" role="alert">
                        {{$output['weapon']*100}} %
                      </div>
                    @endif

                    @if (isset($output['alcohol']))
                    <h3>Alcool</h3>
                    <div class="alert alert-primary ml-2" role="alert">
                        {{$output['alcohol']*100}} %
                      </div>
                    @endif

                    @if (isset($output['drugs']))
                    <h3>Drogue</h3>
                    <div class="alert alert-primary ml-2" role="alert">
                        {{$output['drugs']*100}} %
                      </div>
                    @endif

                </div>
            </div>
        </div>
        <div style="display: flex; justify-content : center;">
            <a class="btn" href="/home"> <- Go back to app</a>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
