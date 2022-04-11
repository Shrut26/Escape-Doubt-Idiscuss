<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';
    $signupusername = $_POST['signupusername'];
    $signuppassword = $_POST['signuppassword'];
    $signupcpassword = $_POST['signupcpassword'];
    $hash = password_hash($signuppassword , PASSWORD_DEFAULT);

    // INSERT INTO `users` (`S.no`, `username`, `password`, `tstamp`) VALUES (NULL, 'shrutayu', 'shrut2003', current_timestamp());
    $Existsql = "SELECT * FROM `users` WHERE username='$signupusername'";
    $result = mysqli_query($conn , $Existsql);
    $rowcount = mysqli_num_rows($result);

    if($rowcount > 0)
    {
       echo 'Username already exists';
    }
    else{
        if($signuppassword==$signupcpassword){
            $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$signupusername', '$hash')";
            $result = mysqli_query($conn , $sql);
            if(!$result)
            {
                header("Location: /forum/index.php?signupsuccess=false");
            }
            else{
               header("Location: /forum/index.php?signupsuccess=true");
               exit();
            }
           
        }

        else{
            header("Location: /forum/index.php?signupsuccess=false");
        }
    }


}



?>