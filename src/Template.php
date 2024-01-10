<?php

namespace Jslomian\htmpl;

class Template {

    public function render(string $file, array $data): string {
        extract($data);

        $content = file_get_contents("templates/{$file}.phtmpl");

        $content = preg_replace('/<if\s*\(\s*([^)]+?)\s*\)>/', '<?php if($1): ?>', $content);
        $content = preg_replace('/<if\s+condition="([^"]+)"\s*>/', '<?php if($1): ?>', $content);
        $content = str_replace('<else>', '<?php else: ?>', $content);
        $content = str_replace('</endif>', '<?php endif; ?>', $content);
        $content = preg_replace('/{{\s*(\$\w+)\s*}}/', '<?php echo $1; ?>', $content);

        ob_start();
        eval('?>' . $content);
        return ob_get_clean();
    }

    public function renderView(string $file, array $data): void {
        echo $this->render($file, $data);
    }

}