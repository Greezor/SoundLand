<?php
    use app\models\User;
?>
<div class="card" style="width: 50rem;margin:50px auto; background-color:#FFFFFF99;border: 6px solid #00000099;padding: 10px; border-radius: 25px;">
    <div class="card-body">
        <?php if( $error ){ ?>
            <div class="alert alert-danger">
                <span>Что-то пошло не так!</span>
            </div>
        <?php } ?>

        <form method="POST">
            <p>
                <span>Логин</span>
                <input class="form-control" type="text" name="User[login]" value="<?=htmlspecialchars($user->login)?>">
            </p>
            <p>
                <span>Никнейм</span>
                <input class="form-control" type="text" name="User[nickname]" value="<?=htmlspecialchars($user->nickname)?>">
            </p>
            <p>
                <span>Роль</span>
                <select class="form-control" name="User[role]">
                    <?php foreach([User::ROLE_USER, User::ROLE_CONTENT_MANAGER, User::ROLE_ADMIN] as $role){ ?>
                        <option value="<?=$role?>"<?=( $user->role == $role ? ' selected' : '' )?>><?=$role?></option>
                    <?php } ?>
                </select>
            </p>
            <p>
                <span>Пароль</span>
                <input class="form-control" type="password" name="User[password]" placeholder="*****">
            </p>
            <button class="btn btn-dark" type="submit">Сохранить</button>
        </form>
    </div>
</div>
