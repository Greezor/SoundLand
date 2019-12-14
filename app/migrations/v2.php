<?php

\app\App::$app->db->pdo->exec("
    alter table user drop column name
");
