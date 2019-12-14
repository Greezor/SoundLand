<?php

\app\App::$app->db->pdo->exec("
    alter table user modify nickname varchar(255) not null
");
