<?php
const IMG_PATH = 'images/';
if (!empty($_FILES)) {
    if ($_FILES['userfile']['error'] == UPLOAD_ERR_OK) {
        if (
            move_uploaded_file(
                $_FILES['userfile']['tmp_name'],
                IMG_PATH . mb_convert_encoding($_FILES['userfile']['name'], 'cp932', 'utf8')
            )
        ) {
            $message = 'ファイルをアップロードしました';
        } else {
            $message = 'ファイルの移動に失敗しました';
        }
    } elseif ($_FILES['userfile']['error'] == UPLOAD_ERR_NO_FILE) {
        $message = 'ファイルがアップロードされませんでした';
    } else {
        $message = 'ファイルのアップロードに失敗しました';
    }
}

$files   = glob('images/*.jpg');
$replace = ['images/', '.jpg'];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アップロードテスト</title>
    <style>
        ul {
            padding: 0;
            list-style-type: none;
            display: grid;
            grid-template-columns:
                repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            grid-auto-rows: 200px;
            grid-auto-flow: dense;
        }

        li {
            border: 1px solid #ccc;
            text-align: center;
        }

        li:nth-of-type(4n+2) {
            grid-column: span 2;
            grid-row: span 2;
        }

        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <h1>アップロードテスト</h1>
    <?php if (isset($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <form action="" method="post" enctype="multipart/form-data">
        <p><input type="file" name="userfile"></p>
        <p><input type="submit" value="送信"></p>
    </form>
    <h2>画像一覧</h2>
    <?php if (0 < count($files)) : ?>
        <ul>
            <?php for ($i = 0; $i < count($files); $i++) : ?>
                <?php $file = mb_convert_encoding(str_replace($replace, '', $files[$i]), 'utf8', 'cp932'); ?>
                <li><img src="images/<?= $file ?>.jpg" alt="<?= $file ?>" width="100"></li>
            <?php endfor; ?>
        </ul>
    <?php else : ?>
        <p>ファイルをアップロードしてください</p>
    <?php endif; ?>
</body>

</html>