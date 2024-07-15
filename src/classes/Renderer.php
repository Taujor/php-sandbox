<?php
class Renderer {
    public function render (string $file, array $data = []): string
    {
        ob_start();
        extract(array_merge($data, ["template" => $this]));
        require $file;
        return ob_get_clean();
    }

    public function escape (string $string) :string {
        return htmlspecialchars($string);
    }
}