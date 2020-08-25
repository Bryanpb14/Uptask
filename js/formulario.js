eventListeners();

function eventListeners() {
    document.querySelector('#formulario').addEventListener('submit', validarRegistro);
}

function validarRegistro(e) {
    e.preventDefault();

    var usuario = document.querySelector('#usuario').value,
        password = document.querySelector('#password').value,
        tipo = document.querySelector('#tipo').value;

    if (usuario === '' || password === '') {
        swal({

            title: 'Error!',
            text: 'Ambos campos son obligatorios!',
            type: 'error'

        })
    } else {
        //ambos campos son correctos, mandar ejecutar Ajax
        var datos = new FormData();
        datos.append('usuario', usuario);
        datos.append('password', password);
        datos.append('accion', tipo);

        //crear llamado a Ajax
        var xhr = new XMLHttpRequest();

        //abrir la conexion
        //enviar datos por medio de POST a modelo-admin
        xhr.open('POST', 'inc/modelos/modelo-admin.php', true);

        //retorno de datos
        xhr.onload = function() {
                if (this.status === 200) {
                    var respuesta = JSON.parse(xhr.responseText);
                    console.log(respuesta);
                    //si la respuesta es correcta
                    /*if (respuesta.respuesta === 'correcto') {
                        // si es un nuevo usuario
                        if (respuesta.tipo === 'crear') {
                            swal({
                                title: 'usuario creado',
                                text: 'el usuario se creo correctamente',
                                type: 'success'
                            });
                        }
                    } else {
                        //hubo un error
                        swal({
                            title: 'error',
                            text: 'hubo un error',
                            type: 'error'
                        })
                    }*/
                }
            }
            // enviar la peticion
        xhr.send(datos);
    }
}