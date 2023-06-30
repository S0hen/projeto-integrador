<?php

//como usa muito essa merda só transformando em função
function hasUser() : bool {
    return isset($_SESSION['user']);
}

function logout () : void {
    unset($_SESSION['user']);
    session_destroy();
}

?>