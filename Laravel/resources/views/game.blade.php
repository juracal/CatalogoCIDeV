<!DOCTYPE html>
<html>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{$game->title}}</title>

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


  <div>
    <a class="btn" href="{{ url('/game/' . $game->id) }}" type="button">Información</a>
    <a class="btn" href="{{ url('/comments/' . $game->id) }}" type="button">Comentarios</a>
  </div>

  <div id="title_game" style="text-align:center;margin-top:100px;float:right;margin-right:100px;display:inline-block;" >
     <h2 class="text-primary">{{$game->title}}</h2>
    <div class="text_desc" style="width:500px;height:100px;display:inline-block">{{$game->description}}</div>
    <div  style="border:solid;background-color:#618685;">
    <h4 style="color:white">Descargar</h4>
    @foreach ($game->archive as $archive)
    <form method="post" action="/game/download/{{$archive->id}}/{{$archive->operative_system}}"style="display:inline-block">
  {{csrf_field()}}
    <button style="background-color:transparent;color:white;" class="btn">{{$archive->operative_system}}</button>
    </form>
    @endforeach
</div>

  </div>






  <div style="height: 600px; width: 600px;float:left;margin-top:150px;">

    <div style = "width:100%;" id="demo" class="carousel slide" data-ride="carousel">

    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" classssssssss="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img style="height: 600px; width: 600px" src="{{Storage::url($images[0]->url)}}" alt="Screenshot 1">
      </div>
      <div class="carousel-item">
        <img style="height: 600px; width: 600px" src="{{Storage::url($images[1]->url)}}" alt="Screenshot 2">
      </div>
      <div class="carousel-item">
        <img style="height: 600px; width: 600px" src="{{Storage::url($images[2]->url)}}" alt="Screenshot 3">
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
<div style="margin-top:100px;">
<iframe src="{{$game->video}}" height="300px" width="100%" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>





</body>


</html>
