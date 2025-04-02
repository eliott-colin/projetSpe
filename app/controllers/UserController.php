<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function editUserForm($id) {
        $user = $this->userModel->getUserById($id);
        require_once __DIR__ . '/../views/user_form.php';
    }

    public function updateUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];

            if ($this->userModel->updateUser($id, $nom, $prenom, $email)) {
                header("Location: user.php?id=" . $id . "&success=1");
            }
        }
    }

    public function uploadProfilePicture() {
        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
            $id = $_POST['id'];
            $targetDir = "uploads/";
            $fileName = basename($_FILES['profile_image']['name']);
            $targetFilePath = $targetDir . $fileName;

            if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetFilePath)) {
                $this->userModel->updateProfilePicture($id, $targetFilePath);
            }
            header("Location: user.php?id=" . $id);
        }
    }
}
?>
