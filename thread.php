<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>iDiscuss</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php' ?>
    <?php include 'partials/_header.php' ?>
    

    <?php 
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
         $title = $row['thread_title'];
         $desc = $row['thread_desc'];
     }
    
    
    ?>
    <div class="container my-4">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">
                <?php echo $title ?>
            </h1>
            <p class="col-md-8 fs-4">
                <?php echo $desc; ?>
            </p>
            <hr>
            <p style="font-size:1.2rem">This is peer to peer forum for sharing knowledge, follow certain rules before
                going forward</p>

            <p><b>Posted by : Shrut</b></p>
        </div>
    </div>

    <div class="container">
        
        <!-- <div class="d-flex my-5">
            
        </div> -->
        <h2>Post your Comments here</h2>
        <?php 
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
        {
            echo '
        <form action="' .$_SERVER['PHP_SELF']. '" method="post">
            <div class="mb-3">
                
                <label for="comment" class="form-label">Post your View</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post comment</button>
        </form> ';
        }
        else{
            echo '<div class="container text-center my-4"><button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Top popover">
            Kindly Login to post your query
          </button></div>';
        }
        ?>
        <br>
        <h1 class="my-5 text-center">Discussions</h1>
        <?php 
          if($_SERVER['REQUEST_METHOD']=='POST'){
            $comment = $_POST["comment"];
            $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`) VALUES ('$comment', '$id')";
            $result = mysqli_query($conn , $sql);

            if(!$result){
            echo 'comment failed to get inserted';
            }
         }
        ?>
        <?php 
         $id = $_GET['threadid'];
         $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
         $result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_assoc($result)){
              $content = $row['comment_content'];
              $id = $row['comment_id'];
              $comment_time = $row['comment_time'];
             // $desc = $row['thread_desc'];
              //$id = $row['thread_cat_id'];
            echo '
        
            <div class="flex-shrink-0">
                <img src="user.png" alt="..." width="34px">
               <b>  anonymous user at: '.$comment_time.' <br> </b>
                &nbsp; &nbsp;&nbsp;'.$content.'
            </div>
            <div class="flex-grow-1 ms-3">
                
               
            </div><hr>';
         } 
       ?>
            <!

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>