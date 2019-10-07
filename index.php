<?php
require_once "./controllers/template.controller.php";
require_once "./controllers/users.controller.php";
require_once "./controllers/categories.controller.php";
require_once "./controllers/products.controller.php";
require_once "./controllers/clients.controller.php";
require_once "./controllers/sales.controller.php";

require_once "./modules/users.module.php";
require_once "./modules/categories.module.php";
require_once "./modules/products.module.php";
require_once "./modules/clients.module.php";
require_once "./modules/sales.module.php";

$template = new ControllerTemplate();
$template->ctrTemplate();