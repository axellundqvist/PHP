<?php

function __autoload($class_name)
{
    include "classes/" . $class_name . ".class.php";
}


//Inställningar för databas
define("DBHOST", "localhost");
define("DBUSER", "webmaster");
define("DBPASS", "2280804");
define("DBDATABASE", "login");

define("REALUSER", "webmaster");
define("REALPASS", "2280804");
