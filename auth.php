<?php

//como usa muito essa merda só transformando em função
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
            $model = new User(connection());
    
            if ($model->find($email)) {            
                return $model->getType($email) === 'admin';
            }
            return false;
        }
        return false;
    }
?>