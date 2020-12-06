<html lang="en">
<head>
    <link rel="icon" href="images/favicon.ico">
    <link rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.12.1/css/all.css"
        integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="theme-color" content="#1F2833">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="description" content="Ever wondered how many pesky Enderman you've slain? Or perhaps how much time you've wasted swimming when you could've used a boat? No? Neither have I. But if you do wonder about your statistics by the odd chance, you'll be able to see them on this website. Not satisfied with just that? We also have a map of the server that updates real-time. You'll be able to stalk all of your fellow Minecraft players.">
    <meta property="og:description" content="Ever wondered how many pesky Enderman you've slain? Or perhaps how much time you've wasted swimming when you could've used a boat? No? Neither have I. But if you do wonder about your statistics by the odd chance, you'll be able to see them on this website. Not satisfied with just that? We also have a map of the server that updates real-time. You'll be able to stalk all of your fellow Minecraft players.">
    <meta property="og:image" content="https://84159.ict-lab.nl/MC/images/header.png">
    <meta property="og:site_name" content="Scuby">
    <meta property="og:title" content="Scuby, a hardcore Minecraft server">
    <meta property="og:type" content="website">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <title>Map</title>
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
            <div id="map-content">
                <iframe id="map" src="http://play.scuby.online:8123/" frameborder="0"></iframe>
            </div>
        </div>
        <div id="footer">
            <div id="trans-footer"></div>
            <div id="footer-content">
                <div>
                    <h4>Contact</h4>
                    <ul>
                        <li>
                            <a href="mailto:s.zegers@outlook.com">
                                <i class="far fa-envelope"></i> Email
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/Kyzegs" target="_blank">
                                <i class="fab fa-twitter"></i> Twitter
                            </a>
                        </li>
                        <li>
                            <a href="https://discord.gg/ZAD3pmX" target="_blank">
                                <i class="fab fa-discord"></i> Discord
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/Kyzegs" target="_blank">
                                <i class="fab fa-github"></i> GitHub
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4>Pages</h4>
                    <ul>
                        <li><a href="index">Home</a></li>
                        <li><a href="map">Map</a></li>
                        <li><a href="players">Players</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>