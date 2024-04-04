<?php

$password= $_POST["Password"];
//$password = "rohit123"

// Create connection
$conn = mysqli_connect("localhost", "rohit", "cciitk", "logininfo");
$sql = "select * from login where Username= '$username' and Password = '$password"";

$result = mysqli_query($conn, $sql); 
$final_result = mysqli_num_rows($result);
if($final_result==1)

{
    system("/var/www/html/packets/packets.sh");

    header("Location: packets.html");
}
else
{
echo "Try Again";
}

?>
