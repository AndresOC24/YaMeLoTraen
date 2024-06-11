<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Registro - YaMeLoTraen</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #FFB12A;">
                <div class="featured-image mb-3">
                    <img src="/IMG/banner logo.png" class="img-fluid" style="width: 250px;">
                </div>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Regístrate</h2>
                    </div>

                    <form method="POST" action="{{ route('register.custom') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Nombre" name="name" required autofocus>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control form-control-lg bg-light fs-6" placeholder="Correo electrónico" name="email" required>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Contraseña" name="password" required>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <div class="checkbox">
                                <label><input type="checkbox" name="remember"> Recuérdame</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6" style="background: #FFB12A; border-color:#FFB12A;">
                                Registrarse
                            </button>
                        </div>
                    </form>

                    <div id="message"></div>
                    <div class="row">
                        <small>¿Ya tienes una cuenta? <a href="{{ url('/login') }}">Inicia sesión</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#registerForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('register.custom') }}',
                    data: $(this).serialize(),
                    success: function (response) {
                        $('#message').html("<div class='alert alert-success'>" + response + "</div>");
                    },
                    error: function () {
                        $('#message').html("<div class='alert alert-danger'>Error al registrar</div>");
                    }
                });
            });
        });
    </script>
</body>
</html>
