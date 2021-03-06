<!doctype html>
<html lang="en">

<head>
    <title>Register Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="{{ asset('') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="login/css/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Register Form</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Sign Up</h3>
                            </div>
                        </div>
                        <form action="{{Route('user.register')}}" method="POST" class="login-form">
							@csrf
                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-user"></span></div>
                                <input name="name" type="text" class="form-control rounded-left" placeholder="Fullname">
                                @if($errors->has('name'))
                                    <p style="color:red">{{$errors->first('name')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-phone"></span></div>
                                <input name="phone" type="text" class="form-control rounded-left" placeholder="Phone">
                                @if($errors->has('phone'))
                                    <p style="color:red">{{$errors->first('phone')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-address-card-o"></span></div>
                                <input name="address" type="text" class="form-control rounded-left" placeholder="Address" >
                            </div>
                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-envelope-o"></span></div>
                                <input name="email" type="text" class="form-control rounded-left" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-lock"></span></div>
                                <input name="password" type="password" class="form-control rounded-left" placeholder="Password">
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <div class="w-100 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary rounded submit">Register</button>
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <div class="w-100 text-center">
                                    <p class="mb-1">Have an account? <a
                                            href="{{ Route('user.showLogin') }}">Sign In</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="login/js/jquery.min.js"></script>
    <script src="login/js/popper.js"></script>
    <script src="login/js/bootstrap.min.js"></script>
    <script src="login/js/main.js"></script>

</body>

</html>
