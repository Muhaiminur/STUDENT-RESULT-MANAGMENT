<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<head>
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

$result = mysqli_query($con,"SELECT * FROM examname");

echo"<label for='job'>NAME:</label>";

while($row = mysqli_fetch_array($result))
{
echo "<option value='" . $row['id'] . "'>" . $row['description'] . "</option>";
}

//update


mysqli_close($con);
?>
</select>
		</div>
	</div>
</div>
<table id="tbl" border="10">
<thead>
<tr>
<td>SELECT</td>
<td>LIST</td>
<td>SUBJECT</td>
</tr>
</thead>
<tbody>
	



	<?php 
		$con=mysqli_connect("localhost","root","root","cv");
		// Check connection
		if (mysqli_connect_errno())
		{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$result = mysqli_query($con,"SELECT * FROM subject");
		while($row = mysqli_fetch_array($result))
			{
		?>
		<tr>
		<td>
			<?php $va=$row['id']; ?>
		<input type="checkbox" name="check_list[]" value="<?php echo htmlspecialchars($va); ?>"/>
		</td>
		<td><?php echo $va;?></td>
		<td><?php echo $row['xam'];?></td>
	 	</tr>
	 <?php 
		}
	 	mysqli_close($con);
	 ?>
</tbody>
</table>

  <input type="submit" name="go" method="post">
</form>
<?php
$examid = $_POST['my'];
if(isset($_POST['go'])){
     if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) {
            addFunction($examid,$check); //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    }
	}
}
?>

		<?php
		
         function addFunction($num1, $num2) {
         	$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "cv";

try {
    $name = $_POST['field1'];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO transcript (examname_id, subject_id)VALUES ('{$num1}', '{$num2}')";
    			// use exec() because no results are returned
    $conn->exec($sql);
    
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;


         	//
         }
      	?>

</body>
</html>