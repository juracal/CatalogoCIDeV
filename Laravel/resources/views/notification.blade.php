<!DOCTYPE html>
<html>

<header>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link href="{{asset('/css/style.css') }}" rel="stylesheet" type="text/css ">
</header>

<body class="body_login ">

  <div class="nav">
       <ul >
         @if (Auth::id() and $user->role_id ==1)
         <li ><a href="/user/{{$user->id}}/proyectos">Juegos</a></li>
         <li><a  id="usuarios" href="/user/{{$user->id}}/usuarios">Usuarios</a></li>
        <li><a href="/notification">Notificaciones</a></li>

         <li id="profile" style="float:right;"><img class="img_prof" style="width:50px;height:50px;border-radius: 50%;" src="{{Storage::url($user->image)}}"></img>
           <label style="opacity: 0.50">{{$user->name}}</label>
           <ul>
             <li id="profile"><a href="/user/{{$user->id}}/edit/{{$user->id}}">Mi Perfil</a></li>
             <li  id="profile"><a href="/logout">Cerrar Sesión</a></li>
           </ul>
         </li>
         @endif

         @if (Auth::id() and $user->role_id == 2)
         <li id="usuarios"><a href="/user/{{$user->id}}/proyectos">Mis Juegos</a></li>

         <li style="float:right;"><img class="img_prof" style="width:50px;height:50px;border-radius: 50%;" src="{{Storage::url($user->image)}}"></img>
           <label>{{$user->name}}</label>
           <ul>
             <li id="profile"><a href="/user/{{$user->id}}/edit/{{$user->id}}">Mi Perfil</a></li>
             <li  id="profile"><a href="/logout">Cerrar Sesión</a></li>
           </ul>
         </li>
         @endif
       </ul>
     </div>

<form class="login_form " method="post" action="/notification">
     {{ csrf_field() }}

     @if (session('status'))
         <div class="alert alert-danger" id=alert>
             {{ session('status') }}
         </div>
     @endif

  <div id="title_login">
     <h3 class="text-primary">Envío de Notificaciones</h3>
  </div>

  <div>
    <input class="login_input form-control"  type="text" name="subject" placeholder="Asunto" required></input>
  </div>

  <div>
    <textarea class="login_input form-control" type="password" name="description" placeholder="Mensaje" required></textarea>
  </div>

  <div>
    <button class="form-control btn btn-info" type="submit" > Enviar </button>
  </div>

</form>



</body>

<script>
$(".alert").delay(4000).slideUp(200, function() {
    $(this).alert('close');
});
</script>

</html>
