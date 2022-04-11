<?php 
session_start();
include 'partials/_signupModal.php';
include 'partials/_loginModal.php';
echo '

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/forum">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/forum">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/forum/about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="/forum/categories.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        
      </ul>
      ';

      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
      {
        echo'
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
        
      </form>
      <div class="mx-2">
      <b style="color:white"> Welcome '.$_SESSION['username'].'</b>
      <a href="partials/_logout.php" class="btn btn-outline-success mx-2 my-2"  data-bs-target="#Logout">Logout</a>
      
      </div> ';
      }
      else
      {echo'
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
        
      </form>
      <div class="mx-2">
      <button type="button" class="btn btn-outline-success mx-2 my-2" data-bs-toggle="modal" data-bs-target="#Login">Login</button>
      <button type="button" class="btn btn-outline-success mx-2 my-2" data-bs-toggle="modal" data-bs-target="#SignUp">Sign Up</button>    
      </div> ';}
   echo '
    </div>
  </div>
</nav>';

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true")
{
  echo '
  
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  </svg>
  <div class="alert alert-success d-flex align-items-center alert-dismissible fade show text-center" role="alert" style="font-size:1.2rem">
       <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/>
       </svg>
      <div>
        Your account has been created <b>Successfully </b>, Login to post your queries.
      </div>
  </div>';
}
if(isset($_GET['login']) && $_GET['login']=="true")
{
  echo '
  
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  </svg>
  <div class="alert alert-success d-flex align-items-center alert-dismissible fade show text-center" role="alert" style="font-size:1.2rem">
       <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/>
       </svg>
      <div>
        Your have <b>Successfully</b> logged in your account.
      </div>
  </div>';
}

if(isset($_GET['login']) && $_GET['login']=="false")
{
  echo '
  
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="exclamation-triangle-fill"" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
  </svg>
  <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show text-center" role="alert" style="font-size:1.2rem">
       <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/>
       </svg>
      <div>
        Error Occured Retry!
      </div>
  </div>';
  
}

?>