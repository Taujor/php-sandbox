<?php 
    include __DIR__ . "/../includes/heading.php";
    include __DIR__ . "/../includes/counter.php";

    $meta = [
        "title" => "Demo - PHP Sandbox"
    ];
?>

<div id="root">
    <img id="elefant" src="/assets/php.svg" alt="php elefant logo">
    <?= heading("php") ?>
    <?= counter() ?>
</div>