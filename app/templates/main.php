<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SoundLand</title>
</head>
<body>
    <header>
        <big>
            <h1>
                SoundLand
            </h1>
        </big>
    </header>

    <hr>

    <div class="content">
        <?=$this->render($view, $params, false)?>
    </div>

    <hr>

    <footer>
        &copy; <?=date('Y')?> Leon 
    </footer>
</body>
</html>
