<div id="root">
    <img id="elefant" src="/assets/php.svg" alt="php elefant logo">

    <?= $template->render(__DIR__ . "/../includes/heading.php", ["title" => "php"]) ?>

    <?= $template->render(__DIR__ . "/../includes/counter.php", ["id" => "counter1"]) ?>
</div>