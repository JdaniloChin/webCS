document.addEventListener('DOMContentLoaded', function () {
    const btnsEditar = document.querySelectorAll('.btnEditar');
    const modal = new bootstrap.Modal(document.getElementById('usuarioModal'));
    const modalTitle = document.getElementById('usuarioModalLabel');
    const form = document.getElementById('formUsuario');
    const passwordInput = document.getElementById('password');
    const confirmInput = document.getElementById('confirm');

    //carga usuarios al inicio
    cargarUsuarios();

    //delegar el evento editar
    $(document).on('click', '.btnEditar', function(){
        const id= $(this).data('id');
        const nombre= $(this).data('nombre');
        const fecha= $(this).data('fecha');
        const email= $(this).data('email');

        //cambiar titulo al modal
        modalTitle.textContent = 'Editar Usuario';

        $('#usuarioIndex').val(id);
        $('#nombre').val(nombre);
        $('#fecha_nam').val(fecha);
        $('#email').val(email);

        //dejar contraseñas en blanco por seguridad
        $('#password').val('');
        $('#confirm').val('');

        //quitar requerido cuando es editar
        passwordInput.removeAttribute('required');
        confirmInput.removeAttribute('required');

        modal.show();
    });

    //Guardar Usuario AJAX
    $('#formUsuario').on('submit', function (e) {
        e.preventDefault();

        const datos = $(this).serialize();

        $.post('procesar_usuario.php', datos, function (respuesta) {
            const alerta = `<div class="alert alert-info alert-dismissible fade show" role="alert">
            ${respuesta}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>`;

            $(".modal-body").prepend(alerta);

            setTimeout(()=>{
                modal.hide();
                cargarUsuarios();
            },2500);
        });
    });

    //Eliminar usuario con AJAX
    $(document).on('click', '.btnEliminar', function(e) {
        e.preventDefault();
        if(!confirm('¿Esta seguro de eliminar este usuario?')) return;
        const id = $(this).data('id');

        $.get(`procesar_usuario.php?eliminar=${id}`, function(respuesta){
            alert(respuesta);
            cargarUsuarios();
        });
    });

    //Limpiar formulario del modal al cerrarlo, para el uso de agregar
    $('#usuarioModal').on('hidden.bs.modal', () => {
        form.reset();
        $('#usuarioIndex').val('');
         modalTitle.textContent = 'Agregar Usuario';

        //Restaurar required para agregar usuario
        passwordInput.setAttribute('required', '');
        confirmInput.setAttribute('required', '');
    });

    //Carga la lista completa de usuarios
    function cargarUsuarios() {
        $.get('obtener_usuarios.php', function (data) {
            $('#tablaUsuarios tbody').html(data);
        });
    }

});