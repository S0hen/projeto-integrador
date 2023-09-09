<?php
    if (!hasUser() || ($_SERVER['REQUEST_METHOD'] === 'GET')) {
        header('Location: /');
    } else {
        $email = $_SESSION['email'];
        $model = new User(connection());

        $model->delete($email);
        header('Location: /signout');
    }
?>