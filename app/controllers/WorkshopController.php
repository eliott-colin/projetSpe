<?php
require_once __DIR__ . '/../models/Workshop.php';

class WorkshopController
{
    private $workshopModel;

    public function __construct()
    {
        $this->workshopModel = new Workshop();
    }

    public function getWorkshopCount()
    {
        $number = $this->workshopModel->getWorkshopCount();
        require_once __DIR__ . '/../views/dashboard.php';
        return $number["nombre"];
    }

    public function addWorkshop($showData)
    {
        $this->workshopModel->addWorkshop($showData["id"], $showData["name"], $showData["place"], $showData["showDate"], $showData["showHour"], $showData["description"], $showData["id_user"], $showData["id_theme"]);
    }

}
?>