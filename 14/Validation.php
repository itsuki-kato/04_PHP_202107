<?php
class Validation
{
    /**
     * 氏名の空白判定
     *
     * @param string|null $name
     * @return string|null
     */
    public function validName(string|null $name): ?string
    {
        if ($name) {
            // 何かしらの入力があればnullを返す
            return null;
        }

        if ($name === '') {
            return '氏名を入力してください';
        }
    }

    /**
     * フリガナの空白判定と入力形式の判定
     *
     * @param string|null $name
     * @return string|null
     */
    public function validKana(string|null $kana): ?string
    {

        if ($kana === '') {
            return 'フリガナを入力してください';
        } elseif (!preg_match('/^[ァ-ヶ]+$/u', $kana)) {
            return 'フリガナの形式が正しくありません';
        } else {
            // 正しい入力の場合はnullを返す
            return null;
        }
    }

    /**
     * 電話番号の空白判定と入力形式の判定
     *
     * @param string|null $name
     * @return string|null
     */
    public function validPhone(string|null $phone): ?string
    {

        if ($phone === '') {
            return '電話番号を入力してください';
        } elseif (!preg_match('/^0\d{10,11}$/', $phone)) {
            return '電話番号の形式が正しくありません';
        } else {
            return null;
        }
    }
}
