<div class="card" style="width: 50rem;margin:50px auto; background-color:#FFFFFF99;border: 6px solid #00000099;padding: 10px; border-radius: 25px;">
    <div class="card-body">
        <?php if( $error ){ ?>
            <div class="alert alert-danger">
                <span>Что-то пошло не так!</span>
            </div>
        <?php } ?>

        <form method="POST">
            <p>
                <span>Заголовок</span>
                <input class="form-control" type="text" name="News[name]" value="<?=htmlspecialchars($news->name)?>">
            </p>
            <p>
                <span>Дата</span>
                <input class="form-control" type="date" name="News[date]" value="<?=htmlspecialchars($news->humanDate)?>">
            </p>
            <p>
                <span>Текст</span>
                <input type="hidden" name="News[content]" value="<?=htmlspecialchars($news->content)?>">
                <div style="background:white">
                    <div id="editor">
                        <?=$news->content?>
                    </div>
                </div>
            </p>
            <button class="btn btn-dark" type="submit">Сохранить</button>
        </form>
    </div>
</div>

<script type="text/javascript">
    var editor = new Quill('#editor', {
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block', 'image', 'link', 'video'],

                [{ 'header': 1 }, { 'header': 2 }],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'script': 'sub' }, { 'script': 'super' }],
                [{ 'indent': '-1' }, { 'indent': '+1' }],
                [{ 'direction': 'rtl' }],

                [{ 'size': ['small', false, 'large', 'huge'] }],
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

                [{ 'color': [] }, { 'background': [] }],
                [{ 'font': [] }],
                [{ 'align': [] }],

                ['clean'],
            ],
        },
        placeholder: '',
        theme: 'snow',
    });

    editor.on('text-change', function(){
        var contentInput = document.querySelector('input[name="News[content]"]');
        contentInput.value = editor.root.innerHTML;
    });
</script>
