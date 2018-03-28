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
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/jquery-ui.min.js"></script></head><body>
<script  >


		$(document).ready(function() {
			$(".moreinfo").hide();

			$('.rem').click(function() {
				var next = $(this).next();

				
					next.slideToggle();
					
				
			});
		});
	</script>
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
				<li class="selected"><a href="exams.php">Exams</a></li>
				 
				<li><a href="about.php">About Us</a></li>
				<li><form method="post" action="index.php"><input type="submit" class="logut" value="LOGOUT" name="logout"></form> </li>
			</ul></div>
		</div>
		<div class="exam">
			<div class="result">


				<div class="heading">
					Results
				</div>
				<div class="rcontent">
					<?php
							$usid=$_COOKIE["user"];


							$data=mysqli_connect("localhost","root","","Center4Info") or die();
							$db=mysqli_query($data,"SELECT `result`,`date`,`day`,TIME_FORMAT(`time`,'%H:%i') as `time`,`subject` FROM exam WHERE `status`='1' AND `userid`='$usid' ORDER BY `date`,`time`");
							foreach ($db as $val) {
								$head=$val['subject'];
								$cnt=$val['result'];
								$date=$val['date'];
								$d=date_create_from_format("Y-m-d",$date);
								$da=$d->format("d");
								$mon=$d->format("F");
								$day=$val['day'];
								

								echo "
								 <div class=rem id=examrem>
									<div class=ddate id=exdate>$da</div>
									<div class=rrem >
									<div class=inhead>$head</div>
									<div class=inmonth>$mon, $day</div>
									<div id=resbtn><a href=$cnt><input type=button class=rebut value=Result></a>
									</div>
									</div>
									</div>
									";
							}
							?>
				</div>
			</div>
		<div class="upcoming">
		<div class="heading">
			Upcoming Exams
		</div>
		<div class="ucontent">
					<?php
							$usid=$_COOKIE["user"];


							$data=mysqli_connect("localhost","root","","Center4Info") or die();
							$db=mysqli_query($data,"SELECT `syllabus`,`date`,`day`,TIME_FORMAT(`time`,'%H:%i') as `time`,`subject` FROM exam WHERE `status`='1' AND `userid`='$usid' ORDER BY `date`,`time`");
							foreach ($db as $val) {
								$head=$val['subject'];
								$cnt=$val['syllabus'];
								$date=$val['date'];
								$d=date_create_from_format("Y-m-d",$date);
								$da=$d->format("d");
								$mon=$d->format("F");
								$day=$val['day'];
								$tym=$val['time'];

								echo "
								 <div><div class=rem id=examrem>
									<div class=ddate id=exdate>$da</div>
									<div class=rrem>
									<div class=inhead>$head</div>
									<div class=inmonth>$mon, $day</div>
									<div class=intime id=intimes
									>$tym Onwards <input type=button class=rebut2 value=Syllabus>
									</div>
									</div>
									</div>
									<div class=moreinfo id=stdback2>$cnt</div></div>
									";
							}
							?>
		</div>
	</div>

</div>
<div id="content_footer"></div>
<div id="footer">

</div>
</body></html>