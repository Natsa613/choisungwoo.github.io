<!DOCTYPE HTML>
<html>
<head>
</head>
<boby>
<?php
/*--------------------
Title : 초간단 달력
Author : Cho Sung O
---------------------*/
$nErr = "";
$mErr = "";
$n = "";
$m = "";


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
  if (empty($_POST["m"])) {
    $mErr = "n is required";
  } else {
    $m = test_input($_POST["m"]);
    // check if name only contains letters and whitespace
    if (!is_int($m)) {
      $mErr = "Only number allowed";
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

<h2>PHP homework4_5</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  year: <input type="text" name="n" value="<?php echo $n;?>">
  <br><br>
  month:<input type="text" name="m" value="<?php echo $m;?>">
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
$YYYY=$n;
$MM=$m;

$before = $MM - 1;
$after = $MM + 1;

$firstday_weeknum = date("w", mktime(0, 0, 0, $MM, 1, $YYYY)); 
$lastday = date("t", mktime(0, 0, 0, $MM, 1, $YYYY)); 


if($MM == 2) { 
    if(($YYYY % 4) == 0 && ($YYYY % 100) != 0 || ($YYYY % 400) == 0) { $lastday = 29; }
}

$td1 = "<TD width='20' align='center'><font size='2' align='center'><b>";
$td2 = "</b></font></TD><TD width='20' height='20' align='center'><font size='2' align='center'><b>";
$td3 = "</b></font></TD>\n";
?>
<table width=130><tr>
<td align=center><?php echo "$YYYY";?>년 <?php echo "$MM";?>월
</td></tr>
</table>
<?php
echo("<table border=1 cellspacing=0 cellpadding=2 bordercolorlight=#CCCCCC bordercolordark=#FFFFFF bgcolor=#FFFFFF><TR>\n");
echo($td1."<font color='red'>日</font>".$td2."月".$td2."火".$td2."水".$td2."木".$td2."金".$td2."<font color='green'>土</font>".$td3);
echo("</TR><TR>");

$week = 0;
for ($i=0; $i < $firstday_weeknum; $i++) { echo("<TD>&nbsp;</TD>"); $week++; }
for($d=1; $d <= $lastday; $d++)
{


    if ($week == 7) { echo("</TR></TR>"); $week = 0; }
    $day = (date("j") == $d)? "<font color='deepink'><b>".$d."</b></font>":$d;
   
    echo("<TD wdith='20' height='20' align='center'><font size=2>".$day."</font></TD>\n");

    $week++;
}


for ($i=$week; $i < 7; $i++) { echo("<TD>&nbsp;</TD>\n"); }
echo("</TR>\n");
echo("</TABLE>\n"); 

?>
</body>
</html>