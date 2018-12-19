<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="{{asset('/css/style.css') }}" rel="stylesheet" type="text/css ">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>


</head>



<body>
  <div class="nav">
       <ul>
         <li class="home"><a href="#">Juegos</a></li>
         <li class="tutorials"><a href="#">Usuarios</a></li>
         <li class="tutorials"><a href="#">Notificaciones</a></li>


         <li id="profile" style="float:right;"><img class="img_prof" style="width:50px;height:50px;border-radius: 50%;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSS50lYMo-3vCNMfn31Rh2VmAtp2pAZuHSPv_KtJCpqLprrdpX46A"></img>
           <label style="opacity: 0.50">Juan</label>
           <ul>
              <li id="profile"><a href="">Mi Perfil</a></li>
             <li id="profile"><a href="/logout">Cerrar Sesión</a></li>

           </ul>
         </li>


       </ul>
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




  <div class="bloc">
    <input class="input_register"type="text" name="name" placeholder="Ingrese nombre" required></input>
  </div>

  <div>
    <input  class="input_register" type="text" name="last_name" placeholder="Ingrese apellido" required></input>
  </div>

  <div data-tip="Ingrese el correo con el siguiente formato &nbsp jrcdic16@gmail.com ">
    <input class="input_register" type="email" name="email" placeholder="Ingrese correo" required></input>
  </div>

  <div>
    <input class="input_register" type="password" name="password" placeholder="Ingrese Contraseña" required></input>
  </div>


    <select class="input_register"  name="rls">
      @foreach($roles as $role)
      <option>{{$role->name}}</option>
      @endforeach
    </select>


  <div>
  <button class="input_register" type="submit" > Registrar </button>
  </div>

</form>

</body>
</html>
