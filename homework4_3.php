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

<h2>PHP homework4_3</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  n: <input type="number" min="0" max="100" name="n" value="<?php echo $n;?>">
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo "입력한 숫자:".$n;
?>

<br>

<?php
function fibo($n){
  if ($n == 0||$n == 1)return(1);
  return(fibo($n-1) + fibo($n-2));
}

function fibo_d($n){
  return(fibo($n+1) / fibo($n));  
}

$f = array(
  array("i"=>$n,"피보나치 수열"=>fibo($n),"비례"=>fibo_d($n))
);

foreach($f as $value){
    echo $value['i'].",".$value['피보나치 수열'].",".$value['비례']."<br ,>";
}

?>

</body>
</html>