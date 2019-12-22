<?php

\app\App::$app->db->pdo->exec("
    create table discography (
        id int not null auto_increment primary key,
        user_id int not null,
        name varchar(255) not null,
        album varchar(255) null,
        track longtext not null
    )
");
