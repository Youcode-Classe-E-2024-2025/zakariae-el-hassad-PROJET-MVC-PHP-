<?php
namespace App\Core;

class Controller{
    protected function loadModel($model){
        require_once "../app/models/$model.php";
        return new $model();
    }

    protected function render($view, $data = []){
        extract($data);
        require_once "../app/views/$view.php";
    }
}