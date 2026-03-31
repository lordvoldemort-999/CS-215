<?php
    session_start();
    require_once("db.php"); 

    $generalError = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = trim($_POST["usname"] ?? "");
        $password = trim($_POST["pswd"] ?? "");

        if ($username == "" || $password == "") {
            $generalError = "Please fill in all fields.";
        }
        else {
            try {
                $pdo = new PDO($attr, $db_user, $db_pass, $options);

                // NOTE: using email as username (since signup uses email)
                $query = "SELECT * FROM Users WHERE email = :email";
                $stmt = $pdo->prepare($query);
                $stmt->execute(["email" => $username]);

                $user = $stmt->fetch();

                if ($user && password_verify($password, $user["password"])) {

                    // STORE SESSION DATA
                    $_SESSION["user_id"] = $user["User_ID"];
                    $_SESSION["email"] = $user["email"];
                    $_SESSION["nickname"] = $user["nickName"];

                    // Redirect to dashboard
                    header("Location: dashboard.php");
                    exit();
                } else {
                    $generalError = "Invalid email or password";
                }
            }
            catch (PDOException $e) {
                $generalError = "Internal Error: " . $e->getMessage();
            }
        }
    }
?>

<!DOCTYPE html>
<html>

 <head>
    <title> Gaming Hub </title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
 </head>

    <body>
        <div id="container">
           <header id="header-top">
             <h2> BRAWL GAMES </h2>
           </header>

            <main id ="main">

                <div class="note1">
                   <h2> Login </h2>
                </div>

                <?php
                    if ($generalError != "") {
                        echo "<p>" . $generalError . "</p>";
                    }
                ?>

                <form class="cert-form" action="login.php" method="post">
              
                    <div class ="form-input">
                      <label for="usname">Username:</label>
                      <input type="text" id="usname" name="usname"
                             value="<?php echo htmlspecialchars($_POST['usname'] ?? ''); ?>" />

                      <label for="pswd">Password:</label>
                      <input type="password" id="pswd" name="pswd"/>
                    </div>

                    <p><a class="note2" href="forget.html">Forget Password?</a></p>

                    <div class="to-center">
                       <input type="submit" value="Login" />
                   </div>
                </form>

                <div class="form-feed">
                     <p>Don't have an account?  <a href="signup.php">SignUp</a></p>
                </div>
            
            </main>

            <footer id="footer-cert">
               <p class="footer-text">About. All Rights Reserved 2026 &copy;</p>
            </footer>
        </div>
    </body>

</html>