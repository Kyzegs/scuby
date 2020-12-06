<?php
// Empty tables because no stats. Fix that
// Render character, 3D if possible

session_start();
require_once('includes/mojang-api.php');

if (!$_GET['uuid'] || !file_exists("stats/{$_GET['uuid']}.json")) {
    header('location: players.php');
    exit;
} else {
    $uuid = $_GET['uuid'];
    $stats = json_decode(file_get_contents("stats/$uuid.json"), true)['stats'];
}
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
                <h1>STATISTICS</h1>
                <?php 
                if (!$stats['minecraft:dropped'] && !$stats['minecraft:killed'] && !$stats['minecraft:broken'] && !$stats['minecraft:picked_up'] && !$stats['minecraft:used'] && !$stats['minecraft:crafted'] && !$stats['minecraft:mined']) {
                    echo('<h3 class="center">None<h3>');
                }
                ?>
                <?php if ($stats['minecraft:dropped']) { ?>
                <h3 class="center">DROPPED</h3>
                <table class="stats-table">
                    <thead>
                        <tr>
                            <th colspan="2">Item</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($stats['minecraft:dropped'] as $object => $amount) {
                            $object = str_replace('minecraft:', '', $object);
                            $object_name = ucwords(str_replace('_', ' ', $object));
                            
                            if (file_exists("images/blocks/$object.png")) {
                                $path = "images/blocks/$object.png";
                            } else if (file_exists("images/items/$object.png")) {
                                $path = "images/items/$object.png";
                            } else {
                                $path = "images/blocks/missing_texture_block.png";
                            }

                            echo("<tr>
                                      <td><img src=\"$path\" alt=\"\">
                                      <td>$object_name</td>
                                      <td>$amount</td>
                                  </tr>");
                        }
                        ?>
                    </tbody>
                </table>
                <?php } ?>
                <?php if ($stats['minecraft:killed']) { ?>
                <h3 class="center">KILLED</h3>
                <table class="stats-table">
                    <thead>
                        <tr>
                            <th colspan="2">Mob</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($stats['minecraft:killed'] as $mob => $amount) {
                            $mob = str_replace('minecraft:', '', $mob);
                            $mob_name = ucwords(str_replace('_', ' ', $mob));
                            
                            if (file_exists("images/mobs/$mob.png")) {
                                $path = "images/mobs/$mob.png";
                            } else {
                                $path = "images/blocks/missing_texture_block.png";
                            }

                            echo("<tr>
                                      <td><img src=\"$path\" alt=\"\">
                                      <td>$mob_name</td>
                                      <td>$amount</td>
                                  </tr>");
                        }
                        ?>
                    </tbody>
                </table>
                <?php } ?>
                <?php if ($stats['minecraft:broken']) { ?>
                <h3 class="center">BROKEN</h3>
                <table class="stats-table">
                    <thead>
                        <tr>
                            <th colspan="2">Tool</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($stats['minecraft:broken'] as $tool => $amount) {
                            $tool = str_replace('minecraft:', '', $tool);
                            $tool_name = ucwords(str_replace('_', ' ', $tool));
                            
                            if (file_exists("images/items/$tool.png")) {
                                $path = "images/items/$tool.png";
                            } else {
                                $path = "images/blocks/missing_texture_block.png";
                            }

                            echo("<tr>
                                      <td><img src=\"$path\" alt=\"\">
                                      <td>$tool_name</td>
                                      <td>$amount</td>
                                  </tr>");
                        }
                        ?>
                    </tbody>
                </table>
                <?php } ?>
                <?php if ($stats['minecraft:picked_up']) { ?>
                <h3 class="center">PICKED UP</h3>
                <table class="stats-table">
                    <thead>
                        <tr>
                            <th colspan="2">Item</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($stats['minecraft:picked_up'] as $object => $amount) {
                            $object = str_replace('minecraft:', '', $object);
                            $object_name = ucwords(str_replace('_', ' ', $object));

                            if (file_exists("images/blocks/$object.png")) {
                                $path = "images/blocks/$object.png";
                            } else if (file_exists("images/items/$object.png")) {
                                $path = "images/items/$object.png";
                            } else {
                                $path = "images/blocks/missing_texture_block.png";
                            }

                            echo("<tr>
                                      <td><img src=\"$path\" alt=\"\">
                                      <td>$object_name</td>
                                      <td>$amount</td>
                                  </tr>");
                        }
                        ?>
                    </tbody>
                </table>
                <?php } ?>
                <?php if ($stats['minecraft:used']) { ?>
                <h3 class="center">USED</h3>
                <table class="stats-table">
                    <thead>
                        <tr>
                            <th colspan="2">Item</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($stats['minecraft:used'] as $object => $amount) {
                            $object = str_replace('minecraft:', '', $object);
                            $object_name = ucwords(str_replace('_', ' ', $object));
                            
                            if (file_exists("images/blocks/$object.png")) {
                                $path = "images/blocks/$object.png";
                            } else if (file_exists("images/items/$object.png")) {
                                $path = "images/items/$object.png";
                            } else {
                                $path = "images/blocks/missing_texture_block.png";
                            }

                            echo("<tr>
                                      <td><img src=\"$path\" alt=\"\">
                                      <td>$object_name</td>
                                      <td>$amount</td>
                                  </tr>");
                        }
                        ?>
                    </tbody>
                </table>
                <?php } ?>
                <?php if ($stats['minecraft:crafted']) { ?>
                <h3 class="center">CRAFTED</h3>
                <table class="stats-table">
                    <thead>
                        <tr>
                            <th colspan="2">Item</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($stats['minecraft:crafted'] as $object => $amount) {
                            $object = str_replace('minecraft:', '', $object);
                            $object_name = ucwords(str_replace('_', ' ', $object));

                            if ($object == 'air') {
                                continue;
                            }
                            
                            if (file_exists("images/blocks/$object.png")) {
                                $path = "images/blocks/$object.png";
                            } else if (file_exists("images/items/$object.png")) {
                                $path = "images/items/$object.png";
                            } else {
                                $path = "images/blocks/missing_texture_block.png";
                            }

                            echo("<tr>
                                      <td><img src=\"$path\" alt=\"\">
                                      <td>$object_name</td>
                                      <td>$amount</td>
                                  </tr>");
                        }
                        ?>
                    </tbody>
                </table>
                <?php } ?>
                <!-- <h3 class="center">CUSTOM</h3> -->
                <!-- <table class="stats-table">
                    <thead>
                        <tr>
                            <th colspan="2">???</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table> -->
                <?php if ($stats['minecraft:mined']) { ?>
                <h3 class="center">MINED</h3>
                <table class="stats-table">
                    <thead>
                        <tr>
                            <th colspan="2">Block</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($stats['minecraft:mined'] as $block => $amount) {
                            $block = str_replace('minecraft:', '', $block);
                            $block_name = ucwords(str_replace('_', ' ', $block));
                            
                            if (file_exists("images/blocks/$block.png")) {
                                $path = "images/blocks/$block.png";
                            } else if (file_exists("images/items/$block.png")) {
                                $path = "images/items/$block.png";
                            } else {
                                $path = "images/blocks/missing_texture_block.png";
                            }

                            echo("<tr>
                                      <td><img src=\"$path\" alt=\"\">
                                      <td>$block_name</td>
                                      <td>$amount</td>
                                  </tr>");
                        }
                        ?>
                    </tbody>
                </table>
                <?php } ?>
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
</body>
</html>