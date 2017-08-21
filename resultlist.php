<!DOCTYPE html>
<html>
<head>
<title>MUHAIMINUR RAHMAN</title>
<style>
		body {
		    background-color: #B0C4DE;
		    text-align: center;
		}
		.menu {
			background-color: #DC143C;
		  width: 100%;
		  border: 2px solid black;

		}
		.menu li {
		  display: inline-block;
		  float: center;
		  <font color='"WHITE"'>padding-right: 30px;</font>
		}
		table { margin: auto; }
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
				while($row = mysqli_fetch_array($result))
				{
					echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
				}
				?>
			</select>
			<select id="my2" name="my2">
				<?php
				$result2 = mysqli_query($con,"SELECT * FROM examname");
				while($row2 = mysqli_fetch_array($result2))
				{
					echo "<option value='" . $row2['id'] . "'>" . $row2['description'] . "</option>";
				}
				
				?>
			</select>
			<table id="tbl" border="10">
			<thead>
			<tr>
			<td>SUBJECT</td>
			<td>RESULT</td>
			</tr>
			</thead>
			<input type="submit" name="go" method="post">
			<tbody>
				<?php
				if(isset($_POST['go'])){
					$abir1 = $_POST['my'];
				$abir2 = $_POST['my2'];
				$result3 = mysqli_query($con,"SELECT subject.xam,result.result
				FROM
			    result
			    inner JOIN
			    transcript ON result.transcript_id
			    
			    = transcript.id
			    inner JOIN
			    subject ON transcript.subject_id=subject.id
			    where transcript.examname_id='$abir2' and result.studentinfo_id='$abir1'");
				while($row3 = mysqli_fetch_array($result3))
				{
				
				?>
				<tr>
					<td><?php echo $row3['xam']?></td>
					<td><?php echo $row3['result']?></td>
	 			</tr>
	 			<?php
				}
				echo $abir;
			}
				//echo "<option value='" . $row3['id'] . "'>" . $row3['id'] . "</option>";

				?>
			</tbody>
			</table>
			</form>
			<?php
			mysqli_close($con);
			?>
</body>
</html>