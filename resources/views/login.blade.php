<!DOCTYPE html>
<html>

<header>
</header>
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

</body>
</html>
