<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<form action="" method="post">
        <label for="number">Number</label>
        <input type="number" name="inputValue" placeholder="enter a number">
        <button type="submit">Check It</button>
    </form>
</body>
</html>
<?php
function controlOfValue($value)
{
    $firstValue = $value;
    if ($value == "") {
        $result = "Değer boş olamaz.";
    } else {
        if ($value % 3 == 0) {
            $result = "Girilen değer 3 ile bölünebiliyor.";
        } else {
            $value++;
            while ($value % 3 != 0) {
                $value++;
            }
            $result = "<b></b>Girilen Sayı : 4".$firstValue."</b>".
            "<br/>Girdiğiniz sayı 3'e bölünemez.Bölünebilecek ilk sayı".$value."'dır.";
        }
    }
    return $result;
}
echo controlOfValue($_POST['inputValue']);?>