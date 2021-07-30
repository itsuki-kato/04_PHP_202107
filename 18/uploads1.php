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

    <?php if (0 < count($files)):?>
        <table>
            <tr>
                <th colspan="4">画像一覧</th>
            </tr>
            <tr>
                <?php for ($i = 0; $i < count($files); $i++):?>
                    <?php $file = mb_convert_encoding(str_replace($replace, '', $files[$i]), 'utf8', 'cp932');?>
                    <?php if ($i % 4 == 3):?>
                        <td><img src="images/<?=$file ?>.jpg" alt="<?=$file?>" width="100"></td></tr><tr>
                    <?php else:?>
                        <td><img src="images/<?=$file ?>.jpg" alt="<?=$file?>" width="100"></td>
                    <?php endif;?>
                <?php endfor;?>
            </tr>
        </table>
    <?php else:?>
        <table>
            <tr>
                <th colspan="4">画像一覧</th>
            </tr>
            <tr>
                <td colspan="4">ファイルをアップロードしてください</td>
            </tr>
        </table>
    <?php endif;?>
</body>

</html>