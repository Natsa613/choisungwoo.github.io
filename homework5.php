<?php
$link = mysqli_connect("localhost", 'root', '','ticket');
$_GET['order'] = isset($order) ? $_GET['order'] : null;
?>
<html>
<head>
    <meta charset="utf-8">
    <title>놀이공원 입장권</title>
    <style>
        .input-wrap {
            width: 960px;
            margin: 0 auto;
        }
        h1 { text-align: center; }
        th, td { text-align: center; }
        table {
            border: 1px solid #000;
            margin: 0 auto;
        }
        td, th {
            border: 1px solid #ccc;
            border-collapse: collapse;
        }
        a { text-decoration: none; }
    </style>
</head>
<body>
    <div class="input-wrap">
        <form action="homework5.php" method="POST">
        고객성명 <input type="text" name="name">
        <div class = "submit_box">    
            <input type="submit" name="submit" value="합계" style="float:right;">
        </div>
            <br><br>
            <table>
                <thead>
                    <tr>
                        <!--
                        이름 = name
                        어린이 = kids
                        성인 = adult
                        -->
                        <th>No </th>
                        <th>구분</th>
                        <th colspan="2">어린이</th>
                        <th colspan="2">어른</th>
                        <th>비고</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>입장권</td>
                        <td>7,000</td>
                        <td><select name="kids1"><option value = "0">0</option><option value = "1">1</option><option value = "2">2</option>
                        <option value = "3">3</option><option value = "4">4</option><option value = "5">5</option></td>
                        <td>10,000</td>
                        <td><select name="adult1"><option value = "0">0</option><option value = "1">1</option><option value = "2">2</option>
                        <option value = "3">3</option><option value = "4">4</option><option value = "5">5</option></td>
                        <td>입장</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>BIG3</td>
                        <td>12,000</td>
                        <td><select name="kids2"><option value = "0">0</option><option value = "1">1</option><option value = "2">2</option>
                        <option value = "3">3</option><option value = "4">4</option><option value = "5">5</option></td>
                        <td>16,000</td>
                        <td><select name="adult2"><option value = "0">0</option><option value = "1">1</option><option value = "2">2</option>
                        <option value = "3">3</option><option value = "4">4</option><option value = "5">5</option></td>
                        <td>입장+놀이3종</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>자유이용권</td>
                        <td>21,000</td>
                        <td><select name="kids3"><option value = "0">0</option><option value = "1">1</option><option value = "2">2</option>
                        <option value = "3">3</option><option value = "4">4</option><option value = "5">5</option></td>
                        <td>26,000</td>
                        <td><select name="adult3"><option value = "0">0</option><option value = "1">1</option><option value = "2">2</option>
                        <option value = "3">3</option><option value = "4">4</option><option value = "5">5</option></td>
                        <td>입장+놀이자유</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>연간이용권</td>
                        <td>70,000</td>
                        <td><select name="kids4"><option value = "0">0</option><option value = "1">1</option><option value = "2">2</option>
                        <option value = "3">3</option><option value = "4">4</option><option value = "5">5</option></td>
                        <td>90,000</td>
                        <td><select name="adult4"><option value = "0">0</option><option value = "1">1</option><option value = "2">2</option>
                        <option value = "3">3</option><option value = "4">4</option><option value = "5">5</option></td>
                        <td>입장+놀이자유</td>
                    </tr>
                </tbody>
            </table>
       </form>
       <div class = "result">
       <?php 
        date_default_timezone_set("Asia/Seoul");
        echo date("Y년 m월 d일 H:i분");
       
       if(isset($_POST["name"]) && strlen($_POST["name"]) > 0)
        {
            $name = $_POST["name"];
            echo $name, " 고객님 감사합니다. <br>";
            if($_POST["kids1"] > 0)
            {
                echo "어린이 입장권 ", $_POST["kids1"], "매<br>";
            }
            if($_POST["adult1"] > 0)
            {
                echo "어른 입장권 ", $_POST["adult1"], "매<br>";
            }
            if($_POST["kids2"] > 0)
            {
                echo "어린이 BIG3 ", $_POST["kids2"], "매<br>";
            }
            if($_POST["adult2"] > 0)
            {
                echo "어른 BIG3 ", $_POST["adult2"], "매<br>";
            }
            if($_POST["kids3"] > 0)
            {
                echo "어린이 자유이용권 ", $_POST["kids3"], "매<br>";
            }
            if($_POST["adult3"] > 0)
            {
                echo "어른 자유이용권 ", $_POST["adult3"], "매<br>";
            }
            if($_POST["kids4"] > 0)
            {
                echo "어린이 연간이용권 ", $_POST["kids4"], "매<br>";
            }
            if($_POST["adult4"] > 0)
            {
                echo "어른 연간이용권 ", $_POST["adult4"], "매<br>";
            }
            $sum = $_POST["kids1"] * 7000 + $_POST["adult1"] * 10000 + $_POST["kids2"] * 12000 +
            $_POST["adult2"] * 16000 + $_POST["kids3"] * 21000 + $_POST["adult3"] * 26000 +
            $_POST["kids4"] * 70000 + $_POST["adult4"] * 90000;
            echo "합계 ", $sum, "원입니다.";

            $sql=" INSERT INTO  'number' ".
                "VALUES ('$name', '$_POST[kids1]',  '$_POST[kids2]',  '$_POST[kids3]',  '$_POST[kids4]',  '$_POST[adult1]',  '$_POST[adult2]',  '$_POST[adult3]',  '$_POST[adult4]', '$sum')";
            mysqli_query($link,$sql);
            mysqli_close($link);
        }
       ?>
       </div>
    </div>
</body>
</html>