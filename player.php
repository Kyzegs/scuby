<?php
if (!$_GET['uuid'] || !file_exists(sprintf('stats/%s.json', $_GET['uuid']))) {
    header('location: players.php');
    exit;
}

session_start();
require_once 'includes/mojang-api.php';

$uuid = $_GET['uuid'];
$stats = json_decode(file_get_contents(sprintf('stats/%s.json', $uuid)), true)['stats'];
$categories = [
    'dropped'   => 'item',
    'killed'    => 'mob',
    'broken'    => 'item',
    'picked_up' => 'item',
    'used'      => 'item',
    'crafted'   => 'item',
    'mined'     => 'item',
    'custom'    => 'custom',
];
?>
<html lang="en">
<head>
    <?php require_once 'includes/head.php'; ?>
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
                <?php if (!in_array(true, array_map('boolval', array_values($stats)))) { ?>
                    <h3 class="center">None<h3>
                <?php } ?>
                <?php foreach ($categories as $category => $type) { ?>
                    <?php if (!empty($stats['minecraft:'.$category])) { ?>
                        <h3 class="center"><?= strtoupper($category) ?></h3>
                        <table class="stats-table">
                            <thead>
                                <tr>
                                    <th colspan="2">Item</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($stats['minecraft:'.$category] as $object => $amount) { ?>
                                    <?php
                                    $object = str_replace('minecraft:', '', $object);
                                    $object_name = ucwords(str_replace('_', ' ', $object));

                                    if ($type === 'item') {
                                        if (file_exists("images/blocks/$object.png")) {
                                            $path = "images/blocks/$object.png";
                                        } elseif (file_exists("images/items/$object.png")) {
                                            $path = "images/items/$object.png";
                                        } else {
                                            $path = 'images/blocks/missing_texture_block.png';
                                        }
                                    } elseif ($type === 'mob') {
                                        if (file_exists("images/mobs/$object.png")) {
                                            $path = "images/mobs/$object.png";
                                        } else {
                                            $path = 'images/blocks/missing_texture_block.png';
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td><img src="<?= $path ?>" alt="Minecraft <?= $type ?>">
                                        <td><?= $object_name ?></td>
                                        <td><?= $amount ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <?php require_once 'includes/footer.php'; ?>
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