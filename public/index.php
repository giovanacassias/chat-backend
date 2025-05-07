<?php
define('DB_PATH', '../database/chat.txt');

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $message = $_POST['message'];
    file_put_contents(DB_PATH, $message . PHP_EOL, FILE_APPEND);
}

$messages = file(DB_PATH, FILE_IGNORE_NEW_LINES);

?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super chat</title>

    <link rel="stylesheet" href="/assets/application.css">
</head>

<body>
    <main class="container">
        <header>
            <h1>Super chat</h1>
        </header>
        <section>
            <div class="messages">
                <?php foreach ($messages as $index => $message) : ?>
                    <div class="message <?= ['sent', 'received'][$index % 2] ?>">
                        <?= $message ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="form">
                <form action="/" method="POST">
                    <input name="message" type="text" placeholder="Type a message">
                    <input type="submit" value="Enviar">
                </form>
            </div>
        </section>
    </main>

</body>

</html>