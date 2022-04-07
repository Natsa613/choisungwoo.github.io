<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$widthErr = $heightErr = $radiusErr = $lengthErr = "";
$width = $height = $radius = $length = "";
$pi = 3.14;
/*
t= 삼각형
r= 직사각형
c= 원
cube= 직육면체
cylinder= 원통
s= 구
height= 높이,세로
width= 넓이,가로
length= 세로
radius= 반지름
*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["width"])) {
    $widthErr = "n is required";
  } else {
    $width = test_input($_POST["width"]);
    // check if name only contains letters and whitespace
    if (!is_int($width)) {
      $widthErr = "Only number allowed";
    }
  }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["height"])) {
    $heightErr = "n is required";
  } else {
    $height = test_input($_POST["height"]);
    // check if name only contains letters and whitespace
    if (!is_int($height)) {
      $heightErr = "Only number allowed";
    }
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["radius"])) {
    $radiusErr = "n is required";
  } else {
    $radius = test_input($_POST["radius"]);
    // check if name only contains letters and whitespace
    if (!is_int($radius)) {
      $radiusErr = "Only number allowed";
    }
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["length"])) {
    $lengthErr = "n is required";
  } else {
    $length = test_input($_POST["length"]);
    // check if name only contains letters and whitespace
    if (!is_int($length)) {
      $lengthErr = "Only number allowed";
    }
  }
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>homework4_5</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  가로: <input type="number"  name="width" value="<?php echo $width;?>">
  <br><br>
  세로: <input type="number"  name="height" value="<?php echo $height;?>">
  <br><br>
  높이: <input type="number"  name="length" value="<?php echo $length;?>">
  <br><br>
  반지름: <input type="number"  name="radius" value="<?php echo $radius;?>">
  <br><br>
  *파이는 3.14*
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
/*
$t = $width * $height / 2;
$r =$width * $height / 2;
$c = $width * $height / 2;
$cube = $width * $length * $height;
$cylinder = $pi * $radius ** 2 * $height;
$s =  4/3 * $pi * $radius ** 3;
*/

echo "<h2>Your Input:</h2>";
echo "삼각형:". $width * $height / 2;
echo "<br>";
echo "직사각형:". $width * $height / 2;
echo "<br>";
echo "원:". $width * $height / 2;
echo "<br>";
echo "직육면체:".$width * $length * $height;;
echo "<br>";
echo "원통:". $pi * $radius ** 2 * $height;
echo "<br>";
echo "구:". 4/3 * $pi * $radius ** 3;
?>

</body>
</html>