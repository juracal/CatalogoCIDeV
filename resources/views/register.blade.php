<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{asset('/css/style.css') }}" rel="stylesheet" type="text/css ">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>
    <!DOCTYPE html>
    <html>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Editar</title>


        <link href="{{asset('/css/style.css') }}" rel="stylesheet" type="text/css ">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>
      <div class="h1">
        <h1>Registrar Usuario</h1>
      </div>

      <div class="block">
       &nbsp;
       &nbsp;
       &nbsp;
       &nbsp;
      </div>



      <form method="post"  action="/create" enctype="multipart/form-data">
        {{csrf_field()}}

      <div class="split left">


        <div class="img-rounded" style="background-color:white;">
          <img class="img-profile" width=300px height="300px" src='https://blog.ramboll.com/fehmarnbelt/wp-content/themes/ramboll2/images/profile-img.jpg'></img>
          <input class="inputfile" type="file" name="avatar" placeholder="Ingrese foto de perfil"></input>
          <div>
           <a class="fa fa-arrow-left btn btn-primary btn-back" href="{{ URL::previous()}}"> Go Back</a>
          </div>
        </div>



      </div>

     <div class="split right">
       <div class="centered">

       <div>
         <input class=" form-control input_register" type="text" name="username" placeholder="Nombre" required></input>
       </div>
       <div>
         <input class=" form-control input_register" type="text" name="last_name" placeholder="Apellido" required></input>
       </div>
       <div>

         <textarea  class="form-control input_register"  name="description" placeholder="Descripción"></textarea>
       </div>
       <div>
         <input class="form-control input_register" type="text" name="email" placeholder="Correo Electrónico" required></input>
       </div>
       <div>
         <input class="form-control input_register" type="password" name="password" placeholder="Contraseña" required></input>
       </div>

       <select class="form-control input_register" name="rls">
          @foreach ($roles as $role)
            <option>{{ $role->name }}</option>
          @endforeach
      </select>

       <div>
         <button class="button_register btn btn-success form-control" type="submit" > Crear </button>
       </div>

 </div>
</div>

    </form>

    </body>

    </html>
