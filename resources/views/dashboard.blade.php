<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/bootstrap.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
    <link href="https://datatables.yajrabox.com/css/datatables.bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
    <body>
    <table class="table table-bordered" id="users-table">
           <thead>
               <tr>
                   <th>Id</th>
                   <th>Name</th>
               </tr>
           </thead>
       </table>


       <script>
       $(function() {
           $('#users-table').DataTable({
               processing: true,
               serverSide: true,
               ajax: 'http://127.0.0.1:8000/user/proyectos',
               columns: [
       {data: 'id', name: 'id'},
       {data: 'name', name: 'name'},

   ]
           });
       });
</script>

</body>
