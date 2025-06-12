function mostrarVariables() {
    let nombre = "Ana";
    const edad = 25;
    var ciudad = "Madrid";
    console.log("Nombre:", nombre);
    console.log("Edad:", edad);
    console.log("Ciudad:", ciudad);
}

function evaluarEdad() {
    const edad = 15; 
    if (edad >= 18) {
        alert("Eres mayor de edad");
    } else {
        Swal.fire({
        title: '¡Evaluar Edad',
        text: 'Eres menor de edad',
        icon: 'success',
        confirmButtonText: 'Aceptar'
        });
    }
}

document.getElementById("miBoton").addEventListener("click", function() {
    Swal.fire({
        title: '¡Hola!',
        text: 'Has hecho clic en el botón',
        icon: 'info',
        confirmButtonText: 'Aceptar'
    });
});