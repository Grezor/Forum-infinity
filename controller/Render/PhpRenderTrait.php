<?php

namespace App\Render;

trait PhpRenderTrait
{
    protected function render(string $view, array $data = [], ?string $layout = null)
    {
        extract($data);

        ob_start();
        require __DIR__ . "/../../view/{$view}.php";
        $content = ob_get_clean();

        if ($layout) {
            ob_start();
            require __DIR__ . "/../../view/Layouts/{$layout}.php";
            $content = ob_get_clean();
        }

        echo $content;
    }
}
