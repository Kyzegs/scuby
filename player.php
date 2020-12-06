<?php
if (! $_GET['uuid'] || ! file_exists(sprintf('stats/%s.json', $_GET['uuid']))) {
    header('location: players.php');
    exit;
} 

session_start();
require_once('includes/mojang-api.php');

$uuid = $_GET['uuid'];
$stats = json_decode(file_get_contents(sprintf('stats/%s.json', $uuid)), true)['stats'];
$categories = [
    'dropped' => 'item',
    'killed' => 'mob',
    'broken' => 'item',
    'picked_up' => 'item',
    'used' => 'item',
    'crafted' => 'item',
    'mined' => 'item',
];
?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/94/three.min.js"
        integrity="sha256-NGC9JEuTWN4GhTj091wctgjzftr+8WNDmw0H8J5YPYE="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/InventivetalentDev/MineRender@1.2.3/dist/skin.min.js"></script>
    <script src="js/script.js"></script>
    <title><?= end(MojangAPI::getNameHistory($uuid))['name']; ?></title>
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
                <div id="skin-display"></div>
                <h1>STATISTICS</h1>
                <?php if (! in_array(true, array_map('boolval', array_values($stats)))): ?>
                    <h3 class="center">None<h3>
                <?php endif; ?>
                <?php foreach($categories as $category => $type): ?>
                    <?php if (! empty($stats['minecraft:'.$category])): ?>
                        <h3 class="center"><?= strtoupper($category) ?></h3>
                        <table class="stats-table">
                            <thead>
                                <tr>
                                    <th colspan="2">Item</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($stats['minecraft:'.$category] as $object => $amount): ?>
                                    <?php
                                    $object = str_replace('minecraft:', '', $object);
                                    $object_name = ucwords(str_replace('_', ' ', $object));
                                    
                                    if ($type === 'item') {
                                        if (file_exists("images/blocks/$object.png")) {
                                            $path = "images/blocks/$object.png";
                                        } else if (file_exists("images/items/$object.png")) {
                                            $path = "images/items/$object.png";
                                        } else {
                                            $path = "images/blocks/missing_texture_block.png";
                                        }   
                                    } elseif ($type === 'mob') {
                                        if (file_exists("images/mobs/$object.png")) {
                                            $path = "images/mobs/$object.png";
                                        } else {
                                            $path = "images/blocks/missing_texture_block.png";
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td><img src="<?= $path ?>" alt="Minecraft <?= $type ?>">
                                        <td><?= $object_name ?></td>
                                        <td><?= $amount ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                <?php endforeach; ?>
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="map.php">Map</a></li>
                        <li><a href="players.php">Players</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        new SkinRender({
            render: {
                taa: true
            },
            canvas: {
                width: 320,
                height: 400
            },
        }, document.getElementById('skin-display')).render({
            uuid: '<?= $uuid; ?>'
        });
    </script>
</body>
</html>