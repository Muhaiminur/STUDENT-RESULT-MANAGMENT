<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
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
					<li><a href="resultsubmit.php" accesskey="3" title="">INSERT RESULT</a></li>
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
					$abir2=$row2['id'];
				}
				
				?>
			</select>
			<input type="submit" name="go2" method="post">
			<table id="tbl" border="10">
			<thead>
			<tr>
			<td>LIST</td>
			<td>SUBJECT</td>
			<td>INPUT</td>
			</tr>
			</thead>
			<tbody>
				<select id="my3" name="my3">

				<?php
				if(isset($_POST['go2'])){
					$tid=array();
					$i=1;
					$c=1;
					$abir = $_POST['my2'];
					$result3 = mysqli_query($con,"SELECT tran.id, xam FROM transcript tran inner JOIN subject s ON s.id = tran.subject_id inner JOIN examname ex ON ex.id = tran.examname_id where ex.id = '$abir'");
					while($row3 = mysqli_fetch_array($result3))
					{
						$tid[$i]=$row3['id'];
					?>
					<tr>
						<td><?php echo $row3['id']?></td>
						<td><?php echo $row3['xam']?></td>
						<td><input type="text" name="res[]"></td>
		 			</tr>
		 			<?php 
		 			$i++;
					}

				}
				
				//echo "<option value='" . $row3['id'] . "'>" . $row3['id'] . "</option>";
				?>
				</select>
			</tbody>
			</table>
			<input type="submit" name="go" method="post">
			</form>
			<?php
			$sid = $_POST['my'];//studentid
			$lol=0;
			//pdo connection setup
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "cv";
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    		// set the PDO error mode to exception
    		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if(isset($_POST['go'])){
     		if(!empty($_POST['res'])) {
    		foreach($_POST['res'] as $check) {
    		$lol++;

            addFunction($check,$lol,$tid,$sid,$conn); //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    				}
				}
				}
			?>
			<h1>This is a Heading :: <?php echo $abir ?> </h1>
			<?php
			mysqli_close($con);
			function addFunction($num1,$c,$tid,$sid,$conn) {
				echo "value = ".$num1."ID = ".$tid[$c];
				$sql = "INSERT INTO result (transcript_id, result, studentinfo_id)
    			VALUES ('{$tid[$c]}', '{$num1}', '{$sid}')";
    			// use exec() because no results are returned
    			$conn->exec($sql);
    			echo "New record created successfully";
			}

			$arrlength=count($tid);
			for($y=1;$y<$arrlength+1;$y++){
					echo $tid[$y];
  					echo "<br>";

			}
			?>
</body>
</html>