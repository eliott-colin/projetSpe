<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../../config/database.php';

class Workshop
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }


    public function getWorkshopById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM workshops WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getWorkshopCount()
    {
        $stmt = $this->db->prepare("SELECT count(*) as nombre FROM workshops");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function addWorkshop($id, $name, $place, $showDate, $showHour, $description, $user, $theme)
    {
        $stmt = $this->db->prepare("INSERT INTO workshops (id_workshop, name, place, workshopDate, workshopHour, description, id_user, id_theme) VALUES (:id, :name, :place, :workshopDate, :workshopHour, :description, :id_user ,:id_theme)");
        $stmt->execute([
            "id" => $id,
            'name' => $name,
            'place' => $place,
            'workshopDate' => $showDate,
            'workshopHour' => $showHour,
            'description' => $description,
            "id_user" => $user,
            "id_theme" => $theme
        ]);
        return $this->db->lastInsertId();
    }

}
?>