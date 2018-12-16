<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{asset('/css/style.css') }}" rel="stylesheet" type="text/css ">
</head>



<body>
  <div class="header">
   &nbsp;
   &nbsp;
   &nbsp;
   &nbsp;
  </div>

  <div class="h1">
    <h1>Página de Registro</h1>
  </div>

  <div class="block">
   &nbsp;
   &nbsp;
   &nbsp;
   &nbsp;
  </div>



<form method="post" action="/create">
  {{csrf_field()}}




  <div>
    <input type="text" name="name" placeholder="Ingrese nombre" required></input>
  </div>

  <div>
    <input type="text" name="last_name" placeholder="Ingrese apellido" required></input>
  </div>

  <div>
    <input type="text" name="email" placeholder="Ingrese correo" required></input>
  </div>

  <div>
    <input type="password" name="password" placeholder="Ingrese Contraseña" required></input>
  </div>


    <select name="rls">
      @foreach($roles as $role)
      <option>{{$role->name}}</option>
      @endforeach
    </select>


  <div>
  <button type="submit" > Registrar </button>
  </div>

</form>

</body>
</html>
