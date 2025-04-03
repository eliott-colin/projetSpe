<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../../config/database.php';

class Show
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }


    public function getShowById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM shows WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getShowCount()
    {
        $stmt = $this->db->prepare("SELECT count(*) as nombre FROM shows");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function addShow($id, $name, $place, $showDate, $showHour, $description, $theme)
    {
        $stmt = $this->db->prepare("INSERT INTO shows (id_show, name, place, showDate, showHour, description, id_theme) VALUES (:id, :name, :place, :showDate, :showHour, :description, :id_theme)");
        $stmt->execute([
            "id" => $id,
            'name' => $name,
            'place' => $place,
            'showDate' => $showDate,
            'showHour' => $showHour,
            'description' => $description,
            "id_theme" => $theme
        ]);
        return $this->db->lastInsertId();
    }

}
?>