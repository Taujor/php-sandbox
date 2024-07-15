<?php
class Renderer {
    protected string $viewDirectory;
    protected string $layoutDirectory;

    public function __construct (string $viewDirectory){
        $this->viewDirectory = $viewDirectory;
    }

    public function render (string $view, array $data = []): string
    {
        ob_start();
        extract($data);
        require $this->viewDirectory . $view;
        return ob_get_clean();
    }

    public function layout (string $file, array $data = []): string{
        ob_start();
        extract($data);
        require $file;
        return ob_get_clean();
    }
}