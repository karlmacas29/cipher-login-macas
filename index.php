<?php 
include "./data/config.php";

if(isset($_SESSION['id'])){
  header('Location: ./cipherWorld.php');
}

if(isset($_POST['userEnt'])){

    $user = $_POST['username'];
    $password = $_POST['password'];

    if(!$user && !$password){
      echo 'error';
    }else{

        $sql_query = "SELECT count(*) AS cntUser, id, username, password, status FROM users WHERE username='{$user}' ";
        $result = mysqli_query($db,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];
        $id = $row['id'];
        $name = $row['username'];
        $st = $row['status'];
        $pd = $row['password'];
        
        
        if("block" == $st){//check if this account is blocked.
            $alert = "This account Has been Block";
            $_SESSION['login_attempts'] = 0;
        }elseif(!$name && !$pd){
            $alert = "No Account Exist!";
            $_SESSION['login_attempts'] = 0;
        }elseif($user == $name && $password != $pd){//check if the password is correct when the account username found.
          
          if (!isset($_SESSION['login_attempts'])) {
              $_SESSION['login_attempts'] = 0;
          } else {
              $_SESSION['login_attempts']++;
          }

          if($_SESSION['login_attempts'] > 3){//reset session count
            $_SESSION['login_attempts'] = 0;
          }
          $alert = "Wrong Password. You Have {$_SESSION['login_attempts']}/3 Attempts";

          if($_SESSION['login_attempts'] == 3){
            $_SESSION['login_attempts'] = 0;
            $err_log = "UPDATE `users` SET `status` ='block' WHERE `username` = '{$name}' ";
            if ($db->query($err_log) === TRUE){
              $alert = "This Account Has been Blocked";
            }else{
              $alert = "ops database error";
            }
            
          }else{
            
          }

          
        }elseif($count > 0){//if all correct
          $_SESSION['login_attempts'] = 0;
          $_SESSION['id'] = $id;
          $_SESSION['name'] = $name;
          header('Location: cipherWorld.php');
        }
        else{
          $_SESSION['login_attempts'] = 0;
          echo "Try Again";
        }

    }
  }
  //echo "<br>".$_SESSION['login_attempts'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cipher Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  </head>
  <body>
    <div class="container position-relative py-4" style="height: 90vh;" id="darkbg">
    <div class="position-absolute top-50 start-50 translate-middle">
    <div class="card border-dark" style="max-width: 25rem;" id="card">
        <div class="card-header text-bg-primary d-flex justify-content-between">
          <div>Welcome to Cipher Web</div>
            <div class="form-check form-switch">
                <input class="form-check-input border-dark" type="checkbox" id="modeToggle">
                <label class="form-check-label" for="modeToggle"><i class="bi bi-moon-stars-fill"></i></label>
            </div>
        </div>
            <div class="card-body py-4">
            <h3 class="card-title text-center">Login</h3>
            <form class="row g-3" method="post" action="">
              <?php 
              if(empty($alert)){
              }else{
                echo'
                  <div class="alert alert-secondary" role="alert">
                  <i class="bi bi-exclamation-circle-fill"></i> '."$alert".'
                  </div>
                  ';
                }
              
              ?>
                <div class="form-floating px-1" id="inDiv">
                    <input type="text" class="form-control" id="uvalid" name="username" value="<?php echo @$user?>" placeholder="username" required>
                    <label for="uvalid" id="lb1">Username</label>
                    <div class="invalid-feedback" id="vld">
                      
                    </div>
                </div>
                <div class="form-floating px-1" id="inDiv1">
                    <input type="password" class="form-control " id="pvalid" name="password" placeholder="Password" required>
                    <label for="pvalid" id="lb2">Password</label>
                    <div class="invalid-feedback" id="vld1">
                      
                    </div>
                </div>
                <div class="d-grid col-12">
                    <button class="btn btn-secondary disabled" id="loginBtn" name="userEnt">Login</button>
                </div>
            </form>
            </div>
            <div class="card-footer text-center">
                <h5 class="card-title">Or</h5>
                <div class="d-grid col-12">
                <button class="btn btn-success" id="regPop">Register</button>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="modal fade" id="regPop1">
	        		<div class="modal-dialog modal-lg modal-dialog-centered">

	        			<div class="modal-content">
	        				<div class="row">

	        					<div class="col-4 bg-primary rounded-start" style="position:relative;">
	        						<i class="fa-solid fa-address-book text-white" id="icon-s"></i>
	        					</div>

	        					<div class="col-8 p-3 rounded-end" id="darkBg1">

	        						<h4 class="mb-2 text-center"><i class="fa-solid fa-user-plus"></i>Register</h4>

	        						<div class="modal-body">
	        							<div class="col">
                        <form class="row g-3" method="POST">
                        <div class="form-floating px-1" id="inDiv">
                            <input type="text" class="form-control" id="uvalid1" placeholder="username" required>
                            <label for="uvalid1" >Username</label>
                            <div class="invalid-feedback" id="vm">
                              
                            </div>
                        </div>

                        <div class="form-floating px-1" id="inDiv1">
                            <input type="password" class="form-control" id="pvalid1" placeholder="Password" required>
                            <label for="pvalid1">Password</label>
                            <div class="invalid-feedback" id="vm1">
                              
                            </div>
                        </div>

                        <div class="form-floating px-1" id="inDiv1">
                            <input type="password" class="form-control " id="pvalid2" placeholder="Password" required>
                            <label for="pvalid2" >Confirm Password</label>
                            <div class="invalid-feedback" id="vm2">
                              
                            </div>
                        </div>
                    </form>
                          <div class="modal-footer mt-2">
	        									<div class="d-grid gap-2 w-100">
	        										<button type="button"  id="register1" class="btn btn-secondary disabled"> Submit</button>
	        										<button data-bs-dismiss="modal" id="close1" class="btn btn-secondary text-white"> Cancel</button>
	        									</div>
	        								</div>	

	        							</div>
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        		</div>
	        	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./script/jquery.min.js"></script>
    
    <script type="text/javascript">
       $(document).ready(function(){
        //$("button").click(function(){})
        
        //login
        $("#uvalid").on("input", function(){
          var uPattern = /^[a-zA-Z]{6,}$/;
            if (uPattern.test($("#uvalid").val())) {
                    $("#uvalid").addClass("form-control is-valid");
                    $("#uvalid").removeClass("is-invalid");
                    $("#vld").text("Looks Good!").addClass("valid-feedback").removeClass("invalid-feedback");
                    if(!$("#pvalid").val()){
                      $("#loginBtn").addClass("btn btn-secondary disabled").removeClass("btn-primary");
                    }else{
                      $("#loginBtn").addClass("btn btn-primary").removeClass("btn-secondary disabled");
                    }
                    
                }else{
                    $("#uvalid").addClass("form-control is-invalid");
                    $("#uvalid").removeClass("is-valid");
                    $("#vld").text("Please enter username atleast 6 characters only.").addClass("invalid-feedback").removeClass("valid-feedback");
                    $("#loginBtn").addClass("btn btn-secondary disabled").removeClass("btn-primary");
                    
                }      
        })


        $("#pvalid").on("input", function(){
            var pass_pattern_char = /[a-zA-Z]/;
            var pass_pattern_spchar = /[!@#$%^&*]/;
            var pass_pattern_num = /[0-9]/;

            if ($("#pvalid").val().length < 8){
              $("#pvalid").addClass("form-control is-invalid");
                    $("#pvalid").removeClass("is-valid");
                    $("#vld1").text("Required 8 characters length.").addClass("invalid-feedback").removeClass("valid-feedback");
                    $("#loginBtn").addClass("btn btn-secondary disabled").removeClass("btn-primary");
                    
            }else if (!pass_pattern_char.test($("#pvalid").val()) || !pass_pattern_spchar.test($("#pvalid").val()) || !pass_pattern_num.test($("#pvalid").val()) ) {
                    $("#pvalid").addClass("form-control is-invalid");
                    $("#pvalid").removeClass("is-valid");
                    $("#vld1").text("Combine with special characters and numbers.").addClass("invalid-feedback").removeClass("valid-feedback");
                    $("#loginBtn").addClass("btn btn-secondary disabled").removeClass("btn-primary");
            }else{
                    $("#pvalid").addClass("form-control is-valid");
                    $("#pvalid").removeClass("is-invalid");
                    $("#vld1").text("Looks Good!").addClass("valid-feedback").removeClass("invalid-feedback");
                    if(!$("#uvalid").val()){
                      $("#loginBtn").addClass("btn btn-secondary disabled").removeClass("btn-primary");
                    }else{
                      $("#loginBtn").addClass("btn btn-primary").removeClass("btn-secondary disabled");
                    }
            }

            

        })


        //register
        $("#uvalid1").on("input", function(){
          var uPattern = /^[a-zA-Z]{6,}$/;
            if (uPattern.test($("#uvalid1").val())) {
                    $("#uvalid1").addClass("form-control is-valid");
                    $("#uvalid1").removeClass("is-invalid");
                    $("#vm").text("Looks Good!").addClass("valid-feedback").removeClass("invalid-feedback");
                    if(!$("#pvalid2").val() && !$("#pvalid1").val()){
                      $("#register1").addClass("btn btn-secondary disabled").removeClass("btn-success");
                    }else{
                      $("#register1").addClass("btn btn-success").removeClass("btn-secondary disabled");
                    }
                    
                }else{
                    $("#uvalid1").addClass("form-control is-invalid");
                    $("#uvalid1").removeClass("is-valid");
                    $("#vm").text("Please enter username atleast 6 characters only.").addClass("invalid-feedback").removeClass("valid-feedback");
                    $("#register1").addClass("btn btn-secondary disabled").removeClass("btn-success");
                }      
        })
        $("#pvalid1").on("input", function(){
            var pass_pattern_char = /[a-zA-Z]/;
            var pass_pattern_spchar = /[!@#$%^&*]/;
            var pass_pattern_num = /[0-9]/;

            if ($("#pvalid1").val().length < 8){
                    $("#pvalid1").addClass("form-control is-invalid");
                    $("#pvalid1").removeClass("is-valid");
                    $("#vm1").text("Required 8 characters length.").addClass("invalid-feedback").removeClass("valid-feedback");
                    $("#register1").addClass("btn btn-secondary disabled").removeClass("btn-success");
                    if($("#pvalid1").val() && $("#pvalid1").val() === $("#pvalid2").val()){
                      $("#pvalid2").addClass("form-control is-valid");
                      $("#pvalid2").removeClass("is-invalid");
                      $("#register1").addClass("btn btn-success").removeClass("btn-secondary disabled");
                      $("#vm2").text("Looks Good!").addClass("valid-feedback").removeClass("invalid-feedback");
                    }else{
                      $("#pvalid2").addClass("form-control is-invalid");
                      $("#pvalid2").removeClass("is-valid");
                      $("#register1").addClass("btn btn-secondary disabled").removeClass("btn-success");
                      $("#vm2").text("Password Does Not Match").addClass("invalid-feedback").removeClass("valid-feedback");
                    }
                    
            }else if (!pass_pattern_char.test($("#pvalid1").val()) || !pass_pattern_spchar.test($("#pvalid1").val()) || !pass_pattern_num.test($("#pvalid1").val()) ) {
                    $("#pvalid1").addClass("form-control is-invalid");
                    $("#pvalid1").removeClass("is-valid");
                    $("#vm1").text("Combine with special characters and numbers.").addClass("invalid-feedback").removeClass("valid-feedback");
                    $("#register1").addClass("btn btn-secondary disabled").removeClass("btn-success");
                    if($("#pvalid1").val() && $("#pvalid1").val() === $("#pvalid2").val()){
                      $("#pvalid2").addClass("form-control is-valid");
                      $("#pvalid2").removeClass("is-invalid");
                      $("#register1").addClass("btn btn-success").removeClass("btn-secondary disabled");
                      $("#vm2").text("Looks Good!").addClass("valid-feedback").removeClass("invalid-feedback");
                    }else{
                      $("#pvalid2").addClass("form-control is-invalid");
                      $("#pvalid2").removeClass("is-valid");
                      $("#register1").addClass("btn btn-secondary disabled").removeClass("btn-success");
                      $("#vm2").text("Password Does Not Match").addClass("invalid-feedback").removeClass("valid-feedback");
                    }
            }else{
                    $("#pvalid1").addClass("form-control is-valid");
                    $("#pvalid1").removeClass("is-invalid");
                    $("#vm1").text("Looks Good!").addClass("valid-feedback").removeClass("invalid-feedback");
                    if($("#pvalid1").val() && $("#pvalid1").val() === $("#pvalid2").val()){
                      $("#pvalid2").addClass("form-control is-valid");
                      $("#pvalid2").removeClass("is-invalid");
                      $("#register1").addClass("btn btn-success").removeClass("btn-secondary disabled");
                      $("#vm2").text("Looks Good!").addClass("valid-feedback").removeClass("invalid-feedback");
                    }else{
                      $("#pvalid2").addClass("form-control is-invalid");
                      $("#pvalid2").removeClass("is-valid");
                      $("#register1").addClass("btn btn-secondary disabled").removeClass("btn-success");
                      $("#vm2").text("Password Does Not Match").addClass("invalid-feedback").removeClass("valid-feedback");
                    }
                    
            }

            

        })

        $("#pvalid2").on("input", function(){
          if($("#pvalid1").val() === $("#pvalid2").val() && $("#pvalid1").val()){
            $("#pvalid2").addClass("form-control is-valid");
            $("#pvalid2").removeClass("is-invalid");
            $("#register1").addClass("btn btn-success").removeClass("btn-secondary disabled");
            $("#vm2").text("Looks Good!").addClass("valid-feedback").removeClass("invalid-feedback");
          }else{
            $("#pvalid2").addClass("form-control is-invalid");
            $("#pvalid2").removeClass("is-valid");
            $("#register1").addClass("btn btn-secondary disabled").removeClass("btn-success");
            $("#vm2").text("Password Does Not Match").addClass("invalid-feedback").removeClass("valid-feedback");
          }
        })

        

        

        $("#regPop").on("click", function(){
          $("#regPop1").modal("show");
        })
        //submit button
        $("#register1").click(function(){

          var uname = $("#uvalid1").val();
          var pword = $("#pvalid1").val();
        

          $.ajax({
          type: "POST",
          data: {user_nm : uname, user_pd : pword},
          dataType: "JSON",
          url: "./data/reg.php",
          success: function (res) {
            if (res['val'] == true) {
              var text = res['msg'];
              Swal.fire({
                icon:'success',
                title: text
                
              })
              $("#regPop1").modal("hide");
            } else {
              var text = res['msg'];
              Swal.fire({
                icon:'error',
                title: text
              })
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            // Log the error details for debugging
            console.log("Ajax error:", textStatus, errorThrown);

            // Identify the error type and provide user-friendly messages
            if (textStatus === "timeout") {
              Swal.fire({
                icon:'error',
                title: textStatus
              })
            } else if (textStatus === "error") {
              Swal.fire({
                icon:'error',
                title: textStatus
              })
            } else if (textStatus === "parsererror") {
              Swal.fire({
                icon:'error',
                title: errorThrown
              })
            } else {
              Swal.fire({
                icon:'error',
                title: 'Unknown Error'
              })
            }
          }
        });

        })
        }); 
    </script>
    <?php include "./script/jquery.php" ?>
  </body>
</html>