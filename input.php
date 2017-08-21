<!DOCTYPE html>
<html>
<head>
<title>MUHAIMINUR RAHMAN</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
</script>
<?php $htmlString= 'testing'; ?>
<script>
 function shtable(){
  var sid = document.getElementById('my2');
  var user = sid.options[sid.selectedIndex].value;
  document.getElementById('divid').style.visibility='visible';
  var name="kieran";
  document.getElementById("output").innerHTML=user;
  var htmlString="<?php echo 'abir'; ?>"
  //alert(htmlString);
  return false;
 }
</script>
</head>
<body>
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
          echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        }
        ?>
      </select>
      <select id="my2" name="my2" class="target" onchange="return shtable();">
        <?php
        $result2 = mysqli_query($con,"SELECT * FROM examname");
        while($row2 = mysqli_fetch_array($result2))
        {
          echo "<option value='" . $row2['id'] . "'>" . $row2['description'] . "</option>";
          $abir2=$row2['id'];
        }
        
        ?>
      </select>

<div id="divid" style="visibility: hidden;">
  <table id="tbl" border="10">
      <thead>
      <tr>
      <td>LIST</td>
      <td>SUBJECT</td>
      <td>INPUT</td>
      </tr>
      </thead>
</div>
</form>
<p id="output"></p>
<div id="contentinfo">
</div>
      <script>
$( "select" )
  .change(function () {
    var str = "";
    $( "select option:selected" ).each(function() {
      str = $( this ).text();
    });
    //$( "div" ).text( str );
    //var x= "<?php echo "lol"; ?> ";
  })
  .change();

</script>
<?php
function sc(){
  echo "lol";

}
?>
</body>
</html>