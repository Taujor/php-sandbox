<?php
class Renderer {
    protected string $viewDirectory;
    protected string $layoutDirectory;

    public function __construct (string $viewDirectory = __DIR__ . "/../../templates/views/", string $layoutDirectory = __DIR__ . "/../../templates/layouts/"){
        $this->layoutDirectory = $layoutDirectory;
        $this->viewDirectory = $viewDirectory;
    }

    public function render (string $view, array $data = []): string
    {
        ob_start();
        extract($data);
        require $this->viewDirectory . $view . ".php";
        return ob_get_clean();
    }

    public function layout (string $layout, array $data = []): string{
        ob_start();
        extract($data);
        require $this->layoutDirectory . $layout . ".php";
        return ob_get_clean();
    }
}