<div class="card" align="center" style="width: 50rem;margin:50px auto; background-color:#FFFFFF99;border: 6px solid #00000099;padding: 10px; border-radius: 25px;">
 <h5 class="card-title">Список групп</h5>
    <div class="card-body" align="left>

        <div class="list-group">
            <?php foreach($groups as $user){ ?>
                <a href="/discography/group?id=<?=htmlspecialchars($user->id)?>" class="list-group-item list-group-item-action">
                    <?=htmlspecialchars($user->nickname)?>
                </a>
            <?php } ?>
        </div>

    </div>
</div>
