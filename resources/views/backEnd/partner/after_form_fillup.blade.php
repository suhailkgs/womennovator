<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>After Form Fillup</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  @if (isset($success2))
    <div class="alert alert-success">{{ $success2 }}</div>
  @elseif (isset($success))
    <div class="alert alert-success">{{ $success }}</div>
  @elseif (isset($fail))
    <div class="alert alert-danger">{{ $fail }}</div>
  @endif

  <a href="{{url('/')}}" class="btn btn-success">Go to Home</a>
</body>

</html>
