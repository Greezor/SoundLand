<div class="card" align="center" style="width: 50rem;margin:50px auto; background-color:#FFFFFF99;border: 6px solid #00000099;padding: 10px; border-radius: 25px;">
    <div class="card-body" align="left" >
        <?php if( $error ){ ?>
            <div class="alert alert-danger">
                <span>Что-то пошло не так =(</span>
            </div>
        <?php } ?>

        <form method="POST" enctype="multipart/form-data">
            <p>
                <span>Название: </span>
                <input class="form-control" type="text" name="Discography[name]" value="<?=htmlspecialchars($form['name'])?>">
            </p>
            <p>
                <span>Альбом: </span>
                <input class="form-control" type="text" name="Discography[album]" value="<?=htmlspecialchars($form['album'])?>">
            </p>
            <p>
                <span>Файл: </span>
                <input type="file" name="track" class="form-control" accept="audio/mpeg">
            </p>
            <button type="submit" class="btn btn-dark">Загрузить трек</button>
        </form>
    </div>
</div>
