<?php

\app\App::$app->db->pdo->exec("
    create table user (
        id int not null auto_increment primary key,
        login varchar(255) not null unique,
        name varchar(255) not null,
        nickname varchar(255) null,
        password varchar(255) not null,
        role varchar(255) not null
    )
");
