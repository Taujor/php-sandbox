<?php
namespace Taujor\Sandbox;

class Renderer {
    protected function render (string $file, array $data = []) :string
    {
        ob_start();
        extract(array_merge($data, ["template" => $this]));
        require $file;
        return ob_get_clean();
    }

    public function layout(string $filename, array $data = []) :string
    {
        return $this->render(__DIR__ . "/../../templates/layouts/$filename.php", $data);
    }

    public function view(string $filename, array $data = []) :string
    {
        return $this->render(__DIR__ . "/../../templates/views/$filename.php", $data);
    }

    public function include(string $filename, array $data = []) :string
    {
        return $this->render(__DIR__ . "/../../templates/includes/$filename.php", $data);
    }

    public function escape (string $string) :string {
        return htmlspecialchars($string);
    }
}