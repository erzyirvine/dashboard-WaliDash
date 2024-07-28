<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md image"></div>
            <div class="col-md">
                <div class="row form-container">
                    <div class="col-md title">
                        <h3 class="text">LOGIN</h3>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md subtitle">
                        <p>Please enter your username and password to proceed</p>
                    </div>
                    <div class="w-100"></div>
                    <form action="{{ route('login')}}" method="POST">
                        @csrf
                    <div class="col-md">
                        <div class="input-container">
                            @if (session('error'))
                                <div class="alert alert-danger">
                             {{ session('error') }}
                                </div>
                            @endif

                            <div class="mb-3 form">
                                <label for="exampleFormControlInput1" class="form-label">Username</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="username">
                            </div>
                            <div class="mb-3 form">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleFormControlInput1" name="password">
                            </div>

                            <div class="custom-control custom-checkbox checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember me</label>
                            </div>

                            <button class="btn btn-primary" href="{{ route('main_dashboard') }}" role="button">LOGIN</button>
                        </div>
                    </form>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- sidebar -->
    
    
</body>
</html>