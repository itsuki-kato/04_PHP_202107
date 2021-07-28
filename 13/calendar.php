<?php

$year  = (new DateTime())->format('Y');
$month = (new DateTime())->format('m');
$dayCount = 1;
$days = [];

if (!empty($_POST)) {
    $year  = $_POST['year'];
    $month = $_POST['month'];
    $format    = $year . '-' . $month . '-01';
    $date      = new DateTime($format);

    $firstWeek = $date->format('w');
    $lastDay   = $date->modify('last day of this month')->format('d');
    $allDays   = ($firstWeek + $lastDay) > 35 ? 42 : 35;

    for ($i = 0; $i < $allDays; $i++) {
        if ($i < $firstWeek) {
            $days[] = '';
        } elseif ($dayCount > $lastDay) {
            $days[] = '';
        } else {
            $days[] = $dayCount;
            $dayCount++;
        }
    }
    echo '<pre>';
    print_r($days);
    echo '</pre>';

}
function h($string)
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
    <title>カレンダー</title>
    <style>
        table {
            border-collapse: collapse;
            width: 700px;
        }

        tr:nth-of-type(even) {
            background-color: #f6f6f6;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #eee;
            font-weight: bold;
        }

        td:first-of-type {
            background-color: #fee;
            font-weight: bold;
            color: #900;
        }

        td:nth-of-type(7) {
            background-color: #eef;
            font-weight: bold;
            color: #009;
        }
    </style>
</head>

<body>
    <h1>カレンダー</h1>
    <form action="" method="post">
        <p>
            <select name="year">
                <?php for ($y = 1980; $y <= 2030; $y++):?>
                    <option value="<?=h($y)?>" <?= $year == $y ? 'selected': ''?>><?=h($y)?></option>
                <?php endfor; ?>
            </select>年
            <select name="month">
                <?php for ($m = 1; $m <= 12; $m++):?>
                    <option value="<?=h($m)?>" <?= $month == $m ? 'selected': ''?>><?=h($m)?></option>
                <?php endfor; ?>
            </select>月
            <input type="submit" value="生成">
        </p>
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] === "POST") : ?>
        <table>
            <tr>
                <th>日</th>
                <th>月</th>
                <th>火</th>
                <th>水</th>
                <th>木</th>
                <th>金</th>
                <th>土</th>
            </tr>
            <tr>
                <?php for ($i = 0; $i < count($days); $i++):?>
                    <?php if ($i % 7 == 6):?>
                        <td><?=h($days[$i])?></td></tr><tr>
                    <?php else:?>
                        <td><?=h($days[$i])?></td>
                    <?php endif; ?>
                <?php endfor; ?>
            </tr>
        </table>
    <?php endif; ?>
</body>

</html>