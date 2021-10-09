<?php
require_once '../controllers/user.controller.php';
require_once '../models/user.model.php';

class UserAxios
{

    public $NewUser;

    public function AddUserAxios()
    {

        $NewUser = $this->NewUser;
        $ConvertData = json_decode($NewUser);
        $Response = UserControllers::AddUserController($ConvertData);
        echo json_encode(
            array(
                'code' => ($Response === 'success') ? true : false,
                'state' => $Response,
            )
        );
    }

    public function GetUserAxios()
    {
        $Response = UserControllers::GetUserController();
        echo json_encode($Response);
    }

    public $UEmail;
    public $UPassword;

    public function LoginAxios()
    {
        $UEmail = $this->UEmail;
        $UPassword = $this->UPassword;

        $Response = UserControllers::LoginController($UEmail, $UPassword);
        echo json_encode($Response);
    }
}

if (isset($_POST['NewUser'])) {
    $ExecuteUserAdd = new UserAxios();
    $ExecuteUserAdd->NewUser = $_POST['NewUser'];
    $ExecuteUserAdd->AddUserAxios();
}

if (isset($_POST['GetUsers'])) {
    $ExecuteUserGet = new UserAxios();
    $ExecuteUserGet->GetUserAxios();
}

if (isset($_POST['UEmail'])) {

    $ExecuteLogin = new UserAxios();
    $ExecuteLogin->UEmail = $_POST['UEmail'];
    $ExecuteLogin->UPassword = $_POST['UPassword'];
    $ExecuteLogin->LoginAxios();
}
