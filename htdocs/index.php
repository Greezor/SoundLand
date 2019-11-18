<?php

error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE); //вывод критических ошибок и игнорирование предупреждений и уведомлений
date_default_timezone_set('Europe/Moscow');      //Установление часового пояса (Европа/Москва)

require 'app/App.php'; //подключение файла App.php из папки app для запуска приложения
new \app\App(); //Создание экземпляра класса App (запуск приложения)
