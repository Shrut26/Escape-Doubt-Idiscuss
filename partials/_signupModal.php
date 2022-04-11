<?php
include 'partials/_dbconnect.php';
echo '

<div class="modal fade" id="SignUp" tabindex="-1" aria-labelledby="SignUpLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="SignUpLabel">Sign Up to idiscuss</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/forum/partials/_handleSignup.php" method="post">
                        <div class="mb-3">
                          <label for="username" class="form-label">Email address</label>
                          <input type="text" class="form-control" id="signupusername" name="signupusername" aria-describedby="emailHelp">
                          <div id="emailHelp" class="form-text">We will never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                          <label for=password" class="form-label">Password</label>
                          <input type="password" class="form-control" id="signuppassword" name="signuppassword" id="password">
                        </div>
                        <div class="mb-3">
                          <label for="cpassword" class="form-label">Confirm Password</label>
                          <input type="password" class="form-control" id="signupcpassword" name="signupcpassword" id="cpassword">
                        </div>
                        <div class="mb-3 form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-success" style="width: 270px; text-align: center;">Sign UP</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>';

?>

