<?php
    session_start();
    require_once("db.php");

    // User must be logged in
    if (!isset($_SESSION["user_id"])) {
        header("Location: login.php");
        exit();
    }

    $generalError = "";
    $successMessage = "";

    try {
        $pdo = new PDO($attr, $db_user, $db_pass, $options);
        $user_id = $_SESSION["user_id"];

        // DELETE ACCOUNT
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_account"])) {
            $deleteQuery = "DELETE FROM Users WHERE User_ID = :user_id";
            $deleteStmt = $pdo->prepare($deleteQuery);
            $deleteStmt->execute(["user_id" => $user_id]);

            session_unset();
            session_destroy();

            header("Location: signup.php");
            exit();
        }

        // UPDATE USER INFO
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["save"])) {
            $nickname = trim($_POST["nickname"] ?? "");
            $avatar = trim($_POST["avatar"] ?? "");
            $dob = trim($_POST["dob"] ?? "");

            if ($nickname == "" || $avatar == "" || $dob == "") {
                $generalError = "Please fill in all fields.";
            }
            else {
                $updateQuery = "UPDATE Users
                                SET nickName = :nickname,
                                    avatar = :avatar,
                                    DOB = :dob
                                WHERE User_ID = :user_id";
                $updateStmt = $pdo->prepare($updateQuery);
                $updateStmt->execute([
                    "nickname" => $nickname,
                    "avatar" => $avatar,
                    "dob" => $dob,
                    "user_id" => $user_id
                ]);

                // update session nickname so dashboard shows the new one
                $_SESSION["nickname"] = $nickname;

                $successMessage = "Your information has been updated.";
            }
        }

        // LOAD CURRENT USER DATA
        $selectQuery = "SELECT email, nickName, avatar, DOB
                        FROM Users
                        WHERE User_ID = :user_id";
        $selectStmt = $pdo->prepare($selectQuery);
        $selectStmt->execute(["user_id" => $user_id]);

        $user = $selectStmt->fetch();

        if (!$user) {
            session_unset();
            session_destroy();
            header("Location: login.php");
            exit();
        }
    }
    catch (PDOException $e) {
        $generalError = "Internal Error: " . $e->getMessage();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gaming Hub - User Info</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body id="loggedin-page">

<div id="container">

    <header id="header-top">
        <div class="header-inner">
            <h2>BRAWL GAMES</h2>

            <nav class="top-nav">
                <a href="dashboard.php">Home</a>
                <a href="dashboard.php">Explore</a>
                <a href="userinfo.php">My Info</a>
                <a href="gamehistory.html">History</a>
                <a href="logout.php">Sign Out</a>
            </nav>
        </div>
    </header>

    <main id="main">

        <div class="note1">
            <h2>Your Info</h2>
        </div>

        <?php
            if ($generalError != "") {
                echo "<p class=\"error-message\">" . htmlspecialchars($generalError) . "</p>";
            }

            if ($successMessage != "") {
                echo "<p>" . htmlspecialchars($successMessage) . "</p>";
            }
        ?>

        <form class="cert-form" action="userinfo.php" method="post">

            <div class="form-input">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email"
                       value="<?php echo htmlspecialchars($user["email"]); ?>" readonly />

                <label for="nickname">Nickname:</label>
                <input type="text" id="nickname" name="nickname"
                       value="<?php echo htmlspecialchars($user["nickName"]); ?>" />

                <label for="avatar">Avatar Path:</label>
                <input type="text" id="avatar" name="avatar"
                       value="<?php echo htmlspecialchars($user["avatar"]); ?>" />

                <label for="dob">DOB:</label>
                <input type="date" id="dob" name="dob"
                       value="<?php echo htmlspecialchars($user["DOB"]); ?>" />

            </div>

            <p>&nbsp;</p>

            <div class="to-center">
                <input type="button" value="View Game History" onclick="window.location.href='gamehistory.html';" />
                &nbsp;&nbsp;&nbsp;
                <input type="submit" name="delete_account" value="Delete Account" />
                &nbsp;&nbsp;&nbsp;
                <input type="submit" name="save" value="Save" />
            </div>

        </form>

    </main>

    <footer id="footer-cert">
        <p class="footer-text">About. All Rights Reserved 2026 &copy;</p>
    </footer>

</div>

</body>
</html>