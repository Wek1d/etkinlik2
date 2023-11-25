<?php
require('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$pusher = new Pusher\Pusher(
    getenv('PUSHER_APP_KEY'),
    getenv('PUSHER_APP_SECRET'),
    getenv('PUSHER_APP_ID'),
    array('cluster' => getenv('PUSHER_APP_CLUSTER'))
);

// Pusher üzerinden bildirim gönder
$pusher->trigger('my-channel', 'my-event', [
    'message' => 'hello world'
]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Bildirim</title>
    <!-- Pusher JavaScript kitini ekleyin -->
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</head>
<body>
    <h1>PHP ile Pusher Bildirim</h1>

    <script>
        // Pusher konfigürasyonu
        const pusher = new Pusher('<PUSHER_APP_KEY>', {
            cluster: '<PUSHER_APP_CLUSTER>',
        });

        // Belirtilen kanala abone olun
        const channel = pusher.subscribe('my-channel');

        // Belirtilen olay gerçekleştiğinde çalışacak fonksiyon
        channel.bind('my-event', function(data) {
            alert('Bildirim: ' + data.message);
        });
    </script>
</body>
</html>
