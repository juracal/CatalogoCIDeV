<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Juegos</title>

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
         @if (session('status'))
             <div class="alert alert-success" id=alert>
                 {{ session('status') }}
             </div>
         @endif



         <div style="margin-top:30px;">
           <a class="fa fa-plus btn btn-warning" id="btn-table" href="/user/proyectos/create">Nuevo Juego</a>
         </div>






<div style="margin-top:80px">



    <table  class=" table cell-border"  id="users-table">
           <thead>
               <tr>
                   <th style="display:none">Id</th>
                   <th>Título</th>
                   <th>Estado</th>
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
               autoWidth: true,
               responsive:true,

               bInfo: false,
               ajax: 'http://127.0.0.1:8000/user/proyectos',
               headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 },

               columns: [

       {data: 'title', name: 'title',className:"center"},

       {data: 'status', name: 'status',className:"center"},
       {data: 'action', name: 'action',className:"center",render: function ( data, type, row, meta ) {
       return '<a class="fa fa-edit btn btn-warning" id="btn-table" href="/user/{{$user->id}}/proyecto/'+row['id']+'/edit">Editar</a> <form style="display: inline" method="post" action="/{{$user->id}}/proyecto/'+row['id']+'/delete" id="delete_form">  {{ csrf_field() }}<a class="fa fa-exchange btn btn-danger" id="btn-red" onclick="return confirmation();"  value="Cambiar Estado">Cambiar Estado</a></form>';
           }},


   ]




           });
       });



</script>
<div id="pr">
</div>

</body>

</html>

<script>
$(".alert").delay(4000).slideUp(200, function() {
    $(this).alert('close');
});
</script>
