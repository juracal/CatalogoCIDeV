<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registro de Juego</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{asset('/css/style.css') }}" rel="stylesheet" type="text/css ">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>



</head>
<body>
  <div class="h1">
    <h1>Registrar Juego</h1>
  </div>

  <div class="block">
   &nbsp;
   &nbsp;
   &nbsp;
   &nbsp;
  </div>

  <form method="post" action="/user/{{$user->id}}/proyectos/create" enctype="multipart/form-data">
    {{csrf_field()}}

  <div class="split left">
    <div class="centered">
    <div>
      <input class="form-control"  type="text" name="title" placeholder="Título" required></input>
    </div>

    <div >
      <textarea class="form-control" style="margin-top:20px;margin-bottom:20px;"  name="description" placeholder="Descripción" required></textarea>
    </div>

    <select data-live-search="true" style="margin-top:50px;" class="selectpicker form-control"  name="tags[]" multiple>
      @foreach($tags as $tag)
      <option>{{$tag->name}}</option>
      @endforeach
    </select>
    <div>
      <input class="form-control" style="margin-top:20px;" type="text" name="video" placeholder="Video" required></input>
    </div>

    <div>
     <a class="fa fa-arrow-left btn btn-primary btn-back" href="{{ URL::previous()}}"> Go Back</a>
    </div>
  </div>



</div>






 <div class="split right">
   <div class="centered2">

   <div class=input_register2>
     <label class="btn btn-default fa fa-image">
     Adjuntar  Miniatura<input type="file" >
    </label>
   </div>


   <div class=input_register2>
     <label class="btn btn-default fa fa-image">
     Adjuntar  Screenshot1 <input type="file" >
    </label>
   </div>



   <div class=input_register2>
     <label class="btn btn-default  fa fa-image">
     Adjuntar  Screenshot 2 <input type="file" >
    </label>
   </div>


   <div class=input_register2>

     <label class="btn btn-default fa fa-image">
     Adjuntar Archivo Screenshot 3 <input type="file" >
    </label>
   </div>



   <div class=input_register2>

     <label class="btn btn-default fa fa-windows ">
     Adjuntar Archivo Windows <input type="file" >
    </label>
   </div>




   <div class=input_register2>
     <label class="btn btn-default fa fa-linux  ">
     Adjuntar Archivo Linux <input type="file" >
    </label>
  </div>




   <div class=input_register2>
     <label class=" btn btn-default fa fa-apple ">
     Adjuntar Archivo Mac <input type="file" >
    </label>
   </div>





 </div>

</div>


<div>
  <button class="btn_accept btn-success formal-form btn btn-lg" type="submit">Guardar</button>
</div>


</form>
