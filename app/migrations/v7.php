<?php
use app\models\User;
$role=User::ROLE_ADMIN;
$password=password_hash("12345678", PASSWORD_BCRYPT);
\app\App::$app->db->pdo->exec("
    insert into user (login, nickname, password, role) values ('admin4!k@sl.com', 'admin', '$password', '$role')
");
