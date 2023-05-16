
    document.addEventListener('DOMContentLoaded', function() {
        var notificacion = document.getElementById('notificacion');
        var cerrarNotificacion = document.getElementById('cerrarNotificacion');

        cerrarNotificacion.addEventListener('click', function() {
            notificacion.style.display = 'none';
        });

        setTimeout(function() {
           if (!localStorage.getItem('notificacionMostrada')) {
                notificacion.style.display = 'block';
               localStorage.setItem('notificacionMostrada', true);
            } 
 
        }, 12000); // 2 minutos (120,000 milisegundos)
    });

