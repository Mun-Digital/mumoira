<?php
setcookie('token', null, -1, '/');
session_destroy();
redirect(base_url('client/login'));


