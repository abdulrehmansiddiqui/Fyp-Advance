<?php
    require_once "config.php";

	if (isset($_SESSION['access_token'])) {
		header('Location: index.php');
		exit();
	}
	$loginURL = $gClient->createAuthUrl();
?>

<!DOCTYPE html>
<html>
	<head>
    <!-- Bootstrap CSS -->
    <!-- Other CSS -->
    <link href="../css/login/form.css" rel="stylesheet" />
    <link href="../css/login/style.css" rel="stylesheet" />
	
	<title>Login user</title>
	</head>

<body style="background-image: url('../img/bg.png'); padding-top:10%;">
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="" method="post">
                <h1>Create Account</h1>

                <span>or use your email for registration</span>
                <input type="text"     placeholder="Full Name"     name="u_name"   required />
                <input type="email"    placeholder="Email"         name="u_email"  required />
                <input type="password" placeholder="Password"      name="u_pass"   required />
                <input type="number"   placeholder="Mobile Number" name="u_mobile" required />
				<select name="u_gender">
                    <option>Male</option>
                    <option>Female</option>
                </select>
                <button name="sign_up">Sign Up</button>
                <input type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Log In With Google" style="background: #DB4437; color:#FFF;">
                
            </form>
			<?php include("../user_insert.php");?>
        </div>
        <div class="form-container sign-in-container">
			<form method="post" action="" id="form1" class="contact2-form validate-form">
                <h1>Sign in</h1>

                <span>or use your account</span>
                <input type="email" placeholder="Email" name="email" autofocus required />
                <input type="password" placeholder="Password" name="pass" required />
                <a href="">Forgot your password?</a>
                <button name="login">Sign In</button>
            </form>
                <?php
                include("../includes/connection.php");
                if(isset($_POST['login'])){
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $pass = mysqli_real_escape_string($con,$_POST['pass']);

                $get_user = "select * from users where user_email='$email' AND user_pass=MD5('$pass') AND status='verified'";
                $run_user = mysqli_query($con,$get_user);
                $check = mysqli_num_rows($run_user);

                if($check==1){
                $_SESSION['user_email']=$email;
				$update = "update users set last_login=NOW() where user_email='$email'";
				$run = mysqli_query($con,$update);
                echo "
                <script>window.open('../index.php', '_self')</script>";
                }
                else{
                echo "
                <script> alert('Sorry Enter the Wrong  ID PASS') </script>";
                }
                }
                ?>
                </div>
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-left">
                            <h1>Welcome Back!</h1>
                            <p>To keep connected with us please login with your personal info</p>
                            <button class="ghost" id="signIn">Sign In</button>
                        </div>
                        <div class="overlay-panel overlay-right">
                            <h1>Hello, Friend!</h1>
                            <p>Enter your personal details and start journey with us</p>
                            <button class="ghost" id="signUp">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        
            <script>
                const signUpButton = document.getElementById('signUp');
                const signInButton = document.getElementById('signIn');
                const container = document.getElementById('container');
        
                signUpButton.addEventListener('click', () => {
                    container.classList.add("right-panel-active");
                });
        
                signInButton.addEventListener('click', () => {
                    container.classList.remove("right-panel-active");
                });
            </script>
        </body>
        </html>
        
        
        