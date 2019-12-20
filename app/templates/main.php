<?php

use app\models\User;

$me = User::getMe();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SoundLand</title>
</head>
<body class="main">
    <img src="/assets/images/logo.png" style="  position: absolute; z-index: -10;" >
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-bottom:0px; padding-top:0px;background-color:rgba(0,0,0,0.6) !important;">

      <p><a href="/"><img width="300" height="50" src="/assets/images/title.png" style="margin:0 auto; display:block;"></a></p>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php if( !!$me ){ ?>
                <li class="nav-item">
                    <a href="/composer/cabinet" class="btn btn-dark mr-sm-2" style="color:#FFFFFF;"><img src="/assets/images/book.svg"> Личный кабинет</a></button>
                </li>
                <li class="nav-item">
                    <a href="/discography/groups" class="btn btn-dark my-2 my-sm-0" style="color:#FFFFFF;"><img src="/assets/images/archive.svg"> База групп</a>
                </li>
            <?php } ?>
        </ul>

        <ul class="nav navbar-nav pull-right">
            <?php if( !!$me ){ ?>
                <li>
                    <a href="/auth/logout" class="btn btn-dark" style="color:#FFFFFF;">Выйти</a>
                </li>
            <?php }else{ ?>
                <li>
                    <a href="/auth/sign_up" class="btn btn-dark mr-sm-2" style="color:#FFFFFF;"><img src="/assets/images/user.svg"> Регистрация</a>
                </li>

                <li>
                    <a href="/auth/sign_in" class="btn btn-dark" style="color:#FFFFFF;"><img src="/assets/images/log-in.svg"> Войти</a>
                </li>
            <?php } ?>
        </ul>
          </div>

    </nav>

    <div class="content">
        <?=$this->render($view, $params,false)?>
    </div>



    <nav class="navbar fixed-bottom navbar-light bg-light" style="padding-bottom:0px; padding-top:0px;background-color:rgba(0,0,0,0.6) !important;">
      <span style="color:#FFFFFF;" >&copy; <?=date('Y')?> Leon</span>
    </nav>

</body>
</html>
