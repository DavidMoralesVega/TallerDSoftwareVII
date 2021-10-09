<?php
class UserControllers {

    static public function AddUserController($NewUser) {
        // Nombre: David  // CedulaIdentidad 7647857
        // D-7647857
        // david@gmail.com D-7656789
        
        $GeneratePassword = substr($NewUser->UName, 0, 1).'-'.$NewUser->UIdentity;
        $NewUser->UPassword = crypt($GeneratePassword, '$2a$07$EfYZrFYtK0NhiWXLUTltnrI1sFZqPW20FlutterMEANStack$');

        return UserModels::AddUserModel($NewUser);
    }

    static public function GetUserController() {
        return UserModels::GetUserModel();
    }

    static public function LoginController($UEmail, $UPassword) {

        $UserData = UserModels::GetUserWhereModel($UEmail);
        if (!empty($UserData)) {

            $PasswordSend = crypt($UPassword, '$2a$07$EfYZrFYtK0NhiWXLUTltnrI1sFZqPW20FlutterMEANStack$');
            if (hash_equals($UserData[0]['UPassword'], $PasswordSend)) {
                
                session_start();
                $_SESSION['ValidateLogin'] = true;
                $_SESSION['User'] = $UserData[0];

                return array(
                    'Message' => 'Bienvenido.',
                    'Code' => true
                );
            } else {
                return array(
                    'Message' => 'Usuario o contraseña incorrectos.',
                    'Code' => false
                );
            }

        } else {
            return array(
                'Message' => 'Usuario o contraseña incorrectos.',
                'Code' => false
            );
        }

    }

}