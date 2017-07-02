<!DOCTYPE HTML>
<html lang="ko">
  <head>
	<meta charset="utf-8">
	<font size="50"><h1><center><span style="color:green">옥화양어장</span></center></h1></font>




    <style>
      body {
        margin: 0px;
        padding: 0px;
	text-align: center;
      }
      #content{
	line-height:50px;
	display: inline-block;
	margin: 0 auto;
	width:300px; height:160px;
      }

      table {
        width: 100%;
	border-collapse: collapse;
      }
       p {
	color:purple;
	font-size:36px;
	 }

    </style>
  </head>
  <body>

<div id="content">

<?php 
$delay =30;
header("Refresh: $delay;");

$data = shell_exec("php realtime.php"); $pattern = " "; $arrdata = split($pattern,$data); echo "<p><strong>DO: ".$arrdata[0]."mg/L</strong></p>";?>
<img src="picture/fishtank1.gif" width="370" height="150"/><br><?php echo "<font size=5>TEMP: ".$arrdata[1]."°C</font>";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "<font size=5>PH: ".$arrdata[2]."ph</font>";?></div>
<div id="content"><?php echo "<p><strong>DO: ".$arrdata[3]."mg/L</strong></p>";?><img src="picture/fishtank2.gif" width="370" height="150"/><br><?php echo "<font size=5>TEMP: ".$arrdata[4]."°C</font>";?></div>

<br>
<br>


<div id="content"><?php echo "<p><strong>DO: ".$arrdata[6]."mg/L</strong></p>";?><img src="picture/fishtank3.gif" width="370" height="150"/><br><?php echo "<font size=5>TEMP: ".$arrdata[7]."°C</font>";?></div>
<div id="content"><?php echo "<p><strong>DO: ".$arrdata[9]."mg/L</strong></p>";?><img src="picture/fishtank4.gif" width="370" height="150"/><br><?php echo "<font size=5>TEMP: ".$arrdata[10]."°C</font>";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "<font size=5>PH: ".$arrdata[11]."ph</font>";?></div>

<br>
<br>

<div id="content"><?php echo "<p><strong>DO: ".$arrdata[12]."mg/L</strong></p>";?><img src="picture/fishtank5.gif" width="370" height="150"/><br><?php echo "<font size=5>TEMP: ".$arrdata[13]."°C</font>";?></div>
<div id="content"><?php echo "<p><strong>DO: ".$arrdata[15]."mg/L</strong></p>";?><img src="picture/fishtank6.gif" width="370" height="150"/><br><?php echo "<font size=5>TEMP: ".$arrdata[16]."°C</font>";?></div>

<br>
<br>

<div id="content"><?php echo "<p><strong>DO: ".$arrdata[18]."mg/L</strong></p>";?><img src="picture/fishtank7.gif" width="370" height="150"/><br><?php echo "<font size=5>TEMP: ".$arrdata[19]."°C</font>";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "<font size=5>PH: ".$arrdata[20]."ph</font>";?></div>
<div id="content"><?php echo "<p><strong>DO: ".$arrdata[21]."mg/L</strong></p>";?><img src="picture/fishtank8.gif" width="370" height="150"/><br><?php echo "<font size=5>TEMP: ".$arrdata[22]."°C</font>";?></div>

<br>
<br>

<div id="content"><?php echo "<p><strong>DO: ".$arrdata[24]."mg/L</strong></p>";?><img src="picture/fishtank9.gif" width="370" height="150"/><br><?php echo "<font size=5>TEMP: ".$arrdata[25]."°C</font>";?></div>
<div id="content"><?php echo "<p><strong>DO: ".$arrdata[27]."mg/L</strong></p>";?><img src="picture/fishtank10.gif" width="370" height="150"/><br><?php echo "<font size=5>TEMP: ".$arrdata[28]."°C</font>";?></div>

</body>
<p>Copyright &copy; Boso RnD Corporation. 2017 All Rights Reserved.</p>

</html>
