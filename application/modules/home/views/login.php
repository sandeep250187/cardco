<?php
include "include/header.php";
// session_start();
$d=date('Y/m/d');
if(isset($_POST['save']))
{

$email=$_POST['email'];
$password=$_POST['pswd'];

if(isset($_REQUEST['type']) and $_REQUEST['type']=='tour')
{

$select=mysql_query("select id,email,first_name,last_name and password from apmg_signup where email='$email' and password='$password'");
$fetch=mysql_fetch_array($select);
$num=mysql_num_rows($select);

if($num!='0')
{

$_SESSION['id']=$fetch['id'];
$_SESSION['fn']=$fetch['first_name'];
$_SESSION['ln']=$fetch['last_name'];
echo "<script>";
echo "alert('Login Successfull')";
echo "</script>";
echo "<script>window.location='tour_cart.php'</script>";
}
else
{
echo "<script>";
echo "alert('You Have Entered Wrong Email Or Password !!!')";
echo "</script>";
echo "<script>window.location='login.php'</script>";
}
}
$select=mysql_query("select id,email,first_name,last_name and password from apmg_signup where email='$email' and password='$password'");
$fetch=mysql_fetch_array($select);
$num=mysql_num_rows($select);
if($num!='0')
{
session_start();
$_SESSION['id']=$fetch['id'];
$_SESSION['fn']=$fetch['first_name'];
$_SESSION['ln']=$fetch['last_name'];
echo "<script>";
echo "alert('Login Successfull')";
echo "</script>";
echo "<script>window.location='cart.php'</script>";
}
else
{
echo "<script>";
echo "alert('You Have Entered Wrong Email Or Password !!!')";
echo "</script>";
echo "<script>window.location='login.php'</script>";
}
}
?>
<div class="row page-header">

    </div>
<div class="row content">
    <div class="col-sm-4  offset-sm-4">
        <div class="transfer-search text-white">
            <div class="text-center">
                <h2 class="headings text-white">Login</h2>
            </div>
            <div class="form-horizontal well-lg">
                <form name="register" id="register" method="post" action="#" novalidate="novalidate">
                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inputPassword">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                            <label id="emerer" class="error" style="display:none;">Email Already Exists..</label>
                        </div>
                        
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inputPassword">Password</label>
                            <input type="password" name="pswd" class="form-control" id="pswd" placeholder="password">
                        </div>
                        
                    </div>
                    <div class="form-group text-center">
                        <p>&nbsp;</p>
                        <div class="col-md-12">
                            <button type="submit" id="save" class="btn btn-primary btn-search" name="save">Login</button>
                            <h4>Not Registered Yet? <a href="register.php">create an account to manage all your bookings</a>
                            </h4>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<?php include "include/footer.php"; ?>