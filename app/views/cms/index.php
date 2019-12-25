<?php
    use app\models\User;
?>
<div class="card" align="center" style="width: 50rem;margin:50px auto; background-color:#FFFFFF99;border: 6px solid #00000099;padding: 10px; border-radius: 25px;">
    <div class="card-body">
        <div class="d-flex">
            <a class="btn btn-dark btn-lg py-5 px-3 mx-2 text-center flex-fill w-100" href="/cms/news">
                <i class="far fa-newspaper fa-10x"></i><br>
                <span>Новости</span>
            </a>

            <?php if( $me->role == User::ROLE_ADMIN ){ ?>
                <a class="btn btn-dark btn-lg py-5 px-3 mx-2 text-center flex-fill w-100" href="/cms/users">
                    <i class="fas fa-users fa-10x"></i><br>
                    <span>Пользователи</span>
                </a>
            <?php }else{ ?>
                <button class="btn btn-dark btn-lg py-5 px-3 mx-2 text-center flex-fill w-100 disabled" type="button" disabled="disabled">
                    <i class="fas fa-users fa-10x"></i><br>
                    <span>Пользователи</span>
                </button>
            <?php } ?>
        </div>
    </div>
</div>
