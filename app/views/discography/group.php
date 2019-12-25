<?php
    use app\models\User;
?>
<div class="card" align="center" style="width: 50rem;margin:50px auto; background-color:#FFFFFF99;border: 6px solid #00000099;padding: 10px; border-radius: 25px;">
    <div class="card-body" align="left" >
        <img class="w-100" src="<?=htmlspecialchars($user->icon)?>" class="card-img-top" alt="icon" height="400" >
            <h2>
                <?=htmlspecialchars($user->nickname)?>
            </h2>
            <?php foreach($tracks as $track){ ?>
                <hr>
                <p>
                    <h4>
                        <span><?=htmlspecialchars($track->name)?></span><br>
                        <?php if( !!$track->album ){ ?>
                            <small><?=htmlspecialchars($track->album)?></small>
                        <?php } ?>
                    </h4>
                    <div class="d-flex">
                        <div class="flex-fill">
                            <audio class="w-100" controls src="<?=htmlspecialchars($track->audio)?>"></audio>
                        </div>
                        <?php if( $isMy || $me->role == User::ROLE_ADMIN || $me->role == User::ROLE_CONTENT_MANAGER ){ ?>
                            <div class="ml-2">
                                <a
                                    onclick="if( !confirm('Вы уверены?') ) return false;"
                                    class="btn btn-danger"
                                    href="/discography/delete?id=<?=htmlspecialchars($track->id)?>">
                                    <span>Удалить</span>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </p>
            <?php } ?>

            <?php if( $isMy ){ ?>
                <hr>
                <a class="btn btn-dark" href="/discography/add"><img src="/assets/images/plus.svg"> Добавить трек</a>
            <?php } ?>
    </div>
</div>
