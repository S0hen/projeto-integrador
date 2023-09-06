<?php

//como usa muito essa merda só transformando em função
function hasUser() : bool {
    return isset($_SESSION['email']);
}

function logout () : void {
    unset($_SESSION['email']);
    session_destroy();
}
?>