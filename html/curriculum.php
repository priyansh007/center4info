<?php
$name="";
$usid="";
$usid=$_COOKIE["user"];
if(!isset($_COOKIE['user'])){
	header("location:login.php");
}
else{
	
	$data=mysqli_connect("localhost","root","","Center4Info") or die();
	$db=mysqli_query($data,"SELECT `fname`,`lname` FROM login WHERE `userid`='$usid'");
	$db=mysqli_fetch_assoc($db);
	$fn=$db['fname'];
	$ln=$db['lname'];
	$name=$fn." ".$ln;

}
?>

<!DOCTYPE HTML>
<html><head><title>black &amp; white</title><meta name="description" content="website description"><meta name="keywords" content="website keywords, website keywords"><meta http-equiv="content-type" content="text/html; charset=windows-1252"><link rel="stylesheet" type="text/css" href="../css/style.css?version=51" title="style">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"></head><body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div class="black">
        <img class="clogo" src="../images/logo.png">
        <div class="loginname">
					<?php echo $name; ?><br>
					<?php echo $usid; ?>
		</div>
      </div>
      </div>
      <div id="menubar">
        <ul id="menu"> <li ><a href="index.php">Home</a></li>
          <li><a href="collegeevents.php">College Events</a></li>
          <li><a href="exams.php">Exams</a></li>
          <li class="selected"><a href="curriculum.php">Curriculum</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><form method="post" action="index.php"><input type="submit" class="logut" value="LOGOUT" name="logout"></form> </li>
        </ul></div>
    </div>
    <div class="currimain">
    	<div class="curriframe">
    		<div class="lside">
    			<a href="http://www.svnit.ac.in/web/department/computer/btech_1.php" target="aaaa" ><div class="lleft">1<sup>st</sup>YEAR</div></a>
    			<div class="lleft">2<sup>nd</sup>YEAR</div>
    			<div class="lleft">3<sup>rd</sup>YEAR</div>
    			<div class="lleft">4<sup>th</sup>YEAR</div>
    		</div>
    		<div class="rside">
    			<iframe name="aaaa" class="rside2"></iframe>
    		</div>
    	</div>

    </div>

    <div id="content_footer"></div>
    <div id="footer">
     
</div>
  </div>
</body></html>
