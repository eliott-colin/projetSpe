<?php
require_once __DIR__ . '/../models/Show.php';

class ShowController
{
    private $showModel;

    public function __construct()
    {
        $this->showModel = new Show();
    }

    public function getShowCount()
    {
        $number = $this->showModel->getShowCount();
        require_once __DIR__ . '/../views/dashboard.php';
        return $number["nombre"];
    }

    public function addShow($showData)
    {
        $this->showModel->addShow($showData["id"], $showData["name"], $showData["place"], $showData["showDate"], $showData["showHour"], $showData["description"], $showData["id_theme"]);
    }

}
?>