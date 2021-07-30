<?php
const SMTP_HOST     = 'smtp.gmail.com';
const SMTP_PORT     = 587;
const SMTP_PROTOCOL = 'tls';
const GMAIL_SITE    = 'arihito.m@gmail.com';
const GMAIL_APPPASS = 'nqtcjsqftyaypvrd';
// 代替テキスト(送信元のGmailでOK)
const MAIL_FROM     = ['arihito.m@gmail.com' => '公式サイト'];
// 複数の送信先の設定
const MAIL_TO       = [
  'arihito.m@gmail.com'  => 'Web担当者様',
  'a.matsuda@ebacorp.jp' => '営業担当者様'
];
const MAIL_TITLE    = 'タイトル';