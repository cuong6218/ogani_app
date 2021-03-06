<!doctype html>
<html lang="en">

<head>
    <title>Login Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="{{ asset('') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="login/css/style.css">

</head>

<body>
    <section class="ftco-section">
        @if(Session::has("success"))
        <div class="alert alert-success" id="alert-message">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                {{Session::get("success")}}
        </div>
        @endif
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login Form</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Sign In</h3>
                            </div>
                            <div class="w-100">
								<p class="social-media d-flex justify-content-end">
									<a href="{{Route('user.loginoauth', 'github')}}" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-github"></span></a>
									<a href="{{Route('user.loginoauth', 'google')}}" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-google-plus"></span></a>
								</p>
							</div>
                        </div>
                        <form action="{{Route('user.login')}}" method="POST" class="login-form">
                            @csrf
                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-envelope-o"></span></div>
                                <input name="email" value="{{old('email')}}" type="text" class="form-control rounded-left" placeholder="Email">
                                @if($errors->has('email'))
                                    <p style="color:red">{{$errors->first('email')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-lock"></span></div>
                                <input name="password" value="{{old('password')}}" type="password" class="form-control rounded-left" placeholder="Password">
                                    @if($errors->has('password'))
                                        <p style="color:red">{{$errors->first('password')}}</p>
                                    @elseif(Session::has('error'))
                                        <p style="color:red">{{Session::get('error')}}</p>
                                    @endif
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <div class="w-100 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary rounded submit">Login</button>
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <div class="w-100 text-center">
                                    <p class="mb-1">Don't have an account? <a
                                            href="{{ Route('user.showRegister') }}">Sign Up</a></p>
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
