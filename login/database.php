<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "wedding";
$con = mysqli_connect($servername,$username,$password,$db);
if($con){
    echo "connected successfully";
   
} else{
    die("connection failed" . mysqli_connect_error());
}

if(isset($_POST['reg'])){
    $guardianName =$_POST['guardianName'];
    $relationGroomBride =$_POST['relationGroomBride'];
    $guardianPhone =$_POST['guardianPhone'];
    $looking =$_POST['lookin'];
    $groomBrideName =$_POST['groomBrideName'];
    $gender=$_POST['gender'];
    $caste=$_POST['caste'];
    $sect=$_POST['sect'];
    $country=$_POST['country'];
    $city=$_POST['city'];
    $height=$_POST['height'];
    $education=$_POST['education'];
    $Description=$_POST['Description'];
    $paymentMethod=$_POST['paymentMethod'];
    









    $send = "INSERT INTO  registeration (guardianName, relationGroomBride, guardianPhone, lookin, groomBrideName, gender,caste,sect,country,city,height,education,Description ,paymentMethod) VALUES ('$username', '$eduction', '$experience', '$email', '$password', '$cpassword')";
     
    $run= $con->query($send);
    if($run){
        echo "Data inserted successfully";
    }else{
        echo "there is some error";
    };

}
?>