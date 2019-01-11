<!DOCTYPE html>
<html>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Comentarios</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="{{asset('/css/style.css') }}" rel="stylesheet" type="text/css ">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>

<body>

  <div class="bg-info  border-info banner" >
    <h1 style="color:white; text-align:left;">CIDeV</h1>
  </div>

  <div>
      <a class="btn" href="{{ url('/game/' . $id) }}" type="button">Información</a>
      <a class="btn" href="{{ url('/comments/' . $id) }}" type="button">Comentarios</a>
  </div>



<form class="comment_form " method="post" action="/comments/{{$id}}">
        {{csrf_field()}}
  <div class = "h2">
    Comentar
  </div>

  <div>
    <textarea style="border:double 4px #618685;" class="form-control comment_area" name="description" rows="4" cols="50" placeholder = "Comenta aquí..."> </textarea>
  </div>

  <div>
    <button style="margin-top:30px;"class="btn btn-success" type="submit">Comentar</button>
  </div>

</form>

<div class="comment_section">
      <h2 >Comentarios</h2>
      @foreach($comments as $comment)
     <div class="comment_div" style="height:100px;">
       <label style="margin-top:50px;float:left;color:#618685">{{$comment->created_at}}</label>
       <div class="comment_desc">
       <p > {{$comment->description}}</p>
     </div>
     </div>

      @endforeach
</div>


</body>
