<!DOCTYPE html>
<html>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Videojuego</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="{{asset('/css/style.css') }}" rel="stylesheet" type="text/css ">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>

<body>

  <div class="bg-info  border-info banner" >
    <h1 style="color:white; text-align:left;">CIDeV</h1>
  </div>

  <div id="title_game">
     <h2 style="text-align:center;" class="text-primary">{{$game->title}}</h2>
  </div>

  <div class="block">
   &nbsp;
   &nbsp;
   &nbsp;
   &nbsp;
  </div>


  <img style="color: white; align-content: center; width:400px;height:400px;" src = "{{Storage::url($game->miniature)}}" > </img>

  <div style="height: 400px; width: 600px" >

    <div style = "center" id="demo" class="carousel slide" data-ride="carousel">

    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" classssssssss="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img style="height: 400px; width: 600px" src="{{Storage::url($images[0]->url)}}" alt="Screenshot 1">
      </div>
      <div class="carousel-item">
        <img style="height: 400px; width: 600px" src="{{Storage::url($images[1]->url)}}" alt="Screenshot 2">
      </div>
      <div class="carousel-item">
        <img style="height: 400px; width: 600px" src="{{Storage::url($images[2]->url)}}" alt="Screenshot 3">
      </div>
    </div>


    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>

  </div>
</div>

<!-- Video -->

<iframe width="560" height="315" src="{{$game->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


<div class = "h2">
  Descripcion
</div>


<p>{{$game->description}}</p>


<form class="comment_form " method="post" action="/comment">

  <div class = "h2">
    Comentarios
  </div>

  <div>
    <textarea rows="4" cols="50" placeholder = "Comenta aquí..."> </textarea>
  </div>

  <div>
    <button type="button">Comentar</button>
  </div>

</form>

</body>


</html>
