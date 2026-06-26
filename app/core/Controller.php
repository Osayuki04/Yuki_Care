<?php
/**
 * Controller
 *
 * Base class for all controllers. Provides view rendering with an optional
 * layout. A view file receives the supplied data as local variables and its
 * captured output is exposed to the layout as $content.
 */
abstract class Controller
{
    /**
     * Render a view inside a layout.
     *
     * @param string      $view   View path relative to app/views (no extension).
     * @param array       $data   Variables to expose to the view.
     * @param string|null $layout Layout name in app/views/layouts (null = no layout).
     */
    protected function render(string $view, array $data = [], ?string $layout = 'public'): void
    {
        $page_title = $data['page_title'] ?? null;

        extract($data, EXTR_SKIP);

        ob_start();
        require BASE_PATH . '/app/views/' . $view . '.php';
        $content = ob_get_clean();

        if ($layout !== null) {
            require BASE_PATH . '/app/views/layouts/' . $layout . '.php';
        } else {
            echo $content;
        }
    }

    /** Convenience wrapper around the global redirect helper. */
    protected function redirect(string $page): void
    {
        redirect($page);
    }

    /** True when the current request is a POST. */
    protected function isPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
}
