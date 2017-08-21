<html> 

<head> 
  //<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>MUHAIMIMINUR RAHMAN</title> 
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
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

 <div id = "container" > 
 
<div id="records"></div>s

</div> 

<!-- <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script> -->
<script src="jquery-3.1.1.min.js"></script>

<?php
        $tid=array();
        $i=1;
        $c=1;
        ?>





<form method="POST">
      <select id="my" name="my">

        <!-- <input type="text" name="id" id="id" value="">    -->

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
      <select id="my2" name="my2" class="target">
        <?php
        $result2 = mysqli_query($con,"SELECT * FROM examname");
        while($row2 = mysqli_fetch_array($result2))
        {
          echo "<option value='" . $row2['id'] . "'>" . $row2['description'] . "</option>";
          $abir2=$row2['id'];
        }
        
        ?>
      </select>

<!-- <div id="divid" style="visibility: hidden;">
  <table id="tbl" border="10">
      <thead>
      <tr>
      <td>LIST</td>
      <td>SUBJECT</td>
      <td>INPUT</td>
      </tr>
      </thead>
</div> -->

<table id="myTable">
  <thead>
  <tr>
    <th>SUBJECT ID</th>
    <th>SUBJECT</th>
    <th>SUBJECT RESULT</th>
  </tr>
 </thead>
 <tbody>
 </tbody>
</table>
<input type="submit" name="go" method="post">
</form>


      <?php
      $how_hear = count($_POST['res2']) ? $_POST['res2'] : array();
      $sid = $_POST['my'];
      $abir = $_POST['my2'];
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


            //echo "result = "+$check;
            //echo "ID = "+$how_hear[$lol];
            
            addFunction($how_hear[$lol],$check,$sid,$conn); //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
            $lol++;
            }
        }
        }
      ?>
      <h1>This is a Heading :: <?php echo "STUDENT ID = "+$sid+" EXAM ID = "+$abir; ?> </h1>
      <?php
      mysqli_close($con);
      function addFunction($num1,$c,$sid,$conn) {
        //echo "value = ".$num1."ID = ".$tid[$c];
        $sql = "INSERT INTO result (transcript_id, result, studentinfo_id)
          VALUES ('{$num1}', '{$c}', '{$sid}')";
          // use exec() because no results are returned
          $conn->exec($sql);
          echo "New record created successfully";
      }

     /* $arrlength=count($tid);
      for($y=1;$y<$arrlength+1;$y++){
          echo $tid[$y];
            echo "<br>";

      }*/
      ?>


      <script>var jsid=new Array();
$(document).ready(function() {

  $( "#my2" ).on('change',function() {

      $.ajax({ method: "POST", url: "inputtable.php",data : {foo: $('#my2').val()} ,})
    
        .done(function( data ) { 
          // console.log(data);
          var result = $.parseJSON(data); 
          // 
          var table = document.getElementById("myTable");
          console.log("paisi"+$('#my2').val());
          var rowCount = myTable.rows.length; while(--rowCount) myTable.deleteRow(rowCount); 
          /*var elmtTable = document.getElementById('myTable');
          var tableRows = elmtTable.getElementsByTagName('tr');
          var rowCount = tableRows.length;

          for (var x=rowCount-1; x>0; x--) {
          elmtTable.removeChild(tableRows[x]);
          }*/
          /*$("#myTable tbody tr").remove();
          var element = document.getElementById("myTable");
          element.innerHTML = "<tr>
          <th>SUBJECT ID</th>
          <th>SUBJECT</th>
          <th>SUBJECT RESULT</th>
          </tr>";*/
          /*document.getElementById("#myTable").innerHTML =
           "<tr>
          <th>SUBJECT ID</th>
          <th>SUBJECT</th>
          <th>SUBJECT RESULT</th>
          </tr>";*/
          //var row = table.insertRow(1);
          // $("#id").val(result[0].id);

          for (x in result) {
            console.log(result[x].xam +"=="+result[x].id);
            var row = table.insertRow(1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            // cell1.innerHTML = result[x].id;
            cell1.innerHTML = '<input type="text" name="res2[]" value="'+result[x].id+'" readonly>';
            //jsid[jsid.length]=result[x].id;
            cell2.innerHTML = result[x].xam;
            cell3.innerHTML = '<input type="text" name="res[]">';

          }
          //var table = document.getElementById("myTable");
          //var row = table.insertRow(1);
          /*var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          cell1.innerHTML = "NEW CELL1";
          cell2.innerHTML = "NEW CELL2"; */         
        //   var string = '<table> 
        //        <tr>
        //         <th>#</th> 
        //         <th>Name</th> 
        //         <th>Email</th>
        //        <tr>';
 
        // from result create a string of data and append to the div 
        // $.each( result, function( key, value ) { 
        //      string += "<tr> 
        //      <td>"+value['tran.id'] + "</td> 
        //             <td> "+ value['xam']+"</td> </tr>"; }); 
        //      string += '</table>'; 
        //   $("#records").html(string);
        //console.log( JSON.stringify(jsid) ); 
       });       
  });


    // $(function(){ $("#getusers").on('click', function(){ 
    // $("#getusers").click(function() {  
    //   console.log("try");
    //   $.ajax({ method: "POST", url: "inputtable.php", })
    
    //     .done(function( data ) { 
    //       var result = $.parseJSON(data); 

    //       var string = '<table> 
    //            <tr>
    //             <th>#</th> 
    //             <th>Name</th> 
    //             <th>Email</th>
    //            <tr>';
 
    //    /* from result create a string of data and append to the div */
      
    //     $.each( result, function( key, value ) { 
    //          string += "<tr> 
    //          <td>"+value['tran.id'] + "</td> 
    //                 <td> "+ value['xam']+"</td> </tr>"; }); 
    //          string += '</table>'; 
    //       $("#records").html(string); 
    //    }); 
    // });

}); 

</script>

</body>

</html>