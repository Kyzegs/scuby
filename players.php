<?php
session_start();
require_once 'includes/mojang-api.php';
?>
<html lang="en">
<head>
    <?php require_once 'includes/head.php'; ?>
    <title>Players</title>
</head>
<body>
    <div id="wrapper">
        <div id="content-wrapper">
            <div id="nav-overlay">
                <div id="mobile-nav">
                    <a href="index.php"><img src="images/grass.png" alt="">Home</a>
                    <a href="map.php"><img src="images/map.png" alt="">Map</a>
                    <a href="players.php"><img src="images/steve.png" alt="">Players</a>
                </div>
            </div>
            <div id="header">
                <div id="nav-bar">
                    <div class="nav-item"><a href="index.php"><img src="images/grass.png" alt="">Home</a></div>
                    <div class="nav-item"><a href="map.php"><img src="images/map.png" alt="">Map</a></div>
                    <div class="nav-item nav-right"><a href="players.php"><img src="images/steve.png" alt="">Players</a>
                    </div>
                    <div class="nav-item nav-right" id="mobile-button"><img src="images/sword.png" alt=""></div>
                </div>
                <div class="trans-bot"></div>
            </div>
            <div class="content">
                <?php
                foreach (glob('stats/*.json') as $filename) {
                    $uuid = str_replace(['stats/', '.json'], '', $filename);
                    $username = end(MojangAPI::getNameHistory($uuid))['name'];

                    $player_head = MojangAPI::embedImage(MojangAPI::getPlayerHead($uuid));
                    if ($player_head != 'data:image/png;base64,') {
                        $_SESSION['player_heads'][$username] = $player_head;
                    } else {
                        $player_head = $_SESSION['player_heads'][$username];
                    }

                    echo "<a class=\"player-card\" href=\"player.php?uuid=$uuid\">
                            <img src=\"$player_head\" alt=\"\">
                            $username
                        </a>";
                }
                ?>
            </div>
        </div>
        <?php require_once 'includes/footer.php'; ?>
    </div>
</body>
</html>