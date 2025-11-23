<?php
include_once("model/Model.php");

class Controller {
    public $model;

    public function __construct() {
        $this->model = new Model();
    }

    public function invoke() {
        $searchQuery = "";

        // Check if search form was submitted
        if (isset($_GET['search'])) {
            $searchQuery = $_GET['search'];
        }

        // Get filtered data from model
        $books = $this->model->findBooks($searchQuery);

        // Render the view
        include 'view/list.php';
    }
}
?>