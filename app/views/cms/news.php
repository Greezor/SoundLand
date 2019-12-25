<div class="card" align="center" style="width: 50rem;margin:50px auto; background-color:#FFFFFF99;border: 6px solid #00000099;padding: 10px; border-radius: 25px;">
    <div class="card-body">
        <h2>Новости</h2>

        <div style="background:white">
            <table class="table table-striped table-bordered w-100">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Дата</th>
                        <th>Заголовок</th>
                        <th colspan="2">
                            <a class="btn btn-success btn-sm btn-block" href="/cms/news_form">
                                <i class="fas fa-plus"></i>
                                <span>Создать новость</span>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($news as $item){ ?>
                        <tr>
                            <td><?=$item->id?></td>
                            <td><?=$item->humanDate?></td>
                            <td><?=htmlspecialchars($item->name)?></td>
                            <td style="width:170px">
                                <a class="btn btn-info btn-sm btn-block" href="/cms/news_form?id=<?=$item->id?>">
                                    <i class="fas fa-pen"></i>
                                    <span>Редактировать</span>
                                </a>
                            </td>
                            <td style="width:120px">
                                <a
                                    onclick="if( !confirm('Вы уверены, что хотите удалить новость?') ) return false;"
                                    class="btn btn-danger btn-sm btn-block"
                                    href="/cms/delete_news?id=<?=$item->id?>">
                                    <i class="fas fa-trash"></i>
                                    <span>Удалить</span>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
