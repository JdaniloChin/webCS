let usuarios = [];
let editIndex = null;

// Función para renderizar la tabla
function renderTabla() {
    const tbody = document.querySelector("#tablaUsuarios tbody");
    tbody.innerHTML = "";
    usuarios.forEach((usuario, idx) => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
            <td>${usuario.nombre}</td>
            <td>${usuario.fecha_nam}</td>
            <td>${usuario.email}</td>
            <td>
                <button class="btn btn-warning btn-sm me-2" onclick="editarUsuario(${idx})">Editar</button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

// Al hacer click en "Agregar Usuario"
document.getElementById("btnAgregar").addEventListener("click", function() {
    document.getElementById("usuarioModalLabel").textContent = "Agregar Usuario";
    document.getElementById("formUsuario").reset();
    document.getElementById("usuarioIndex").value = "";
    editIndex = null;
});

// Al enviar el formulario del modal
document.getElementById("formUsuario").addEventListener("submit", function(e) {
    e.preventDefault();
    const nombre = document.getElementById("nombre").value;
    const fecha_nam = document.getElementById("fecha_nam").value;
    const email = document.getElementById("email").value;

    if(editIndex === null) {
        // Agregar nuevo usuario
        usuarios.push({nombre, fecha_nam, email});
    } else {
        // Editar usuario existente
        usuarios[editIndex] = {nombre, fecha_nam, email};
    }
    renderTabla();
    const modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('usuarioModal'));
    modal.hide();
});

// Función para editar usuario
window.editarUsuario = function(idx) {
    const usuario = usuarios[idx];
    document.getElementById("usuarioModalLabel").textContent = "Editar Usuario";
    document.getElementById("nombre").value = usuario.nombre;
    document.getElementById("fecha_nam").value = usuario.fecha_nam;
    document.getElementById("email").value = usuario.email;
    document.getElementById("usuarioIndex").value = idx;
    editIndex = idx;
    const modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('usuarioModal'));
    modal.show();
};

// Inicializar tabla vacía
renderTabla();