<?php
ini_set('session.use_only_cookies',1);//TODO make session in cookie only
ini_set('session.use_strict_mode',1);//TODO make sure website only use session id created by server inside website
session_set_cookie_params([
    'lifetime' => 18000, //set the time for the session "in second"30minute ex.
    'domain' => 'localhost', //run in spacific host
    'path' => '/', //absloute path "session work in any path inside web"
    'secure' => true, //only use https
    'httponly' => true
    
    ]);
    session_start();
    session_regenerate_id(true);//TODO regenerate new id for current session
    