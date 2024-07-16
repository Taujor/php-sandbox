<div id="root">
    <img id="elefant" src="/assets/php.svg" alt="php elefant logo">

    <?= $template->include("heading", ["title" => "php"]) ?>

    <?= $template->include("counter", ["id" => "counter1"]) ?>
</div>