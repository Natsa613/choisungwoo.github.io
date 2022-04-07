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
$nErr = "";
$n = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["n"])) {
    $nErr = "n is required";
  } else {
    $n = test_input($_POST["n"]);
    // check if name only contains letters and whitespace
    if (!is_int($n)) {
      $nErr = "Only number allowed";
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

<h2>PHP homework4_2</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  n: <input type="number" min="10" max="100" name="n" value="<?php echo $n;?>">
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo "입력한 숫자:".$n;
?>

<br>

<?php

$nan = array();

for($i=0; $i<=$n; $i++){
  $dada = rand (0,100);//난수 생성
  array_push($nan,$dada);//생성한 난수를 배열에 넣음
}
sort ($nan);//배열을 오름차순으로 정리

$stack = count($nan);
echo "난수:";
for($i =  1; $i < $stack; $i++){
  echo $nan[$i];//난수 출력
  echo " ";
}


 ?>

</body>
</html>