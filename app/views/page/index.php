<div class="news">
    <?php foreach($news as $item){ ?>
        <div class="card" style="width: 50rem;margin:50px auto; background-color:#FFFFFF99;border: 6px solid #00000099;padding: 10px; border-radius: 25px;">
            <div class="card-header d-flex align-items-center">
                <h2 class="flex-fill"><?=htmlspecialchars($item->name)?></h2>
                <button class="btn btn-dark btn-sm" type="button" style="background:#ca256b">
                    <i class="fas fa-calendar-day mr-2"></i>
                    <em><?=date('d.m.Y', $item->date)?></em>
                </button>
            </div>
            <div class="card-body">
                <?=$item->content?>
            </div>
        </div>
    <?php } ?>
</div>

<style>
    .news img{
        max-width: 100%;
        max-height: 100%;
    }
</style>
