<!DOCTYPE html>
<html>
    <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: grey;
color: white;
}

body {
			
			 background-position: center;
			  
           background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
   position: relative;
}
b,h1,td{
  text-decoration: none;
  color:  #ffffff;
}
</style>
   </head>
     <body>
	 <table>
<tr>
<th>#</th>
              <th>Name</th>
              <th>Room Number</th>
              <th>Checkin</th>
              <th>Checkout</th>
              <th>Phone</th>
              <th># of People</th>
              <th>Email</th>
              <th>Action</th>
    
</tr>
        <title> Search </title>

    <form action="searchingdate.php" method="post">
<div class="container">
<div class="col-sm-3">
      <label for="planet"><b>Enter Name</b></label>
					<input class="form-control" id="date"  type="date" name="date" required>
     <br>

        <input type="submit" name="search" value="search">
</div>
</div>

      </form>

    </body>

</html>
<?php
 $conn = mysqli_connect("localhost", "root","","hotel_db");
// php code to search data in mysql database and set it in input text

if(isset($_POST['search']))
{
    // id to search
    $date = $_POST['date'];
    
    // connect to mysql
   
    
    // mysql search query
    $query = "SELECT 'Name','Room Number','Checkin','Checkout','Phone' FROM `reservations` WHERE Checkin='$date' ";  
                $result = mysqli_query($conn, $query);  
				if($result->num_rows > 0)
    {
                while($row = mysqli_fetch_array($result))  
                {  
                     echo '  
                          <tr>  
                               
                                    <td> <b> '. $row["Name"] .'</b></td><td><b>'. $row["Checkin"] .'</b></td><td><b>'. $row["Checkout"] .' </b></td><td><b>'. $row["Phone"] .' </b></td>
                           </tr>';
                            
                       
	}  }
	else { 
	echo "<b>No Details were added on this date</b>";
}

mysqli_close($conn);
}
?>