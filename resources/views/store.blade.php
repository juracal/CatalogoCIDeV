<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registro de Juego</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{asset('/css/style.css') }}" rel="stylesheet" type="text/css ">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


</head>

<body class="body_login">

  <div class="bg-info border-info banner" style="margin-bottom:100px;height:130px;">
    <img style="color:white;float:left; width:100px;" src='http://www.mallvarna.com/files/rte/article33/batux-tux-g2-hd-200x200.png'></img>
    <form class="navbar-form navbar-center" style="text-align:center;">
        <div class="form-group" style="width:30%;margin-top: 2%">
          <input style="width:100%;" type="text" class="form-control " placeholder="Search">
        </div>
        <button style="margin-top: 2%"type="submit" class="btn btn-default">Submit</button>
    </form>

    <div style="text-align:right;">
      <a style=" font-size: 2em;color:white;" href="login">Login</a>
      <a style="font-size: 2em;color:white; height:0px;" href="create">/Register</a>
    </div>
  </div>




  <div class="main_container">
      @foreach($games as $game)
     <div class="bg-info game_figure"><figure><img class="img_store" src="{{Storage::url($game->miniature)}}"</img></figure>{{$game->title}} </div>
      @endforeach
</div>
<div class="pagination">
{{ $games->links()}}
</div>
</body>
</html>
