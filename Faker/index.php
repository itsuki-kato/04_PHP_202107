<?php
// 繰り返す回数を指定
// あまり表示量を増やしすぎるとスクロールが毎回面倒になるので注意する。
define('NUM',20);

// fakerクラスライブラリの読み込み
require_once 'autoload.php';
// オリジナルの値を配列を読み込み
require_once 'Faker/Provider/ja_JP/Title.php';

// Faker静的メソッドでローカライズ設定し内部でインスタンスを生成
$faker = Faker\Factory::create('ja_JP');

// 取得コード例
// $faker->name,            // 名前:井上 さゆり
// $faker->postcode,        // 郵便番号:4043535
// $faker->prefecture,      // 都道府県:栃木県
// $faker->city,            // 市:津田市
// $faker->streetAddress,   // 住所:山岸町吉田10-4-5
// $faker->phoneNumber,     // 電話番号:080-2454-2863
// $faker->safeEmail,       // メール:tanabe.taro@example.org
// $faker->dateTimeBetween('-80 years','-20years')->format('Y-m-d'),
// 生年月日 (20〜80年前の誕生日):1987-01-24
// $faker->numberBetween(1, 100), // 1〜100のランダム数字:74
// $faker->realText(20),    // ダミーテキスト20文字:ひとりともだんだろうとしまわって涙なみ。(宮沢賢治の「銀河鉄道の夜」の抜粋)

// // ***** データベース利用実習 *****

// // Fakerの使い方 // // // // // // // // // // // // // // //
// // 必要な繰り返し構文のブロックをコメント解除してブラウザに出力。
// // SQLのINSERT文が出力されるので、コピーしてクエリを実行する。


// // 03_データ操作 追加データ(mydb.members:6件目から追加)
// for ($i = 6; $i < NUM + 6; $i++) {

//     // 半角空きを削除した氏名を取得
//     $name = str_replace(' ','',$faker->name);

//     // 年齢を取得
//     $age = $faker->numberBetween(1, 100);

//     // 県名を取得
//     $address = $faker->prefecture;

//     // 15年前からのランダムな日付を取得
//     $date = $faker->dateTimeBetween('-15 years')->format('Y-m-d H:d:s');

// 		// 最終的にSQLコードを出力
//     echo "INSERT INTO members (name,age,address,created_at) VALUES ('".$name."',".$age.",'".$address."','".$date."');<br>";

// }


// // 03_データ操作 追加データ (blog.categories:3件目から追加)
// for ($i = 2; $i < 10; $i++) {
//         // カテゴリー名
//         $c_name = CT[$i]['categoryName'];

//         echo "INSERT INTO categories (name) VALUES ('".$c_name."');<br>";
// }

// // 03_データ操作 追加データ (blog.articles:5件目から追加)
// for ($i = 5; $i < NUM + 5; $i++) {

//     // カテゴリーIDを取得
//     $c_id = $faker->numberBetween(1, 10);

//     // タイトルを取得
//     $rand = rand(0,4);
//     $title = CT[$c_id]["categoryTitle"][$rand];

//     // 記事を取得
//     $article = $faker->realText(20);

//     // 15年前からのランダムな日付を取得
//     $date = $faker->dateTimeBetween('-15 years')->format('Y-m-d H:d:s');

//     // 最終的にSQLコードを出力
//     echo "INSERT INTO articles (category_id,title,article,created_at) VALUES (".$c_id.",'".$title."','".$article."','".$date."');<br>";

// }


// // 05_テーブルの連携 追加データ (shop.goods:7件目から追加)
// for ($i = 7; $i < NUM + 7; $i++) {

//     // メーカー名を取得
//     $rand = rand(0,29);
//     $maker = MK[$rand];

//     // 商品名を取得
//     $name = ST[$rand];

//     // 料金を取得
//     $price = rand(1, 30) . rand(1, 100) . "0";

//     // 最終的にSQLコードを出力
//     echo "INSERT INTO goods (maker,name,price) VALUES ('".$maker."','".$name."',$price);<br>";
// }

// // 05_テーブルの連携 追加データ (shop.sales:8件目から追加)
// for ($i = 8; $i <= NUM + 8; $i++) {

//     // IDを4桁で取得
//     $id = 1 . sprintf('%03d', $i);

//     // 商品番号を取得
//     $goods_id = rand(0,29);

//     // 販売個数を取得
//     $count = rand(1,10);

//     // // 日時を取得
//     $created_at = $faker->dateTimeBetween('-80 years','-20years')->format('Y-m-d');

//     // // 最終的にSQLコードを出力
//     echo "INSERT INTO sales (id,goods_id,count,created_at) VALUES (".$id.",".$goods_id.",".$count.",'".$created_at."');<br>";
// }


// // 08_MySQL復習テスト 追加データ (mybbs.posts:4件目から追加)
// for ($i = 4; $i < NUM + 4; $i++){

//     // 半角空きを削除した氏名を取得
//     $name = str_replace(' ','',$faker->name);

//     // 記事を取得
//     $message = $faker->realText(20);

//     // 1年前からのランダムな日付を取得
//     $date = $faker->dateTimeBetween('-1 years')->format('Y-m-d H:d:s');

//     // 最終的にSQLコードを出力
//     echo "INSERT INTO posts (name,message,created_at) VALUES ('".$name."','".$message."','".$date."');<br>";

// }

// // 05_テーブルの連携 編集データ (posts:初回3件分の名前変更)
// echo <<<EOT
// UPDATE posts SET name = '田中太郎' where id = 1;<br>
// UPDATE posts SET name = '山田花子' where id = 2;<br>
// UPDATE posts SET name = '佐藤次郎' where id = 3;
// EOT;


// // ***** システム開発演習 *****

// // 01_CDUDシステム 追加データ (news:7件目から追加)

// for ($i = 7; $i < 27; $i++){

//     // 1年前からのランダムな日付を取得
//     $posted = $faker->dateTimeBetween('-1 years')->format('Y-m-d H:d:s');

//     // タイトルを取得
//     $rand = rand(0,17);
//     $title = NT[$rand];

//     // 記事を取得
//     $mLength = rand(80,120);
//     $message = $faker->realText($mLength);

//     // 画像ファイル名を取得(画像press06～18.jpgまで追加済の場合)
//     $imgNum = rand(1,18);
//     if ($imgNum < 10) {
//         $image = 'press0' . $imgNum  . '.jpg';
//     }else {
//         $image = 'press' . $imgNum . '.jpg';
//     }

//     // 最終的にSQLコードを出力
//     echo "INSERT INTO news (posted_at,title,message,image) VALUES ('".$posted."','".$title."','".$message."','".$image."');<br>";
// }
