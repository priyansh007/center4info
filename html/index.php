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

if(isset($_POST['accept']))
{
	$re=$_REQUEST['rec'];
	$data=mysqli_connect("localhost","root","","Center4Info") or die();
	mysqli_query($data,"UPDATE request SET `status`='1' WHERE `receiver`='$usid' AND `sender`='$re'");
	echo "<script type='text/javascript'>alert('Request Accpeted');</script>";
}
if(isset($_POST['send']))
{
	$re=$_REQUEST['rec'];
	$data=mysqli_connect("localhost","root","","Center4Info") or die();
	$auto=mysqli_query($data,"SELECT max(`rid`) FROM request");
	$auto=mysqli_fetch_assoc($auto);
	$auto=$auto['max(`rid`)'];
	$auto++;
	mysqli_query($data,"INSERT INTO request VALUES('$auto','$usid','$re','0')");
	echo "<script type='text/javascript'>alert('Request Sent Successfully');</script>";
}
if(isset($_POST['postbutton']))
{
	$pst=$_POST['postupdate'];	
	
	$time=time();
	
	$data=mysqli_connect("localhost","root","","Center4Info") or die();
	$auto=mysqli_query($data,"SELECT max(`pid`) FROM post");
	$auto=mysqli_fetch_assoc($auto);
	$auto=$auto['max(`pid`)'];
	$auto++;
	mysqli_query($data,"INSERT INTO post VALUES('$auto','$usid','$pst','$time')");
	echo "<script type='text/javascript'>alert('Successfully Posted');</script>";
}
if (isset($_POST['logout'])) {
	setcookie('user', '', time() - 3600);	
header("location:login.php");
	echo "safsafs";
}
	 
?>

<!DOCTYPE HTML>
<html><head><title>index</title><link rel="stylesheet" type="text/css" href="../css/style.css?version=51" title="style">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
 
<body>
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
			<ul id="menu"> 
			    <li class="selected"><a href="index.php">Home</a></li>
				<li><a href="collegeevents.php">College Events</a></li>
				<li><a href="exams.php">Exams</a></li>
			 
				<li><a href="about.php">About Us</a></li>
				<li><form method="post" action="index.php"><input type="submit" class="logut" value="LOGOUT" name="logout"></form> </li>
			</ul>
		</div>
	</div>
	<div class="maincontent">
	<div class="rbar">
				<div class="searchbar">
					<input type="searchengine" name="sengine" placeholder="Search..." id="sbar" onkeyup="search(this.value)">
					<button id="sbtn">Search</button>
					<div id="dropdown">

					</div>

				</div>
				<div class="reqaccept">
					<?php
					$tdat="";
					$receiv=$_COOKIE['user'];
					$dt=mysqli_connect("localhost","root","","Center4Info") or die();	
					$req=mysqli_query($dt,"SELECT `sender` FROM request WHERE `receiver`='$receiv' AND `status`='0'");

					foreach ($req as $val) {
						$id=$val['sender'];
						$name=mysqli_query($dt,"SELECT `fname`,`lname`,`userid` FROM login WHERE `userid`='$id'");
						$name=mysqli_fetch_assoc($name);
						$fn=$name['fname'];
						$ln=$name['lname'];
						$userid=$name['userid'];
						$tdat=$tdat."<tr><td class=row>$fn $ln</td><td class=row>$userid</td><td class=row><form method=post action=index.php?rec=$id><input type=submit name=accept value=Accept id=abtn></form></td></tr>";

					}
					echo "<table class=searchtabl>$tdat</table>";					
					?>
				</div>

			</div>
		<div class="lbar">
			<div class="pst">

				<form  class="sharebar" method="post" action="index.php"><textarea name="postupdate" cols="60" rows="5" placeholder="Write Something Here" class="writepost"></textarea> 
					<input type="submit" name="postbutton" class="postbtn" value="Post"></form>
					<div class="mainpost" id="style-13">
						<?php
						$id=array();
						$i=0;
						$usid=$_COOKIE["user"];
						$data=mysqli_connect("localhost","root","","Center4Info") or die();
						$db=mysqli_query($data,"SELECT `sender`,`receiver` FROM request WHERE (`sender`='$usid' OR `receiver`='$usid') AND `status`='1'");
						foreach ($db as $var) {
							if($var['sender']==$usid)
							{
								$id[$i]=$var['receiver'];
							}
							else
							{
								$id[$i]=$var['sender'];
							}

							$i++;
						}

						$id[$i]=$usid;
						$m=0;
						for($n=0;$n<=$i;$n++)
						{
							$db=mysqli_query($data,"SELECT `pid` FROM post WHERE `userid`='$id[$n]'");
							foreach ($db as $key) {
								$d[$m]=$key['pid'];

								$m++;
							}
						}
						sort($d);
						for($j=($m-1);$j>=0;$j--)
						{ 
							$db=mysqli_query($data,"SELECT `userid`,`content`,`time` FROM post WHERE `pid`='$d[$j]'");
							$db=mysqli_fetch_assoc($db);
							$userid=$db['userid'];
							$nm=mysqli_query($data,"SELECT `fname`,`lname` FROM login WHERE `userid`='$userid'");
							$nm=mysqli_fetch_assoc($nm);
							$fn=$nm['fname'];
							$fn=ucfirst($fn);
							$ln=$nm['lname'];
							$ln=ucfirst($ln);
							$time=$db['time'];
							$userid=strtoupper($userid);
							date_default_timezone_set("Asia/Kolkata");
							$time2=time();
						//echo $time;
						//echo $time2;
							$diff=$time2-$time;
							$df=(int)$diff/3600;
							$r=(int)$diff/3600;
							if($df<1)
							{
								if((int)($diff/60)<2)
								{
									if((int)($diff/60)<1)
									{
										$df="Just Now";
									}
									else{
										$df="1 Minute";
									}
								}
								else
								{
									$df=((int)($diff/60))." Minutes";
								}
							}
							else{
								$df=(int)$df." Hours";
							}


							$content=$db['content'];
							if($r<24){
								echo "<div class=whole>";
								echo "<div class=upost>$fn $ln <div id=headuid> &nbsp;&nbsp;($userid)</div></div>";
								echo "<div class=tpost>$df</div>";
								echo "<pre><div class=cpost>$content</div></pre>";
								echo "</div>";
							}
							else{
								$data=mysqli_connect("localhost","root","","Center4Info") or die();
								mysqli_query($data,"DELETE FROM post WHERE `pid`='$d[$j]'");
							}
						}

						?>
					</div>
				</div>

			</div>
			

		</div>
		<div id="content_footer"></div>
		<div id="footer">

		</div>
	</div>
</body></html>

<script type="text/javascript">
	function search(val1)
	{if(val1==""){
		document.getElementById("dropdown").innerHTML="";
		return;
	}
	else{

		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {

			if (this.readyState == 4 && this.status == 200) {

				document.getElementById("dropdown").innerHTML = this.responseText;	
			}
		};

		xhttp.open("GET", "searchid.php?id="+val1, true);
		xhttp.send();
	}
}

</script>
