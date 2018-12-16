<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar</title>


    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/style.css') }}" rel="stylesheet" type="text/css ">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
  <div class="h1">
    <h1>Editar mi perfil</h1>
  </div>

  <div class="block">
   &nbsp;
   &nbsp;
   &nbsp;
   &nbsp;
  </div>



  <form method="post" action="/user/{{$user->id}}/edit" enctype="multipart/form-data">
    {{csrf_field()}}

  <div class="split left">


    <div class="centered">
      <img width=400px height="400px" src='{{Storage::url($user->image)}}'></img>
      <input class="inputfile" type="file" name="avatar" placeholder="Ingrese foto de perfil"></input>
    </div>

  </div>

 <div class="split right">
   <div class="centered">
   <div >
     <input class="edit_input" type="text" name="username" value="{{$user->name}}" required></input>
   </div>
   <div>
     <input class="edit_input" type="text" name="last_name" value="{{$user->last_name}}"required></input>
   </div>
   <div>
     <textarea  class="edit_input"  name="description">{{$user->description}}</textarea>
   </div>
   <div>
     <input class="edit_input" type="text" name="email" value="{{$user->email}}"required></input>
   </div>

   <div>
     <button class="edit_input" type="submit" > Editar </button>
   </div>

</div>
 </div>
</form>
</body>
</html>
