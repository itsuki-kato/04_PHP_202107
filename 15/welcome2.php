<?php

$totalLang = [
    [
      'language' => '英語',
      'nation'   => 'en',
      'greeting' => 'Welcome!'
    ],
    [
      'language' => '日本語',
      'nation'   => 'ja',
      'greeting' => 'ようこそ!'
    ],
    [
      'language' => '韓国語',
      'nation'   => 'kr',
      'greeting' => '오신 것을 환영합니다!'
    ],
    [
      'language' => '中国語',
      'nation'   => 'cn',
      'greeting' => '欢迎光临!'
    ],
    [
      'language' => 'イタリア語',
      'nation'   => 'it',
      'greeting' => 'Benvenuto!'
    ],
    [
      'language' => 'スペイン語',
      'nation'   => 'es',
      'greeting' => 'Hola!'
    ],
    [
      'language' => 'ロシア語',
      'nation'   => 'ru',
      'greeting' => 'Привет!'
    ]
  ];

$lang    = $totalLang[1]['nation'];
$message = $totalLang[1]['greeting'];

if (!empty($_POST)) {
    $lang = $_POST['lang'];
} elseif (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
}

setcookie('lang', $lang, time() + 86400 * 30);

for ($i = 0; $i < count($totalLang); $i++){
    if ($lang == $totalLang[$i]['nation']) {
        $message = $totalLang[$i]['greeting'];
    }
}

/**
 * XSS対策の参照名省略
 *
 * @param string string
 * @return string
 *
 */
function h(?string $string): string
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= h($message) ?></title>
</head>

<body>
    <h1><?= h($message) ?></h1>
    <form action="" method="post">
        <select name="lang">
            <?php for ($i = 0; $i < count($totalLang); $i++):?>
                <option value="<?=h($totalLang[$i]['nation'])?>" <?= $lang == $totalLang[$i]['nation'] ? 'selected' : ''; ?>><?=h($totalLang[$i]['language'])?></option>
            <?php endfor;?>
        </select>
        <p><input type="submit" value="送信"></p>
    </form>
</body>

</html>