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
    <?php include 'partials/_signupModal.php'; ?>
    <?php include 'partials/_loginModal.php' ?>
    

    <!-- Slider start -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="max-height: 600px;">
        <div class="carousel-inner" style="max-height: 600px;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="caro1.jpg" class="d-block w-100" alt="..." style="max-height: 600px;">
                </div>
                <div class="carousel-item">
                    <img src="caro2.jpg" class="d-block w-100" alt="..." style="max-height: 600px;">
                </div>
                <div class="carousel-item">
                    <img src="caro3.jpg" class="d-block w-100" alt="..." style="max-height: 600px;">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <!-- Categories Start from here -->
    <div class="container my-3 text-center">
        <h2 class="my-5">iDiscuss - Browse Categories</h2>
        <div class="row">
            <!-- Fetch all the categories -->
            <?php 
              
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
            $id = $row['category_id'];
            $cat = $row['category_name'];
            echo '<div class="col-md-4">
            <div class="card my-3" style="width: 18rem;">
                <img src="'.$cat.'.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><a href="/forum/threadlist.php?catid='.$id.' ">'.$cat.' </a></h5>
                    <p class="card-text">Browse here '.$cat.' realted queries</p>
                    <a href="/forum/threadlist.php?catid='.$id.' " class="btn btn-primary">View Threads</a>
                </div>
            </div>
        </div>';
            }
            
            
            ?>
            
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>