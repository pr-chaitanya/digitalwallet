<?php 
session_start();
        
include 'connection.php';
		
if(!isset($_SESSION['id'])) 
    header('location:index.php');   

	?>
	
<!DOCTYPE html>
<html>
      
    <head>
        <meta charset="UTF-8">
        <title>Profile</title>
        
        <link rel="stylesheet" href="newcss.css">
        <style>
            .content_customer table,th,td {
    padding:6px;
    border: 1px solid #2E4372;
   border-collapse: collapse;
   text-align: center;
}

        </style>
    </head>
<style>	
.name{
    padding: 5px;
    background-color: #4CAF50;

    width: 200px;
    color: #000000;
}
.balance{

     position:absolute;
    top:10px;
    left:600px; 
    background: #F00;
    border:1;
    font-weight: bold;
}
.lastlog{
     position:absolute;
    top:10px;
    left:900px; 

    background: linear-gradient(to bottom, rgba(187,250,189,1) 0%,rgba(89,253,117,1) 98%,rgba(89,253,117,1) 100%); /* W3C */    font-size:18px;
    color:#F00;
    border:1;
    font-weight: bold;
.blue{
     position:absolute;
	top:100px;
    left:900px; 
		
	}

  }

</html>
</style>


<?php 
$user=$_SESSION["id"];
$sql="select * from persons where mobileno='$user'";
$result=  mysqli_query($conn,$sql); 	
$rws=  mysqli_fetch_assoc($result);


echo "<div class=\"name\">"."Hi..".$rws["firstname"]." ".$rws["lastname"]."</div>"; 
echo "<div class=\"name\">".$rws["mobileno"]."</div>"; 
echo "<div class=\"balance\">"."Balance is Rs.".$rws["Balance"]."</div>"; 
echo "<div class=\"lastlog\">"."Last login"."\n".$rws["lastlogin"]."</div>"; 
$date=date('Y-m-d h:i:s');

$sqln="SELECT COUNT(id) as cid FROM transactions t,persons p where p.mobileno=$user and t.Receiver=$user and t.time>p.lastlogin";
$resultn=  mysqli_query($conn,$sqln); 
$rwsn=  mysqli_fetch_assoc($resultn);
	
$sqlt="SELECT COUNT(id) as cidt FROM request r,persons p where p.mobileno=$user and r.Receiver=$user and r.time>p.lastlogin";
$resultt=  mysqli_query($conn,$sqlt); 
$rwst=  mysqli_fetch_assoc($resultt);
/*
echo $rwsn["cid"]+$rwst["cidt"];
echo '<script>alert("Transfer Successful");';
echo 'window.location= "profile.php";</script>';

	$sqlnt="UPDATE persons SET notificationtime='$date' WHERE mobileno=$user";
mysqli_query($conn,$sqlnt);
*/	
	?>
	
	
<!DOCTYPE html>
<html>

<div class="wrapper">
<div class="leftcolor">
<IMG STYLE="position:absolute; TOP:80px; LEFT:20px; WIDTH:370px; HEIGHT:635px" SRC="blue.jpg" alt="Bing">
            </div>
<div class="rightcolor">
<IMG STYLE="position:absolute; TOP:80px; LEFT:20px;  WIDTH:370px; HEIGHT:635px" SRC="blue.jpg" alt="Bing">
            </div>

			<img src="header.jpg";  height="100%" width="100%"/>
<div class="navbar">
                
            <ul>
            <li><a href="index.php">Home </a></li>
            <li><a href="features.php">Features </a></li>
            <li id="last"><a href="contact.php">Contact Us</a></li>
            </ul>
            </div>
<div class="profiletransferb">
	<form action="Transfer.php" method="POST">
           <button type="submit"  class="profiletransferb">Transfer</button>  
</form>
          	 </div>				 
             
<div class="profilenotificationsb">
	<form action="notifications.php" method="POST">
           <button type="submit"  class="profilenotificationsb">Notifications</button>  
</form>
          	 </div>				 
           


<?php    include 'connection.php';
$user=$_SESSION["id"];
$sql="SELECT * FROM transactions where Receiver=$user UNION SELECT * FROM request where Receiver=$user order by time DESC LIMIT 5";
$result=   mysqli_query($conn,$sql)  or die(mysql_error()); ?>

    <br><br><br>
    <h3 style="text-align:center;color:#2E4372;"><u>Last 5 Notifications</u></h3>
    <table align="center">
                        
                        <th></th>
                        <th>Date</th>
                        <th>Description</th>
                        
                        <?php
                        while($rws=  mysqli_fetch_assoc($result)){
                            
                            echo "<tr>";
							echo "<td>"."</td>";
                            echo "<td>".$rws["time"]."</td>";
							     $other=$rws["Sender"];
							     $sql1="SELECT * FROM persons where mobileno=$other";
								$result1=   mysqli_query($conn,$sql1)  or die(mysql_error()); 
								$rws1=  mysqli_fetch_assoc($result1);
                            if($rws["notificationtype"]=="t") {echo "<td>".$rws1["firstname"]." ".$rws1["lastname"]."  Credited you"." Rs.".$rws["amount"]."</td>"; }
                            else  {echo "<td>".$rws1["firstname"]." ".$rws1["lastname"]." Requested you"." Rs.".$rws["amount"]."</td>"; }                       
                            echo "</tr>";
                        } ?>
</table>
  
			 
<div class="profilerequestb">
	<form action="requestmoney.php" method="POST">
           <button type="submit"  class="profilerequestb">Request Money</button>  
</form>
          	 </div>				 
			 
<div class="profileminib">
	<form action="ministatement.php" method="POST">
           <button type="submit"  class="profileminib">Mini-Statement</button>  
</form>
          	 </div>				 

<div class="profilelogoutb">
	<form action="logout.php" method="POST">
           <button type="submit"  class="profilelogoutb">Log_out</button>  
</form>
          	 </div>				 
			 

<div class="addmoney">
	<form action="addmoney.php" method="POST">
           <button type="submit"  class="addmoney">Add money</button>  
</form>
          	 </div>				 
		


	
</html>
	


