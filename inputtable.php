<?php
$bar = $_REQUEST['foo'];
$con=mysqli_connect("localhost","root","root","cv");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT tran.id, xam FROM transcript tran inner JOIN subject s ON s.id = tran.subject_id inner JOIN examname ex ON ex.id = tran.examname_id where ex.id = '$bar'");

/* If there are results from database push to result array */

$data = array();
while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row;
 }
 echo json_encode( $data )                          //fetch result    
?>