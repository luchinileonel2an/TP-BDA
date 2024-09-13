<!doctype html>
<html>
    <head>
        <link rel="shortcut icon" href="#"/>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
        <link rel="stylesheet" href="styles\estilos-bts.css">
        <link rel="stylesheet" href="plugins\sweetalert\sweetalert2.min.css">

        <title>Log In Administrador</title>
    </head>

    <body>
    <div id="login">
        <h3 class="text-center text-white display-4">Log In</h3>

        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">

                    <div id="login-box"class="col-md-12 bg-light text-dark">
                        <form id="formlogin" class="form" action="" method="post">
                            <h3 class="text-center text-dark">Iniciar Sesion</h3>
                            <div class="form-group">
                                <label for="usuario" class="text-dark">Usuario</label>
                                <input type="text" name="usuario" id="usuario" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-dark">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" name="submit" class="btn btn-dark btn-lg btn-block" value="Iniciar Sesion">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="jquery\jquery-3.7.1.min.js"></script>
    <script src="bootstrap\js\bootstrap.min.js"></script>
    <script src="popper\popper.min.js"></script>

    <script src="plugins\sweetalert\sweetalert2.all.min.js"></script>
    <script src="codigo.js"></script>
    </body>

</html>