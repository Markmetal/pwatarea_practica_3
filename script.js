document.addEventListener('DOMContentLoaded', () => {

    const menuItems = document.querySelectorAll('.menu-item-desplegable');

    menuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            const submenu = this.querySelector('.submenu');
            if (submenu) {
                submenu.classList.toggle('activo');
                e.stopPropagation();
                
            }
        });
    });

    document.addEventListener('click', function(e) {
        if (!e.target.closest('.dropdown-menu')) {
            document.querySelectorAll('.submenu.activo').forEach(sub => {
                sub.classList.remove('activo');
            });
        }
    });

    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            const nombre = document.getElementById('nombre').value.trim();
            const email = document.getElementById('email').value.trim();
            const mensaje = document.getElementById('mensaje').value.trim();
            const msgDiv = document.getElementById('validationMessage');

            msgDiv.textContent = '';
            msgDiv.className = 'mensaje-validacion';

            if (nombre === '' || email === '' || mensaje === '') {
                e.preventDefault();
                msgDiv.textContent = "⚠️campos obligatorio.";
                msgDiv.classList.add('error');
                return false;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                msgDiv.textContent = "📧 Por favor, introduce un correo electrónico válido.";
                msgDiv.classList.add('error');
                return false;
            }

            msgDiv.textContent = "✅ Validado por JS. Procesando con PHP...";
            msgDiv.classList.add('success');
        });
    }

});