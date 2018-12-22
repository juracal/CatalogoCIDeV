<!DOCTYPE html>
<html>

<header>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<body>

<form method="post" action="/login">
     {{ csrf_field() }}
  <div>
    <h1>Página de Ingreso</h1>
  </div>

  <div>
    <input type="text" name="username" required></input>
  </div>

  <div>
    <input type="password" name="password" required></input>

  </div>

  <div>
    <button type="submit" > Registrar </button>
  </div>

</form>

<iframe width="420" height="315" src="//www.youtube.com/embed/BstTBw6BLrE" frameborder="0" allowfullscreen></iframe>

</body>
</html>
