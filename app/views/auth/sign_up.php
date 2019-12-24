<form method="POST" style="width: 500px; margin:100px auto; display:block;background-color: #FFFFFF99;border: 6px solid #00000099;padding: 40px; border-radius: 25px;">
    <h3 class="mb-4 text-center">Регистрация пользователя</h3>

    <label class="d-block form-group">
        <span class="control-label">Адрес электронной почты</span>
        <input class="form-control" type="email" name="User[login]" value="<?=htmlspecialchars($form['login'])?>">
        <?php if( isset($errors['login']) ){ ?>
            <small class="d-block alert alert-danger">
                <span><?=$errors['login']?></span>
            </small>
        <?php } ?>
    </label>

    <label class="d-block form-group">
        <span class="control-label">Никнейм</span>
        <input class="form-control" type="text" name="User[nickname]" value="<?=htmlspecialchars($form['nickname'])?>">
        <?php if( isset($errors['nickname']) ){ ?>
            <small class="d-block alert alert-danger">
                <span><?=$errors['nickname']?></span>
            </small>
        <?php } ?>
    </label>

    <label class="d-block form-group">
        <span class="control-label">Введите пароль</span>
        <input class="form-control" type="password" name="User[password]" value="<?=htmlspecialchars($form['password'])?>">
        <?php if( isset($errors['password']) ){ ?>
            <small class="d-block alert alert-danger">
                <span><?=$errors['password']?></span>
            </small>
        <?php } ?>
    </label>

    <label class="d-block form-group">
        <span class="control-label">Повторите пароль</span>
        <input class="form-control" type="password" name="User[password_repeat]" value="<?=htmlspecialchars($form['password_repeat'])?>">
        <?php if( isset($errors['password_repeat']) ){ ?>
            <small class="d-block alert alert-danger">
                <span><?=$errors['password_repeat']?></span>
            </small>
        <?php } ?>
    </label>

    <?php if( isset($errors['server']) ){ ?>
        <big class="d-block alert alert-danger">
            <span><?=$errors['server']?></span>
        </big>
    <?php } ?>

    <div class="mt-4 text-center">
        <button type="submit" class="btn btn-dark">Зарегистрироваться</button>
    </div>
</form>
