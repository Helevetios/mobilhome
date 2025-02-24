document.getElementById('contactForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Evita la redirección de la página

    const formData = new FormData(this);

    fetch('procesar_formulario.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            document.getElementById('responseMessage').textContent = data;
            this.reset(); // Limpia el formulario después del envío
        })
        .catch(error => {
            document.getElementById('responseMessage').textContent = 'Error al enviar el mensaje.';
        });
});