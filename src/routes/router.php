<?php

return [
    create_route('GET', '', 'LoginController', 'showLoginForm'),
    create_route('GET', 'admin', 'LoginController', 'showLoginForm'),
    create_route('POST', 'admin/login', 'LoginController', 'login'),
    create_route('GET', 'admin/writers/{id}', 'WriterController', 'show')
];