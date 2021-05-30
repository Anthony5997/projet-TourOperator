<?php

require("../partials/sql_connect.php");
require("../Class/Autoloader.php");
Autoloader::register();

$manager = new Manager($bdd);
echo json_encode($manager->getAllOperators());
