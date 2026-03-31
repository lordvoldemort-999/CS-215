<?php
    session_start();
    require_once("db.php");

    $generalError = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $email = trim($_POST["mymail"] ?? "");
        $nickname = trim($_POST["cname"] ?? "");
        $password = trim($_POST["pswd"] ?? "");
        $confirmPassword = trim($_POST["cpswd"] ?? "");
        $avatar = trim($_POST["avatar"] ?? "");
        $dob = trim($_POST["dob"] ?? "");

        if (
            $email == "" || $nickname == "" || $password == "" ||
            $confirmPassword == "" || $avatar == "" || $dob == ""
        ) {
            $generalError = "Please fill in all fields.";
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $generalError = "Please enter a valid email.";
        }
        elseif ($password != $confirmPassword) {
            $generalError = "Passwords do not match.";
        }
        else {
            try {
                $pdo = new PDO($attr, $db_user, $db_pwd, $options);

                $query = "SELECT * FROM users WHERE email = :email";
                $stmt = $pdo->prepare($query);
                $stmt->execute(["email" => $email]);

                if ($stmt->fetch()) {
                    $generalError = "An account with that email already exists.";
                }
                else {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    $insertQuery = "INSERT INTO users (email, nickname, password, avatar_path, dob)
                                    VALUES (:email, :nickname, :password, :avatar_path, :dob)";
                    $insertStmt = $pdo->prepare($insertQuery);
                    $insertStmt->execute([
                        "email" => $email,
                        "nickname" => $nickname,
                        "password" => $hashedPassword,
                        "avatar_path" => $avatar,
                        "dob" => $dob
                    ]);

                    header("Location: login.php");
                    exit();
                }
            }
            catch (PDOException $e) {
                $generalError = "Database error occurred.";
            }
        }
    }
?>
<!DOCTYPE html>
<html>

 <head>
    <title>Gaming Hub</title>
    <link rel="stylesheet" type="text/css" href="stylea2.css" />
 </head>

    <body>
        <div id="container">
           <header id="header-top">
             <h2> BRAWL GAMES </h2>

           </header>

            <main id ="main">
                <div class="note1">
                   <h2> Create An Account</h2>
                </div>

                <?php
                    if ($generalError != "") {
                        echo "<p>" . $generalError . "</p>";
                    }
                ?>

                <form class="cert-form" action="signup.php" method="post">
              
                    <div class ="form-input">
                       <label for="mymail">Email:</label>      
                       <input type="email" id="mymail" name="mymail"
                              value="<?php echo htmlspecialchars($_POST['mymail'] ?? ''); ?>" />   

                       <label for="cname">Nickname:</label>      
                       <input type="text" id="cname" name="cname"
                              value="<?php echo htmlspecialchars($_POST['cname'] ?? ''); ?>" /> 

                       <label for="pswd">Password:</label>
                       <input type="password" id="pswd" name="pswd"/>

                       <label for="cpswd">Confirm Password:</label>
                       <input type="password" id="cpswd" name="cpswd"/>

                       <label for="avatar">Avatar Path:</label>
                       <input type="text" id="avatar" name="avatar"
                              value="<?php echo htmlspecialchars($_POST['avatar'] ?? ''); ?>" />

                       <label for="dob">Date of Birth:</label>
                       <input type="date" id="dob" name="dob"
                              value="<?php echo htmlspecialchars($_POST['dob'] ?? ''); ?>" />
                    </div>

                    <div class="to-center">
                       <input type="submit" value="REGISTER" />
                   </div>
                </form>

                    <div class="form-feed">
                     <p>Already have an account?  <a href="login.php">Login</a></p>

                    </div>
            
            </main>
            <footer id="footer-cert">
               <p class="footer-text">About. All Rights Reserved 2026 &copy;</p>
            </footer>
        </div>
    </body>

</html>