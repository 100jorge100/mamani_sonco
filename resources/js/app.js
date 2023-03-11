import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';


window.Alpine = Alpine;
//importar swit alert 2 para alert dialog en las vistas eliminar  confirmar


Alpine.plugin(focus);

Alpine.start();
window.Swal = require('sweetalert2');