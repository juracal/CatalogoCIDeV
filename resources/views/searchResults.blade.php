<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portafolio CIDeV</title>

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

<div style="float:right;margin-right: 10px;">
  <a style=" font-size: 1.5em;color:white;" href="login">Login</a>
  <a style="font-size: 1.5em;color:white; " href="create">/Register</a>
</div>




<div style="height: 130px;" class=" bg-info border-info banner">
  <img style="color:white;float:left; width:100px;height:100px;" src='http://www.mallvarna.com/files/rte/article33/batux-tux-g2-hd-200x200.png'></img>
<form class="navbar-form navbar-center" style="text-align:center;" method="post" action="/game/search">
    {{csrf_field()}}
    <div class="input-group" style="width:50%;margin-left:10px;margin-top:30px; ">
      <span class="input-group-btn">
        <div class="form-group select" >
            <select id="a"name="choice" class="form-control"style="width:100px">
                <option value="title" selected="selected">
                    Título
                </option>
                <option value="tag">
                    Tag
                </option>
            </select>
        </div>
      </span>
      <input style="width:600px;" name="search" class="form-control" placeholder="Ingrese palabra de búsqueda">
    </div>
    <button class="btn btn-success" style="width:100px;margin-left:10px;margin-top:30px;"value="Buscar">Buscar</button>
</div>

  </form>
</div>


<div>
      @foreach($games as $game)
     <div class="result_div" style="height:100px;"><figure><img class="img_src"  src="{{Storage::url($game->miniature)}}"</img></figure>
       <label style="margin-top:50px;">{{$game->description}}</label>
     </div>



     <div  class="div_label">
       <label style="float:left; margin-left:20px;" >Título: {{$game->title}}</label>
       <br></br>
       <label style="float:left; margin-left:20px;" >Autor: {{$game->user->name}}</label>
     </div>
      @endforeach
</div>


<div class="pagination">
{{ $games->links()}}
</div>

</body>

</html>
