<?php
namespace controlers;

class DefaultController {

    protected function render(string $pathView, array $params = [])
    {
        ob_start();
        extract($params);
        include ROOT . "/view/$pathView.phtml";
        $content = ob_get_clean();
        include ROOT . '/view/base.phtml';
    }
}