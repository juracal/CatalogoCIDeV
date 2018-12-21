<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
             @if (Auth::id() and $user->role_id ==1)
             <li class="home"><a href=>Juegos</a></li>
             <li class="tutorials" id="usuarios"><a href="/user/{{$user->id}}/usuarios">Usuarios</a></li>
            <li class="tutorials" ><a href="#">Notificaciones</a></li>

             <li id="profile" style="float:right;"><img class="img_prof" style="width:50px;height:50px;border-radius: 50%;" src="{{Storage::url($user->image)}}"></img>
               <label style="opacity: 0.50">{{$user->name}}</label>
               <ul>
                 <li id="profile"><a href="/user/{{$user->id}}/edit">Mi Perfil</a></li>
                 <li  id="profile"><a href="/logout">Cerrar Sesión</a></li>
               </ul>
             </li>
             @endif

             @if (Auth::id() and $user->role_id == 2)
             <li class="tutorials" id="usuarios"><a href="/user/{{$user->id}}/proyectos">Mis Juegos</a></li>

             <li id="profile" style="float:right;"><img class="img_prof" style="width:50px;height:50px;border-radius: 50%;" src="{{Storage::url($user->image)}}"></img>
               <label style="opacity: 0.50">{{$user->name}}</label>
               <ul>
                 <li id="profile"><a href="/user/{{$user->id}}/edit">Mi Perfil</a></li>
                 <li  id="profile"><a href="/logout">Cerrar Sesión</a></li>
               </ul>
             </li>
             @endif
           </ul>
         </div>



         <div style="margin-top:30px;">
           <a class="fa fa-plus btn btn-warning" id="btn-table" href="/user/{{$user->id}}/proyectos/create">Nuevo Juego</a>
         </div>






<div style="margin-top:80px">



    <table  class=" table cell-border"  id="users-table">
           <thead>
               <tr>
                   <th style="display:none">Id</th>
                   <th>Name</th>
                   <th>Description</th>
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
               ajax: 'http://127.0.0.1:8000/user/proyectos/{{$user->id}}',
               headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 },

               columns: [

       {data: 'title', name: 'title',className:"center"},
       {data: 'description', name: 'description',className:"center"},
       {data: 'action', name: 'action',className:"center",render: function ( data, type, row, meta ) {
             return '<a class="fa fa-edit btn btn-warning" id="btn-table" href="/user/{{$user->id}}/proyecto/'+row['id']+'/edit">Editar</a> <form style="display: inline" method="post" action="/user/'+row['id']+'/delete" id="delete_form">  {{ csrf_field() }}<input type="submit" class="fa fa-trash btn btn-danger" id="btn-red" onclick="return confirmation();"  value="Eliminar"></form>';
           }},


   ]




           });
       });






$(document).ready(function() {
$("#usuarios").click(function() {
    $.ajax({
        type: 'GET',
        url : "/user/{{$user->id}}/usuarios",
        success : function (data) {
            $("body").html(data);
        }
    });
});
});



</script>

</body>

</html>
