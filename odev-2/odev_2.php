<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> (array_map(), array_filter() ve array_rand()</title>
</head>
<body>

<?php
$planets = ["Mercury", "Venus", "Earth", "Mars", "Jupiter", "Saturn", "Uranus", "Neptune", "", "", NULL];

function myFunc($array, $value)
{
    $arr_filter = array_filter($array);
    $arr_rnd = array_rand($arr_filter, $value);
    $result = array_map(function($i) use($arr_filter)
    {
      return $arr_filter[$i];
    } , $arr_rnd );
    return $result;
}


echo "<pre>";
print_r(myFunc($planets, 2));
print_r(myFunc($planets, 3));
print_r(myFunc($planets, 2));
print_r(myFunc($planets, 4));
print_r(myFunc($planets, 5));
echo "</pre>";
?>

</body>
</html>




