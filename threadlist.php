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
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id=$id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
       $catname = $row['category_name'];
       $catdesc = $row['category_description'];
    }
    ?>
    <?php

       if($_SERVER['REQUEST_METHOD']=='POST'){
         $th_title = $_POST["title"];
         $th_desc = $_POST["description"];
         //$id = $_GET['catid'];
         $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`) VALUES ('$th_title', '$th_desc', '$id', '1') ";

         $result = mysqli_query($conn , $sql);

         if(!$result)
         {
            echo 'error occured';
         }
        
    
}

?>
    <div class="container my-4">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Welcome to <?php echo $catname; ?> Forum </h1>
            <p class="col-md-8 fs-4"><?php echo $catdesc; ?></p>
            <hr>
            <p style="font-size:1.2rem">This is peer to peer forum for sharing knowledge, follow certain rules before going forward</p>
            <ul style="font-size:1.1rem">
                <li>No Spam / Advertising / Self-promote in the forums.</li>
                <li>Do not post copyright-infringing material. </li>
                <li>Do not post “offensive” posts, links or images.</li>
                <li>Do not cross post questions.</li>
                <li>Remain respectful of other members at all times.</li>
            </ul>
            <button class="btn btn-success btn-lg" type="button">Example button</button>
        </div>
    </div>

    <div class="container">
        <h1 class="my-5 text-center">Browse Question</h1>
        <div class="d-flex my-5">
        <?php 
         $id = $_GET['catid'];
         $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
         $result = mysqli_query($conn, $sql);
         $noresult = true;
         while($row = mysqli_fetch_assoc($result)){
              $noresult= false;
              $title = $row['thread_title'];
              $desc = $row['thread_desc'];
              $id = $row['thread_id'];
            echo '
            
            <div class="flex-shrink-0">
                <img src="user.png" alt="..." width="34px">
            </div>
            <div class="flex-grow-1 ms-3">
                <h5><a href="thread.php?threadid='.$id.'"> '.$title.' </a></h5>
                '.$desc.'
            </div> <br>';
            
         } 
         
         if($noresult){
            echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">No Threads Found</p>
                        <p class="lead"> <b>Be the first person to ask a question</b></p>
                    </div>
                 </div> ';
         }
       ?>  
        </div>
        

        <?php 
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
        {
            echo '
        <form action="' .$_SERVER["PHP_SELF"]. '" method="post">
        <h3 class="text-center">Post your query</h3>
            <div class="mb-3">
              <label for="title" class="form-label">Thread Title</label>
              <input type="text" class="form-control" id="title"  name="title" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">Keep your Title as short and crisp as possible</div>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Elaborate your concern</label>
              <div class="mb-3">
                <label for="description" class="form-label"></label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
              </div>
            </div>
            
            <button type="submit text-center" class="btn btn-primary">Post</button>
        </form> ';
        }
        else{
            echo '<div class="container text-center my-4"><button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Top popover">
            Kindly Login to post your query
          </button></div>';
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>