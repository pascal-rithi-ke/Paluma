<?php
namespace controlers;
use controlers\DefaultController;

use include\PDOPaluma;


class PanierController extends DefaultController{

    public function __construct()
    {
        $this->model = new PDOPaluma;
    }

    public function index()
    {
        $this->render("panier", [
            "panier" => $this->model->index()
        ]);
    }

}