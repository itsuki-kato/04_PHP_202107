<?php

interface Car
{
    public function drive();
}

class Cars implements Car
{
    private $maker;
    private $customer;

    /**
     * 乗車する人と車種をプロパティに追加
     *
     * @param string $m
     * @param string $c
     */
    public function __construct (string $m = 'BMW', string $c = '私')
    {
        $this->maker    = $m;
        $this->customer = $c;
    }

    /**
     * 乗車する人と車種のメッセージを返す
     *
     * @return string
     */
    public function rideOnCar(): string
    {
        return $this->customer . 'は' . $this->maker . 'の車に乗っています。<br>';
    }

    public function drive ()
    {
        return 'ブロロロロ〜<br>';
    }
}

$c1 = new Cars('Toyota', '彼');
echo $c1->rideOnCar(); // 彼はToyotaの車に乗っています。<br>

$c2 = new Cars();
echo $c2->rideOnCar(); // 私はBMWの車に乗っています。<br>
echo $c2->drive();     // ブロロロロ〜<br>