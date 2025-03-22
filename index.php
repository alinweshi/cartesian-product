<?php
require 'src/CartesianProduct.php';

$sets = [
    [1, 2],
    ['a', 'b'],
    ['X', 'Y']
];

$result = cartesianProduct(...$sets);
echo "<pre>";
print_r($result);
echo "</pre>";
