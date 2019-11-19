<?php

require_once "../controllers/categories.controller.php";
require_once "../modules/categories.module.php";

class AjaxCategories{

	/*=============================================
	EDIT CATEGORY
	=============================================*/	

	public $idCategory;
	public function ajaxEditCategory(){
		$item = "id";
		$value = $this->idCategory;
		$answer = CategoryController::ctrShowCategories($item, $value);
		echo json_encode($answer);
    }
    
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idCategory"])){
	$category = new AjaxCategories();
	$category -> idCategory = $_POST["idCategory"];
	$category -> ajaxEditCategory();
}
