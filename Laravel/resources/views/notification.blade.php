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

  <div class="bg-info  border-info banner" >
    <h1 style="color:white; text-align:left;">CIDeV</h1>
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
    <textarea class="login_input form-control" type="password" name="description" placeholder="Description" required></textarea>
  </div>

  <div>
    <button class="form-control btn btn-info" type="submit" > Enivar </button>
  </div>

</form>



</body>

<script>
$(".alert").delay(4000).slideUp(200, function() {
    $(this).alert('close');
});
</script>

</html>
