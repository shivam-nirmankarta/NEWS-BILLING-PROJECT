<?php 
session_start();
include "conn.php";
if(empty($_SESSION["employeeid"]))
{
	header("location:main.php");
}
else
	
{
	?>
	
<?php
if($_SESSION["admin"]==(1 or 2))
{

include 'headeradmin.php';
}
else{
	include 'header.php';
}



?>

<body >
 <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">ADMIN</h1>
                    </div>
                </div>
    <div><a href="newadmin.php" class="btn btn-info" > Add ADMIN</a>
	</div>
<?php

include "conn.php";

echo '<br><table class="table table-striped table-bordered table-hover" style="text-align:center">
		<tr> 
		<td> Employee-ID</td>
		<td>name</td>
	
		<td>phone</td>
		<td>email</td>
		
		<td>centerid</td>
		<td>Uder ID</td>
		<td>Password</td>
		<td>edit</td>
		<td>remove</td>
		</tr>';
if($_SESSION['admin']==1)
 {
	 $sql="select * from admin where centerid='$centerid' and userid!='' order by id2 desc";
 }
 if($_SESSION["admin"]==2)
 {
	  $sql="select * from admin ";
 }
 $res=mysql_query($sql);
 $count=mysql_num_rows($res);
 while($row=mysql_fetch_assoc($res))
 { if (empty($row["userid"]))
						{
							$color='#FFCCD3';
						}
						else
						{
							$color='#E4FBC3';
						}
	 echo'<tr style="background-color:'.$color.'" >
						<td>'.$row["employeeid"].'</td>
						<td>'.$row["name"].'</td>
						<td>'.$row["phone"].'</td>
						<td>'.$row["email"].'</td>
						
						<td>'.$row["centerid"].'</td>
						<td>'.$row["userid"].'</td>
						<td>'.$row["password"].'</td>
						
						
						
						<td><a href="adminupdate.php?id2='.$row["id2"].'">EDIT</a></td>
			  <td><a href="adminremove.php?id2='.$row["id2"].'">Remove</a></td><tr>';
			 
 }
 
  echo '</table></div>';
 

include 'footer.php';
}

?> 
