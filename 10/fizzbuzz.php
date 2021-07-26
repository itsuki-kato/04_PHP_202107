<?php
for ($i = 1; $i <= 100; $i++) {

    if ($i % 3 == 0 && $i % 5 == 0) {
        echo $i . ':fizzbuzz';
    }
    elseif ($i % 3 == 0) {
        echo $i . ':fizz';
    }
    elseif ($i % 5 == 0) {
        echo $i . ':buzz';
    }
    else {
        echo $i;
    }
    echo '<br>';
}