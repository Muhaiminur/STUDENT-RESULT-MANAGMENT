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
/* Styles Go Here */
    * {font-family: Helvetica Neue, Arial, sans-serif; }

body { background-image: linear-gradient(#aaa 25%, #000);}

h1, table { text-align: center; }

table {border-collapse: collapse;  width: 70%; margin: 0 auto 5rem;}

th, td { padding: 1.5rem; font-size: 1.3rem; }

tr {background: hsl(50, 50%, 80%); }

tr, td { transition: .4s ease-in; } 

tr:first-child {background: hsla(12, 100%, 40%, 0.5); }

tr:nth-child(even) { background: hsla(50, 50%, 80%, 0.7); }

td:empty {background: hsla(50, 25%, 60%, 0.7); }

tr:hover:not(#firstrow), tr:hover td:empty {background: #ff0; pointer-events: visible;}
tr:hover:not(#firstrow) { transform: scale(1.2); font-weight: 700; box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.5);}
</style>

</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="index.html">MUHAIMINUR RAHMAN</a></h1>
			<div id="menu">
				<ul>
					<li class="current_page_item"><a href="newstudent.php" accesskey="1" title="">NEW STUDENT</a></li>
					<li><a href="newsubject.php" accesskey="2" title="">NEW SUBJECT</a></li>
					<li><a href="newexam.php" accesskey="2" title="">NEW EXAM</a></li>
					<li><a href="transcript.php" accesskey="2" title="">NEW TRANSCRIPT</a></li>
					<li><a href="privacy.php" accesskey="3" title="">INSERT RESULT</a></li>
					<li><a href="resultlist.php" accesskey="4" title="">SHOW RESULT</a></li>
					<li><a href="search.php" accesskey="6" title="">SEARCH</a></li>
				</ul>
			</div>

		</div>
	</div>
</div>

<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<h2><a href="addmeexam.php">INSERT NEW EXAM NAME</a></h2>
		</div>
	</div>
</div>
<?php
$con=mysqli_connect("localhost","root","root","cv");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM examname");

echo "<table border='1'>
<tr>
<th>LIST</th>
<th>EXAM NAME</th>
</tr>";
//
//

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['description'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
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