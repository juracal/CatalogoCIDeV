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

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>

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
  <div>
    @if (count($errors) > 0)
   <div class = "alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
@endif

  <form method="post" action="/user/{{$user->id}}/proyecto/{{$game->id}}/edit" enctype="multipart/form-data">
    {{csrf_field()}}

  <div style="margin-top:16px;" class="split left">
    <div class="centered">
    <div>
      <input class="form-control"  type="text" name="title" value="{{$game->title}}" required></input>
    </div>

    <div >
      <textarea class="form-control" style="margin-top:20px;margin-bottom:20px;"  name="description" required>{{$game->description}}</textarea>
    </div>

    <select data-live-search="true"  style="margin-top:50px;" class="selectpicker form-control"  name="tags[]" multiple required>
      @foreach($tags as $tag)
      <option>{{$tag->name}}</option>
      @endforeach
    </select>
    <div>
      <input class="form-control" style="margin-top:20px;" type="text" name="video" value="{{$game->video}}" required></input>
    </div>



    <div>
      <button class="btn_accept btn-success formal-form btn btn-lg" type="submit">Guardar</button>
    </div>
    <div>
     <a style="margin-top: 40px;"class="fa fa-arrow-left btn btn-primary btn-back" href="{{ URL::previous()}}"> Go Back</a>
    </div>
  </div>

</div>


<div class="split right">
  <div class="centered2">

    <div class="custom-file inputfile" style="margin-top:20px;">
      <input type="file" name="miniature" class="custom-file-input" id="customFileLang" lang="es">
      <label class="custom-file-label" for="customFileLang">Thumbnail</label>
    </div>



  <div class="custom-file inputfile" style="margin-top:20px;">
    <input type="file" name="ss1" class="custom-file-input" id="customFileLang" lang="es">
    <label class="custom-file-label" for="customFileLang">ScreenShot1</label>
  </div>




<div class="custom-file inputfile" style="margin-top:20px;">
  <input type="file" name="ss2" class="custom-file-input" id="customFileLang" lang="es">
  <label class="custom-file-label" for="customFileLang">Screenshot 2</label>
</div>


<div class="custom-file inputfile" style="margin-top:20px;">
 <input type="file" name="ss3" class="custom-file-input" id="customFileLang" lang="es">
 <label class="custom-file-label" for="customFileLang">Screenshot 3</label>
</div>



<div class="custom-file inputfile" style="margin-top:20px;">
 <input type="file" name="fw" class="custom-file-input" id="customFileLang" lang="es">
 <label class="custom-file-label" for="customFileLang">Archivo Windows</label>
</div>



<div class="custom-file inputfile" style="margin-top:20px;">
 <input type="file" name="fl" class="custom-file-input" id="customFileLang" lang="es">
 <label class="custom-file-label" for="customFileLang">Archivo Linux</label>
</div>


<div class="custom-file inputfile" style="margin-top:20px;">
 <input type="file" name="fm" class="custom-file-input" id="customFileLang" lang="es">
 <label class="custom-file-label" for="customFileLang">Archivo Mac</label>
</div>

</div>

</form>
</body>
</html>
