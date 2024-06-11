<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Inicia sesión - YaMeLoTraen</title>
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
                        <h2>Inicia sesión</h2>
                    </div>
                    <form method="POST" action="{{ route('login.custom') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" class="form-control form-control-lg bg-light fs-6" placeholder="Correo electrónico" name="email" required autofocus>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Contraseña" name="password" required>
                            @if ($errors->has('emailPassword'))
                                <span class="text-danger">{{ $errors->first('emailPassword') }}</span>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Recuérdame
                                </label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6" style="background: #FFB12A; border-color:#FFB12A;">
                                Iniciar sesión
                            </button>
                        </div>
                    </form>
                    <div class="row">
                        <small>¿No estás registrado? <a href="{{ 'registration' }}">Regístrate</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#loginForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '/php/login.php',
                    data: $(this).serialize(),
                    success: function (response) {
                        $('#message').html("<div class='alert alert-success'>" + response + "</div>");
                        if (response.includes("Inicio de sesión exitoso")) {
                            window.location.href = '/HTML/dashboard.html'; // Redirigir a la página del dashboard
                        }
                    },
                    error: function () {
                        $('#message').html("<div class='alert alert-danger'>Error al iniciar sesión</div>");
                    }
                });
            });
        });
    </script>
</body>
</html>
