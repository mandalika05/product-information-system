<?php

function hitungTotalNilaiStok($products)
{
    $total = 0;

    foreach ($products as $product) {
        $total += $product["harga"] * $product["stok"];
    }

    return $total;
}

function hitungTotalStok($products)
{
    $total = 0;

    foreach ($products as $product) {
        $total += $product["stok"];
    }

    return $total;
}

function hitungStokKritis($products)
{
    $total = 0;

    foreach ($products as $product) {
        if ($product["stok"] < STOK_KRITIS) {
            $total++;
        }
    }

    return $total;
}

?>
