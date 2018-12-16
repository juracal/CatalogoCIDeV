<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registro de Juego</title>


    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/style.css') }}" rel="stylesheet" type="text/css ">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
  <div class="h1">
    <h1>Página de Registro</h1>
  </div>

  <div class="block">
   &nbsp;
   &nbsp;
   &nbsp;
   &nbsp;
  </div>

  <form method="post" action="/register" enctype="multipart/form-data">
    {{csrf_field()}}

  <div class="split left">
    <div>
      <input type="text" name="title" placeholder="Título" required></input>
    </div>

    <div>
      <textarea  name="description" placeholder="Descripción" required></textarea>
    </div>

    <select  name="tags[]" multiple>
      @foreach($tags as $tag)
      <option>{{$tag->name}}</option>
      @endforeach
    </select>
    <div>
      <input type="text" name="genre" placeholder="Género" required></input>
    </div>
    <div>
      <input type="text" name="url" placeholder="Url Local" required></input>
    </div>
  </div>









 <div class="split right">
   <div>
     <input type="file" name="video" placeholder="Video"></input>
   </div>
   <div>
     <input type="file" name="miniature" placeholder="Miniatura" ></input>
   </div>
   <div>
     <input type="file" name="ss1" placeholder="Screenshot1" ></input>
   </div>
   <div>
     <input type="file" name="ss2" placeholder="Screenshot2" ></input>
   </div>
   <div>
     <input type="file" name="ss3" placeholder="Screenshot3" ></input>
   </div>
   <div>
     <input type="file" name="fw" placeholder="Archivo de Windows"></input>
   </div>
   <div>
     <input type="file" name="fl" placeholder="Archivo de Linux" ></input>
   </div>
   <div>
     <input type="file" name="fm" placeholder="Archivo de Mac" ></input>
   </div>

 </div>