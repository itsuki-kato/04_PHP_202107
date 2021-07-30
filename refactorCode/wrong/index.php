<?php
require_once ("class.php");
$class = new prime_minister();
$prime_minister_date = $class -> prime_minister_get ($_POST);
?>
<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css.css" rel="stylesheet">
    <title>グループワーク用ページ</title>
</head>
<body>
    <main>
        <div class="pageTitle">
        <h1>総理大臣検索</h1>
        </div>

        <form action="" method="post">
            <div>
                <table class="data_table">
                    <tr>
                        <th>日付</th>
                        <th>総理名</th>
                    </tr>
                    <?php foreach(prime_minister :: prime_ministar_list as $key => $val):?>
                    <tr>
                        <td class="data_table_td">
                            <?php echo $val ?>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </table>
                <br><br>
            </div>
            <div>
                <?php if(!empty($_POST['primedate'])):?>
                <?php echo '<p>'.$_POST['primedate'].'</p>' ?>
                <?php echo '<p>この時の内閣総理大臣は<span style="color:red;font-size:18px;font-weight:bold">'.$prime_minister_date.'</span>です。勉強になりましたね！</p>' ?>
                <?php endif;?>
                <input type="date" name="primedate" value="<?= !empty($_POST)?$_POST['primedate']:'' ?>">
                <input type="submit" name="submit" value="送信">
            </div>
        </form>

    </main>
</body>
