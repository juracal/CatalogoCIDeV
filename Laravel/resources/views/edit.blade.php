<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar Perfil</title>

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
    <body class="body_login ">

      <div style="height:90px;" class="bg-info  border-info banner" >
        <h1 style="color:white; text-align:left;">Editar Usuario</h1>
      </div>





      <form method="post"  action="/user/{{$id_user}}/edit/{{$user->id}}" enctype="multipart/form-data">
        {{csrf_field()}}
      </div>


      <div class="split left">


        <div class="img-rounded" style="background-color:white;">
          <img class="img-profile" width=300px height="300px" src="{{Storage::url($user->image)}}"></img>
          <input class="inputfile" type="file" name="avatar" placeholder="Ingrese foto de perfil"></input>
          <div>
           <a  class="fa fa-arrow-left btn btn-primary btn-back" href="{{ URL::previous()}}"> Go Back</a>
          </div>
        </div>



      </div>

     <div class="split right">
       <div class="centered">

       <div>
         <input class="form-control input_register" type="text" name="username" value="{{$user->name}}" required></input>
       </div>
       <div>
         <input class="form-control input_register" type="text" name="last_name" value="{{$user->last_name}}" required></input>
       </div>
       <div>

         <textarea  class="form-control input_register"  name="description" >{{$user->description}}</textarea>
       </div>
       <div>
         <input class="form-control input_register" type="text" name="email" value="{{$user->email}}" required></input>
       </div>
       <div>
         <input class="form-control input_register" type="password" name="password" value="{{$user->name}}" required></input>
       </div>

        @if (Auth::id() and $user->role_id ==1)
       <select class="form-control input_register" name="rls">
          @foreach ($roles as $role)
            <option>{{ $role->name }}</option>
          @endforeach
      </select>
      @endif

       <div>
         <button class="button_register btn btn-success form-control" type="submit" > Editar </button>
       </div>


 </div>
</div>


    </form>

    </body>

    </html>
