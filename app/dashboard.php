<?php
    session_start();

    if (!isset($_SESSION["user_id"])) {
        header("Location: login.php");
        exit();
    }

    $nickname = $_SESSION["nickname"] ?? "Player";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gaming Hub - Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body id="loggedin-page" class="dashboard-page">

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

            <div id="welcome">
                <p><strong>Welcome back <?php echo htmlspecialchars($nickname); ?>!</strong></p>
            </div>

            <div class="layout">

                <div class="page-wrapper">

                    <section class="section">
                        <h2>Recent games</h2>
                        <div class="carousel">
                            <div class="cards">
                                <div class="game-card">
                                    <img src="images/chess.jpeg" alt="Chess game" />
                                    <p class="game-title">Chess</p>
                                </div>
                                <div class="game-card">
                                    <img src="images/checkers.jpeg" alt="Checkers game" />
                                    <p class="game-title">Checkers</p>
                                </div>
                                <div class="game-card">
                                    <img src="images/tictactoe.png" alt="Tic Tac Toe game" />
                                    <p class="game-title">Tic Tac Toe</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="section">
                        <h2>Your Games</h2>
                        <div class="carousel">
                            <div class="cards">
                                <div class="game-card">
                                    <img src="images/chess.jpeg" alt="Chess game" />
                                    <p class="game-title">Chess</p>
                                </div>
                                <div class="game-card">
                                    <img src="images/checkers.jpeg" alt="Checkers game" />
                                    <p class="game-title">Checkers</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="section">
                        <h2>Explore More Games</h2>
                        <div class="carousel">
                            <div class="cards">
                                <div class="game-card">
                                    <img src="images/connect4.jpeg" alt="Connect 4 game" />
                                    <p class="game-title">Connect 4</p>
                                </div>
                                <div class="game-card">
                                    <img src="images/memorygame.png" alt="Memory game" />
                                    <p class="game-title">Memory</p>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>

                <aside class="notifications">
                    <h3>Notifications</h3>
                    <ul>
                        <li>New game added</li>
                        <li>Friend request</li>
                        <li>Your rank increased</li>
                    </ul>
                    <p class="collapse-text">Collapsible &#8594;</p>
                </aside>

            </div>

        </main>

        <footer id="footer-cert">
            <p class="footer-text">About. All Rights Reserved 2026 &copy;</p>
        </footer>

    </div>

</body>
</html>