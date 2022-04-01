<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
function triangle ($value)
{
  $result = "";
  for($i=1;$i<=$value; $i++)
  {
    for($j=1;$j<=$i; $j++)
    {
     $result .= 0;
    }
    $result .= "<br>";
  }
  return $result;
}
 echo triangle(10);
?>
</body>
</html>




