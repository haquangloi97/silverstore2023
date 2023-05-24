<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SilverStore.com</title>
    <base href="{{ asset('/') }}">
    <link rel="stylesheet" href="front/css/bootstrap.css">
    <link rel="stylesheet" href="front/css/style.css">
    <link rel="stylesheet" href="front/css/all.css">
</head>
<body class="d-flex py-5 h-100 bg-light">
<div class="p-3 m-auto" style="max-width: 330px;">
    <form method="post" class="row g-3">
        @csrf
        <h1 class="text-center">Registration</h1>
        <div class="col-12">
            <label for="inputName" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="inputName" required>
            @error('name') <span class="d-block mt-1 text-danger small"><i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}</span> @enderror
        </div>
        <div class="col-12">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail" required>
            @error('email') <span class="d-block mt-1 text-danger small"><i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}</span> @enderror
        </div>
        <div class="col-12">
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword" required>
        </div>
        <div class="col-12">
            <label for="inputPasswordConfirmation" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="inputPasswordConfirmation" required>
            @error('password') <span class="d-block mt-1 text-danger small"><i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}</span> @enderror
            @if (session('success'))
                <span class="d-block mt-1 text-danger small"><i class="fa-solid fa-circle-check pe-1"></i>{{ session('success') }}</span>
            @endif
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100 fw-bold">Sign up</button>
            <p class="mt-4 text-center text-muted">Already have an account? <a href="{{ route('getLogin') }}" class="text-dark link-primary text-decoration-none fw-bold">Login</a></p>
            <p class="mt-4 text-center text-muted">&copy; SilverStore.com</p>
        </div>
    </form>
</div>
</body>
</html>
