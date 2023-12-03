// Cuando cargue la paguina
document.addEventListener('DOMContentLoaded', function () {
    // Eliminamos la variable "user" de localStorage
    localStorage.removeItem('user');

    // Redirigimos a la página de inicio de sesión
    window.location.href = './Inicio_Sesion.html';
});