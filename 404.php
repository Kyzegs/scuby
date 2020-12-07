<html lang="en">
<head>
    <?php require_once 'includes/head.php'; ?>
    <title>404</title>
</head>
<body>
    <div id="wrapper">
        <div id="content-wrapper">
            <div id="nav-overlay">
                <div id="mobile-nav">
                    <a href="index"><img src="images/grass.png" alt="">Home</a>
                    <a href="map"><img src="images/map.png" alt="">Map</a>
                    <a href="players"><img src="images/steve.png" alt="">Players</a>
                </div>
            </div>
            <div id="header">
                <div id="nav-bar">
                    <div class="nav-item"><a href="index"><img src="images/grass.png" alt="">Home</a></div>
                    <div class="nav-item"><a href="map"><img src="images/map.png" alt="">Map</a></div>
                    <div class="nav-item nav-right"><a href="players"><img src="images/steve.png" alt="">Players</a>
                    </div>
                    <div class="nav-item nav-right" id="mobile-button"><img src="images/sword.png" alt=""></div>
                </div>
                <div class="trans-bot"></div>
            </div>
            <div class="content">
                <h1>The page you tried to search for does not exist</h1>
                <img id="error" src="images/sheep.gif" alt="">
            </div>
        </div>
        <?php require_once 'includes/footer.php'; ?>
    </div>
</body>
</html>