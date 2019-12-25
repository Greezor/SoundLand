<?php

use app\models\User;

$me = User::getMe();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SoundLand</title>

    <!-- Bootstrap4.Start -->
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Bootstrap4.End -->

    <!-- FontAwesome.Start -->
    <link href="//use.fontawesome.com/releases/v5.12.0/css/all.css" rel="stylesheet">
    <!-- FontAwesome.End -->

    <!-- QuillJS.Start -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <!-- QuillJS.End -->

    <link rel="stylesheet" href="/assets/css/index.css">
</head>
<body class="main">
    <img class="main-logo" src="/assets/images/logo.png" >
    <nav class="navbar navbar-expand-lg navbar-light bg-light " style="padding-bottom:0px; padding-top:0px;background-color:rgba(0,0,0,0.6) !important;">

      <p><a href="/"><img height="35" src="/assets/images/title.png" style="margin:0 auto; display:block;margin-top: 15px; margin-right: 10px;"></a></p>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php if( !!$me ){ ?>
                <?php if( $me->role == User::ROLE_ADMIN || $me->role == User::ROLE_CONTENT_MANAGER ){ ?>
                    <li class="nav-item">
                        <a href="/cms/index" class="btn btn-dark my-2 mr-2" style="color:#FFFFFF;"><img src="/assets/images/pen-tool.svg"> CMS</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="/composer/cabinet" class="btn btn-dark my-2 mr-2" style="color:#FFFFFF;"><img src="/assets/images/book.svg"> Личный кабинет</a></button>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a href="/discography/groups" class="btn btn-dark my-2 mr-2" style="color:#FFFFFF;"><img src="/assets/images/archive.svg"> База групп</a>
            </li>
        </ul>

        <ul class="nav navbar-nav pull-right">
            <?php if( !!$me ){ ?>
                <li>
                    <a href="/auth/logout" class="btn btn-dark" style="color:#FFFFFF;"><img src="/assets/images/log-out.svg"> Выйти</a>
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
        <?=$this->render($view, $params, false)?>
    </div>



    <footer class="navbar fixed-bottom navbar-light bg-light" style="padding-bottom:0px; padding-top:0px;background-color:rgba(0,0,0,0.6) !important;">
      <span style="color:#FFFFFF;" >&copy; <?=date('Y')?> Leon</span>
    </footer>

</body>
</html>
