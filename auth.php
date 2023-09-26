<?php
function hasUser() : bool {
    return isset($_SESSION['email']);
}

function logout () : void {
    unset($_SESSION['email']);
    session_destroy();
}

function authorize (Route $rota) {

    if ($rota->getProfile() != '') {
            $email = $_SESSION['email'];
            $model = new Usuarios(connection());
    
            if ($model->find($email)) {            
                return $model->getTipo($email) === 'adm';
            }
            return false;
        }
        return false;
    }

?>