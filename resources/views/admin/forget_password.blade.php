<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forget Password Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
    <h1>Forget Password </h1>

    {{-- Display Validation Errors --}}
    @if($errors->any())
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
    {{--  Session error and success handling --}}
    @if(Session::has('error'))
        <li>{{ Session::get('error') }}</li>
    @endif
    @if(Session::has('success'))
        <li>{{ Session::get('success') }}</li>
    @endif



    <form action="{{ route('admin.password_submit') }}" method="post">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <button type="submit" class="btn btn-primary">EMAIL PASSWORD RESET LINK</button>
      </form>

</body>
</html>
