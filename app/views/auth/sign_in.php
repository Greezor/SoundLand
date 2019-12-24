<form method="POST" style="width: 500px; margin:100px auto; display:block;background-color: #FFFFFF99;border: 6px solid #00000099;padding: 40px; border-radius: 25px;">
    <h3 class="mb-4 text-center">Вход</h3>

    <?php if( $signed_up ){ ?>
        <div class="alert alert-success">
            <h6>Вы успешно зарегистрированы в системе!</h6>
            <hr>
            <span>Для авторизации, воспользуйтесь формой ниже.</span>
        </div>
    <?php } ?>

    <label class="d-block form-group">
        <span class="control-label">Адрес электронной почты</span>
        <input class="form-control" type="email" name="User[login]" value="<?=htmlspecialchars($form['login'])?>">
    </label>

    <label class="d-block form-group">
        <span class="control-label">Пароль</span>
        <input class="form-control" type="password" name="User[password]" value="<?=htmlspecialchars($form['password'])?>">
    </label>

    <?php if( $error ){ ?>
        <div class="alert alert-danger">
            <span><?=$error?></span>
        </div>
    <?php } ?>

    <div class="mt-4 text-center">
        <button type="submit" class="btn btn-dark">Войти</button>
    </div>
</form>
