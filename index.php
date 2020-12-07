<html lang="en">
<head>
    <?php require_once('includes/head.php'); ?>
    <title>Home</title>
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
                <h1>Scuby</h1>
                <p>
                    Ever wondered how many pesky Enderman you've slain? Or perhaps how much time you've wasted swimming
                    when you could've used a boat? No? Neither have I. But if you do wonder about your statistics by the
                    odd chance, you'll be able to see them on this website. Not satisfied with just that? We also have a
                    map of the server that updates real-time. You'll be able to stalk all of your fellow Minecraft
                    players.
                </p>
                <p>
                    What exactly is Scuby? Scuby is a Minecraft server consisting out of a small group of friends. The
                    server uses a mod called TerraForged for it's terrain generation. It also has a few plugins to add
                    some much needed features. We do try to keep the core experience as close to vanilla Minecraft as
                    possible by not adding mods/plugins that change the way the game is played. We also like to make
                    accomplishments feel more rewarding. We did this by putting the server in Hardcore. This makes the
                    stakes higher and the feeling of getting those sweet glittery diamonds all that much better.
                </p>
                <p>
                    You can join the Scuby server by using the the following server address:
                    <span class="hl">play.scuby.online</span>. You'll need to be on version 1.15.2 of Minecraft to play on
                    the server. Any malicious intent towards any of our users will lead to an immediate ban. Griefing
                    will yield the same result.
                </p>
            </div>
            <div id="middle">
                <div class="trans-top"></div>
                <div class="trans-bot"></div>
            </div>
            <div class="content" id="plugins-mods">
                <h1>PLUGINS & MODS</h1>
                <h3><a class="hl" href="https://terraforged.com/" target="_blank">TerraForged (MOD)</a></h3>
                <p>
                    TerraForged is an ambitious new terrain generator mod for Minecraft (Java Edition) attempting to
                    create more immersive, inspiring worlds to explore and build in. Featuring an overhaul of the
                    vanilla generation system, custom terrain shapes, simulated erosion, better rivers, custom
                    decorations, tonnes of configuration options, and more!
                </p>
                <h3><a class="hl" href="https://dev.bukkit.org/projects/dynmap/" target="_blank">Dynmap (PLUGIN)</a></h3>
                <p>
                    A Google Maps-like map for your Minecraft server that can be viewed in a browser. Easy to set up
                    when making use of Dynmap's integrated webserver which works out-of-the-box, while also available to
                    be integrated into existing websites running on Apache and the like. Dynmap can render your worlds
                    using different renderers, some suitable for performance, some for high detail.
                </p>
            </div>
        </div>
        <?php require_once('includes/footer.php'); ?>
    </div>
</body>
</html>