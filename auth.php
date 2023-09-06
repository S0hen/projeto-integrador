<?php
function hasUser() : bool {
    return isset($_SESSION['email']);
}

function logout () : void {
    unset($_SESSION['email']);
    session_destroy();
}
?>