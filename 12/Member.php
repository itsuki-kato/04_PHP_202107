<?php
class Member
{
    private $name;
    private $age;
    private $address;

    /**
     * 初期値の追加
     *
     * @param string $n
     * @param integer $a
     * @param string $ad
     */
    public function __construct (string $n, int $a, string $ad)
    {
        $this->name    = $n;
        $this->age     = $a;
        $this->address = $ad;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function showInfo()
    {
        echo '<ul>';
        echo '<li>名前：' . $this->name . '</li>';
        echo '<li>年齢：' . $this->age . '</li>';
        echo '<li>住所：' . $this->address . '</li>';
        echo '</ul>';
    }
}