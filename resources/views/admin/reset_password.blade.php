<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
    <h1>Reset Password </h1>

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



    <form action="{{ route('admin.login_submit') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">New Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword" aria-describedby="passwordHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Confirm New Password</label>
          <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</body>
</html>
