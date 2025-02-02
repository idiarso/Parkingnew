import './bootstrap';
import '../sass/app.scss';

import Alpine from 'alpinejs';
import * as bootstrap from 'bootstrap';

// Make Bootstrap globally available
window.bootstrap = bootstrap;

// Initialize Alpine.js
window.Alpine = Alpine;
Alpine.start();