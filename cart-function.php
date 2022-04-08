

<?php

function total_price($giohang){
    $total_price = 0;
    foreach ($giohang as $key => $value){
        $total_price += $value['quantity'] * $value['gia'];
    }
    return $total_price;
}

?>