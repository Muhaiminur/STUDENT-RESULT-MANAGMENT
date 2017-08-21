<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Brushwood 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20131025

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MUHAIMINUR RAHMAN</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="style.css">

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->
<style>
</style>

</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="index.html">MUHAIMINUR RAHMAN</a></h1>
			<div id="menu">
				<ul>
					<li class="current_page_item"><a href="newstudent.php" accesskey="1" title="">INSERT NEW STUDENT</a></li>
					<li><a href="newsubject.php" accesskey="2" title="">INSERT NEW SUBJECT</a></li>
					<li><a href="newexam.php" accesskey="2" title="">INSERT NEW EXAM</a></li>
					<li><a href="insertdata.php" accesskey="2" title="">INSERT DATABASE</a></li>
					<li><a href="ssc.php" accesskey="3" title="">SCHOOL</a></li>
					<li><a href="#" accesskey="4" title="">COLLEGE</a></li>
					<li><a href="#" accesskey="5" title="">UNIVERSITY</a></li>
					<li><a href="search.php" accesskey="6" title="">SEARCH</a></li>
				</ul>
			</div>

		</div>
	</div>
</div>

<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<form method="POST">
			<select id="my" name="my">
				<?php
				$con=mysqli_connect("localhost","root","root","cv");
				// Check connection
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				$result = mysqli_query($con,"SELECT * FROM studentinfo");
				echo "CHOOSE NAME ::";
				while($row = mysqli_fetch_array($result))
				{
					echo "<";
					echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
				}
				?>
			</select>
			</form>
			<form method="POST">
			<select id="my2" name="my2">
				<?php
				$result2 = mysqli_query($con,"SELECT * FROM examname");
				while($row2 = mysqli_fetch_array($result2))
				{
					echo "<";
					echo "<option value='" . $row2['id'] . "'>" . $row2['description'] . "</option>";
				}
				$examid = $_POST['my2']
				?>
			</select>
			</form>
			<form method="POST3">
			<select id="my3" name="my3">
				<?php
				;
				$result3 = mysqli_query($con,"SELECT xam FROM transcript tran inner JOIN subject s ON s.id = tran.subject_id inner JOIN examname ex ON ex.id = tran.examname_id where ex.id = '$examid'");
				echo "CHOOSE NAME ::";
				while($row3 = mysqli_fetch_array($result3))
				{
					echo "<";
					echo "<option value='" . $row3['id'] . "'>" . $row3['xam'] . "</option>";
				}
				?>
			</select>
			</form>

		</div>
	</div>
</div>
<div id="copyright" class="container">
	<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">GOOGLE</a> | Design by MUHAIMINUR RAHMAN ABIR</a>.</p>
		<ul class="contact">
			<li><a href="#" class="icon icon-twitter"><span>Twitter</span></a></li>
			<li><a href="#" class="icon icon-facebook"><span></span></a></li>
			<li><a href="#" class="icon icon-dribbble"><span>Pinterest</span></a></li>
			<li><a href="#" class="icon icon-tumblr"><span>Google+</span></a></li>
			<li><a href="#" class="icon icon-rss"><span>Pinterest</span></a></li>
		</ul>
</div>
</body>
</html>
