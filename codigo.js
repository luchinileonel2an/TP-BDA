$('#formlogin').submit(function(e){
    e.preventDefault();
    var usuario = $.trim ($("#usuario").val());
    var password = $.trim ($("#password").val());
    
    if(usuario.length == "" || password.length == "") {
        Swal.fire({
            icon: 'warning',
            title: 'Debe ingresar un usuario y/o contraseña',
        });
        return false;
    } else {
        $.ajax({
            url:"bd/login.php",
            type: "POST",
            datatype: "json",
            data: {usuario: usuario, password: password},
            success: function(data) {
                if(data =="null"){
                    Swal.fire({
                        icon: 'error',
                        title: 'Usuario y/o contraseña incorrecta',
                    });
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Conexion exitosa',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ingresar'
                    }).then((result) => {
                        if(result.value) {
                            window.location.href = "pages/administrador/administrador.php"
                        }
                    })
                }
            }
        });
    }
});