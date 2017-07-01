<!DOCTYPE HTML>
<html lang="ko">
  <head>
	<meta charset="utf-8">


	<font size="45"><center><h1><span style="color:green">옥화스마트양어장</span></center></h1></font>
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
      }

      table {
        width: 100%;
      }
      table, th, td {
        border: 1px solid #bcbcbc;
      }
    
</style>
  </head>
  <body>


<table>
      <tbody>
        <tr>
          <th><div id="content">

<?php 
$delay =30;
header("Refresh: $delay;");
$data = shell_exec("php realtime.php"); $pattern = " "; $arrdata = split($pattern,$data); 

/*
if($arrdata[4] && $arrdata[8] == 0){
	$arrdata[4] = null;
}
if($arrdata[6] == 0){
        $arrdata[6] = null;
}
*/


echo "<font size=6>DO: ".$arrdata[0]."mg/L</font>";?>
<br><img src="picture/fishtank1.gif" width="370" height="150"/><br><?php echo "<font size=5>TEMP: ".$arrdata[1]."°C</font>";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "<font size=5>PH: ".$arrdata[2]."ph</font>";?></div></th>

<th><div id="content"><?php echo "<font size=6>DO: ".$arrdata[3]."mg/L</font>";?><br><img src="picture/fishtank2.gif" width="370" height="150"/><br><?php echo "<font size=5>TEMP: ".$arrdata[4]."°C</font>";?></div></th>

<th><div id="content"><?php echo "<font size=6>DO: ".$arrdata[6]."mg/L</font>";?><br><img src="picture/fishtank3.gif" width="370" height="150"/><br><?php echo "<font size=5>TEMP: ".$arrdata[7]."°C</font>";?></div></th>

<th><div id="content"><?php echo "<font size=6>DO: ".$arrdata[9]."mg/L</font>";?><br><img src="picture/fishtank4.gif" width="370" height="150"/><br><?php echo "<font size=5>TEMP: ".$arrdata[10]."°C</font>";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "<font size=5>PH: ".$arrdata[11]."ph</font>";?></div></th>

<th><div id="content"><?php echo "<font size=6>DO: ".$arrdata[12]."mg/L</font>";?><br><img src="picture/fishtank5.gif" width="370" height="150"/><br><?php echo "<font size=5>TEMP: ".$arrdata[13]."°C</font>";?></div></th>



        </tr>


<tr>
<th><br><br><br><br></th><th></th><th></th><th></th><th></th>
</tr>
<tr>
<p></p>
	<th><div id="content"><?php echo "<font size=6>DO: ".$arrdata[15]."mg/L</font>";?><br><img src="picture/fishtank6.gif" width="370" height="150"/><br><?php echo "<font size=5>TEMP: ".$arrdata[16]."°C</font>";?></div></th>
	<th><div id="content"><?php echo "<font size=6>DO: ".$arrdata[18]."mg/L</font>";?><br><img src="picture/fishtank7.gif" width="370" height="150"/><br><?php echo "<font size=5>TEMP: ".$arrdata[19]."°C</font>";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "<font size=5>PH: ".$arrdata[20]."ph</font>";?></div></th>
	<th><div id="content"><?php echo "<font size=6>DO: ".$arrdata[21]."mg/L</font>";?><br><img src="picture/fishtank8.gif" width="370" height="150"/><br><?php echo "<font size=5>TEMP: ".$arrdata[22]."°C</font>";?></div></th>
	<th><div id="content"><?php echo "<font size=6>DO: ".$arrdata[24]."mg/L</font>";?><br><img src="picture/fishtank9.gif" width="370" height="150"/><br><?php echo "<font size=5>TEMP: ".$arrdata[25]."°C</font>";?></div></th>
	<th><div id="content"><?php echo "<font size=6>DO: ".$arrdata[27]."mg/L</font>";?><br><img src="picture/fishtank10.gif" width="370" height="150"/><br><?php echo "<font size=5>TEMP: ".$arrdata[28]."°C</font>";?></div></th>

	</tr>
        </tbody>
</table>
<br>
<br>
</body>
<p>Copyright &copy; Boso RnD Corporation. 2017 All Rights Reserved.</p>

</html>      

