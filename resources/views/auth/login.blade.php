<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> صفحه ورود </title>
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.ico') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{ asset("pwa/poultry-24.png") }}">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    @toastr_css

</head>

<body class="h-100">
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <h4 class="text-center mb-4">وارد حساب خود شوید</h4>
                                <form action="{{ route('login') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="mb-1"><strong>ایمیل</strong></label>
                                        <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                                        @error('email') <span class="text-danger"> {{ $message }}</span> @enderror

                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1"><strong>رمز عبور</strong></label>
                                        <input type="password" name="password" class="form-control" required value="{{ old('password') }}">
                                        @error('password') <span class="text-danger"> {{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox ml-1">
                                                <input class="custom-control-input" type="checkbox" name="remember" id="remember"
                                                    {{ old('remember') ? 'checked' : '' }} value="true">
                                                <label class="custom-control-label" for="remember">مرا به خاطر
                                                    بسپار</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <a href="#">فراموشی رمز عبور؟</a>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block">وارد شوید</button>
                                    </div>
                                </form>
                                <div class="new-account mt-3">
                                    <p>حساب ندارید؟ <a class="text-primary" href="#">ثبت نام</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Required vendors -->
<script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.min.js') }}"></script>
<script src="{{ asset('assets/js/deznav-init.js') }}"></script>
@toastr_js
@toastr_render

<script src="{{ asset('sw.js') }}"></script>
<script>
    if (!navigator.serviceWorker.controller) {
        navigator.serviceWorker.register("sw.js").then(function (reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
</script>
</body>
</html>
