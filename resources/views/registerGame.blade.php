<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registro de Juego</title>

    <link href="{{asset('/css/style.css') }}" rel="stylesheet" type="text/css ">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>



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

  <form method="post" action="/user/{{$user->id}}/proyectos" enctype="multipart/form-data">
    {{csrf_field()}}

  <div class="split left">
    <div>
      <input type="text" name="title" placeholder="Título" required></input>
    </div>

    <div>
      <textarea  name="description" placeholder="Descripción" required></textarea>
    </div>

    <select data-live-search="true"  class="selectpicker"  name="tags[]" multiple>
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
<<<<<<< HEAD

     <input  type="file" name="video" placeholder="Video"></input>

=======
     <input type="text" name="video" placeholder="Video"></input>
>>>>>>> 36d2fdc1a8c5710697a8779571b8ab86c384b402
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


</form>
