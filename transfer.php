<?php 
session_start();
        
include 'connection.php';
		
if(!isset($_SESSION['id'])) 
    header('location:index.html');   
?>

	
<!DOCTYPE html>
<html>
<div class="navigateprofileb">
	<form action="profile.php" method="POST">
           <button type="submit"  class="navigateprofileb">Profile</button>  
</form>
          	 </div>				 

    <head>
        <meta charset="UTF-8">
        <title>Transfer Funds</title>
        
        <link rel="stylesheet" href="newcss.css">
    </head>


        <h3 style="text-align:center;color:#2E4372;"><u>Transfer Funds</u></h3>

<div class="wrapper">		
<img src="header.jpg";  height="100%" width="100%"/>
<div class="navbar">
                
            <ul>
            <li><a href="index.php">Home </a></li>
            <li><a href="features.php">Features </a></li>
            <li id="last"><a href="contact.php">Contact Us</a></li>
            </ul>
            </div>
<div class="user_login">

<form action="transferring.php" method="POST">
  <table align="left">
            <tr><td><span class="caption">Transfer</span></td></tr>
            <tr><td colspan="2"><hr></td></tr>
            <tr><td>Receiver Mobile No.</td>
                 <td><input type="text" name="receivermobile"></td></tr>
            <tr><td>Amount</td>
                <td><input type="text" name="amount"></td></tr>
            <tr><td>Purpose</td>       
			    <td><input type="text" name="purpose"></td></tr>
                 <td class="button1"><input type="submit" name="Signup" class="button"></td></tr>
        </table> 
 
</form>
    
		
		
</html>
