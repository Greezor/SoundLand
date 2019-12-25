<?php

\app\App::$app->db->pdo->exec("
    create table news (
        id int not null auto_increment primary key,
        date bigint not null,
        name varchar(255) not null,
        content longtext null
    )
");
