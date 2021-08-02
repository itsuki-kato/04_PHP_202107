<?php
require_once 'util.inc.php';

$size = 200;
$num  = 5;

const UP_PATH = 'uploads/';


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $size = $_POST['size'];
    $num  = $_POST['num'];

    if ($_FILES['upfile']['error'] === UPLOAD_ERR_OK) {

        if (
            !move_uploaded_file(
                $_FILES['upfile']['tmp_name'],
                UP_PATH . mb_convert_encoding(serialNum($_FILES['upfile']['name']), 'cp932', 'utf8')
            )
        ) {
            $messageError = 'アップロードに失敗しました';
        } elseif ($_FILES['upfile']['error'] === UPLOAD_ERR_NO_FILE) {
        } else {
            $messageError = 'アップロードに失敗しました';
        }
    }
}

$files = glob('uploads/*.png');
$replace = ['uploads/', '.png'];
$tableWidth = $size * $num;

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>画像ギャラリー</title>
    <style>
        h1,
        form,
        table {
            width: <?= h($tableWidth) ?>px;
            margin: auto;
        }

        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: center;
        }

        th {
            background-color: #eee;
        }

        img {
            display: block;
            padding: 3px;
            border: 1px solid #aaa;
            box-shadow: 0 0 8px #ccc;
        }

        img:hover {
            box-shadow: 0 0 8px #ccc, 0 0 12px #669;
        }

        span {
            font-size: 12px;
            font-weight: bold;
        }

        span::after {
            content: " ]";
        }

        span::before {
            content: "[ ";
        }

        .error {
            color: #990000;
        }
    </style>
</head>

<body>
    <h1>画像ギャラリー</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <p>
            画像幅：
            <select name="size">
                <?php for ($i = 100; $i <= 200; $i += 50):?>
                    <option <?= $size == $i ? 'selected' : ''; ?>><?=h($i)?></option>
                <?php endfor;?>
            </select>
        </p>
        <p>横並びの数：
            <?php for ($j = 3; $j <= 6; $j++):?>
            <input type="radio" name="num" value="<?=h($j)?>" <?= $num == $j ? 'checked' : ''; ?>><?=h($j)?>
            <?php endfor;?>
        </p>
        <input type="file" name="upfile">
        <p><input type="submit" value="送信"></p>
    </form>
    <?php if (0 < count($files)) : ?>
        <table>
            <tr>
                <th colspan="<?= h($num) ?>">画像一覧</th>
            </tr>
            <tr?>
                <?php foreach ($files as $key => $file) : ?>
                    <?php
                    $file = str_replace($replace, '', mb_convert_encoding($file, 'utf8', 'cp932'));
                    ?>
                    <?php if ($key % $num === $num - 1) : ?>
                        <td>
                            <img src="<?= h(UP_PATH . $file . '.png') ?>" width="<?= h($size) ?>" alt="<?= h($file) ?>">
                            <span><?=h($file)?></span>
                        </td></tr><tr>
                    <?php else : ?>
                        <td>
                            <img src="<?= h(UP_PATH . $file . '.png') ?>" width="<?= h($size) ?>" alt="<?= h($file) ?>">
                            <span><?=h($file)?></span>
                        </td>
                    <?php endif; ?>
                <?php endforeach; ?>
                        </tr>
        </table>
    <?php else : ?>
        <table>
            <tr>
                <th colspan="<?= h($num) ?>">画像一覧</th>
            </tr>
            <tr>
                <td>アップロードされたファイルはありません</td>
            </tr>
        </table>
    <?php endif; ?>
</body>

</html>