<html>
<head>

<style type="text/css">
.form-style-5{
    max-width: 500px;
    padding: 10px 20px;
    background: #f4f7f8;
    margin: 10px auto;
    padding: 20px;
    background: #f4f7f8;
    border-radius: 8px;
    font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-5 fieldset{
    border: none;
}
.form-style-5 legend {
    font-size: 1.4em;
    margin-bottom: 10px;
}
.form-style-5 label {
    display: block;
    margin-bottom: 8px;
}
.form-style-5 input[type="text"],
.form-style-5 input[type="date"],
.form-style-5 input[type="datetime"],
.form-style-5 input[type="email"],
.form-style-5 input[type="number"],
.form-style-5 input[type="search"],
.form-style-5 input[type="time"],
.form-style-5 input[type="url"],
.form-style-5 textarea,
.form-style-5 select {
    font-family: Georgia, "Times New Roman", Times, serif;
    background: rgba(255,255,255,.1);
    border: none;
    border-radius: 4px;
    font-size: 16px;
    margin: 0;
    outline: 0;
    padding: 7px;
    width: 100%;
    box-sizing: border-box; 
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box; 
    background-color: #e8eeef;
    color:#8a97a0;
    -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    margin-bottom: 30px;
    
}
.form-style-5 input[type="text"]:focus,
.form-style-5 input[type="date"]:focus,
.form-style-5 input[type="datetime"]:focus,
.form-style-5 input[type="email"]:focus,
.form-style-5 input[type="number"]:focus,
.form-style-5 input[type="search"]:focus,
.form-style-5 input[type="time"]:focus,
.form-style-5 input[type="url"]:focus,
.form-style-5 textarea:focus,
.form-style-5 select:focus{
    background: #d2d9dd;
}
.form-style-5 select{
    -webkit-appearance: menulist-button;
    height:35px;
}
.form-style-5 .number {
    background: #1abc9c;
    color: #fff;
    height: 30px;
    width: 30px;
    display: inline-block;
    font-size: 0.8em;
    margin-right: 4px;
    line-height: 30px;
    text-align: center;
    text-shadow: 0 1px 0 rgba(255,255,255,0.2);
    border-radius: 15px 15px 15px 0px;
}

.form-style-5 input[type="submit"],
.form-style-5 input[type="button"]
{
    position: relative;
    display: block;
    padding: 19px 39px 18px 39px;
    color: #FFF;
    margin: 0 auto;
    background: #1abc9c;
    font-size: 18px;
    text-align: center;
    font-style: normal;
    width: 100%;
    border: 1px solid #16a085;
    border-width: 1px 1px 3px;
    margin-bottom: 10px;
}
.form-style-5 input[type="submit"]:hover,
.form-style-5 input[type="button"]:hover
{
    background: #109177;
}
body {
            background-color: #FFFF00;
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
                <ul class="menu">
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
	

<div class="form-style-5">
<form method="post" action="addmeexam.php">
<fieldset>
<legend><span class="number">1</span> INSERT NEW EXAM</legend>
</select>
<input type="text" name="field1" placeholder=" EXAM NAME" id="f1">
   
</fieldset>
<fieldset>
<legend><span class="number">2</span> Additional Info</legend>
<textarea name="field3" placeholder="About Your School"></textarea>
</fieldset>
<input name="update" type="submit" id="update" value="Update"/>
</form>

</div>
<?php

/*$con=mysqli_connect("localhost","root","root","cv");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



if(isset($_POST['update']))
{
echo "ABIR IS";
$id = $_POST['taskOption'];
$name = $_POST['field1'];
$roll = $_POST['field2'];

$sql = "UPDATE studentinfo SET name = '$name', role = '$roll', WHERE id = '$id'";

if (mysqli_query($con, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}//
}*/
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "cv";

try {
    $name = $_POST['field1'];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST['update']))
{
    $sql = "INSERT INTO examname (des   cription)
    VALUES ('{$name}')";
    // use exec() because no results are returned
    $conn->exec($sql);
    //header("Location: newexam.php");
    //header("Refresh:0;url=newexam.php");
    echo'<script> window.location="newsubject.php"; </script>';
}
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
</body>
</html> 