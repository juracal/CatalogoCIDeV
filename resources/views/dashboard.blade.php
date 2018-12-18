<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="{{asset('/css/style.css') }}" rel="stylesheet" type="text/css ">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/bootstrap.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
    <link href="https://datatables.yajrabox.com/css/datatables.bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
    <body>



      <div class="nav">
           <ul>
             <li class="home"><a href="#">Mis Juegos</a></li>
             <li class="tutorials"><a href="#">Crear Juego</a></li>


             <li id="profile" style="float:right;"><img class="img_prof" style="width:50px;height:50px;border-radius: 50%;" src="{{Storage::url($user->image)}}"></img>
               <label style="opacity: 0.50">{{$user->name}}</label>
               <ul>
                 <li id="profile"><a href="/user/{{$user->id}}/edit">Mi Perfil</a></li>
                 <li  id="profile"><a href="/logout">Cerrar Sesión</a></li>
               </ul>
             </li>


           </ul>
         </div>










<div style="margin-top:100px">



    <table  class="table table-bordered" id="users-table">
           <thead>
               <tr>
                   <th>Id</th>
                   <th>Name</th>
                   <th style="display:none;"><th>
               </tr>
           </thead>
       </table>
</div>

       <script>
       $(function() {
           $('#users-table').DataTable({
               processing: true,
               serverSide: true,
               lengthChange: false,
               bInfo: false,
               ajax: 'http://127.0.0.1:8000/user/proyectos',
               columns: [
       {data: 'id', name: 'id'},
       {data: 'name', name: 'name'},
       {data: 'action', name: 'action'},

   ]
           });
       });
</script>

</body>

</html>
