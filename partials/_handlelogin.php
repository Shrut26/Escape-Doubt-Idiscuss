<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $login = false;
    $showAlert = false;
    $showError = false;
    include '_dbconnect.php';
    $loginusername = $_POST['loginusername'];
    $loginpassword = $_POST['loginpassword'];
    $loginhash = password_hash($loginpassword , PASSWORD_DEFAULT);
    
    
    $sql = "Select * from users where username='$loginusername'";
    $result  = mysqli_query($conn, $sql);
    $rowcout = mysqli_num_rows($result);

    if($rowcout==1)
    {
            $row = mysqli_fetch_assoc($result);
            if(password_verify($loginpassword , $row['password']))
            {
                session_start();
                $login = true;
                $showAlert = true;
                $_SESSION['loggedin'] =  true;
                $_SESSION['username'] = $loginusername;
                if($login)
                {
                    header("Location: /forum/index.php?login=true");
                }
            } 

            else{
                $login = false;
                header("Location: /forum/index.php?login=false");
                $showError = "Invalid Crediatils";
            }
        
    }

    else{
        header("Location: /forum/index.php?login=false");   
    }

    
    
}

else{
    $login = false;
}



?>