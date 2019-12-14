<form style="width: 300px; margin:100px auto; display:block;background-color: #FFFFFF99;border: 6px solid #00000099;padding: 40px; border-radius: 25px;">
    <p>Вход</p>

    <?php if( $signed_up ){ ?>
        <div class="alert alert-success">
            <h3>Вы успешно зарегистрированы в системе!</h3>
            <hr>
            <span>Для авторизации, воспользуйтесь формой ниже.</span>
        </div>
    <?php } ?>

    <div class="form-group">

        <label for="exampleInputEmail1">Адрес электронной почты</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

        <div class="form-group">

            <label for="exampleInputPassword1">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1">

        </div>

        <button type="submit" class="btn btn-dark">Submit</button>
</form>
