<?php

function finalPrice($price, $discount)
{
    if ($discount > 0) {
        return round($price - ($price * $discount / 100), 2);
    }
    return $price;
}
