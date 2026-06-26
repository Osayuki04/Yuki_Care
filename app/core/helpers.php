<?php
/**
 * Global helper functions used across views and controllers.
 */

if (!function_exists('e')) {
    /** Escape a value for safe HTML output. */
    function e($value): string
    {
        return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('url')) {
    /** Build an internal application URL for a route key, e.g. url('admin/dashboard'). */
    function url(string $page = 'home'): string
    {
        return FRONT_CONTROLLER . '?page=' . rawurlencode_path($page);
    }
}

if (!function_exists('rawurlencode_path')) {
    /** rawurlencode each path segment but keep the slashes. */
    function rawurlencode_path(string $path): string
    {
        return implode('/', array_map('rawurlencode', explode('/', ltrim($path, '/'))));
    }
}

if (!function_exists('asset')) {
    /** Build a URL to a static asset (images, css, js). */
    function asset(string $path): string
    {
        return BASE_URL . '/' . ltrim($path, '/');
    }
}

if (!function_exists('redirect')) {
    /** Redirect to an internal route and stop execution. */
    function redirect(string $page): void
    {
        header('Location: ' . url($page));
        exit;
    }
}

if (!function_exists('flash')) {
    /**
     * Store (set) or retrieve-and-clear (get) a one-time flash message.
     */
    function flash(string $key, ?string $message = null)
    {
        if ($message !== null) {
            $_SESSION['_flash'][$key] = $message;
            return null;
        }
        $value = $_SESSION['_flash'][$key] ?? null;
        unset($_SESSION['_flash'][$key]);
        return $value;
    }
}

if (!function_exists('old')) {
    /** Retrieve a previously submitted form value (after a validation redirect). */
    function old(string $key, string $default = ''): string
    {
        return $_SESSION['_old'][$key] ?? $default;
    }
}

if (!function_exists('remember_old')) {
    /** Persist the submitted form input so it can be repopulated after a redirect. */
    function remember_old(array $input): void
    {
        // Never persist password fields.
        unset($input['password'], $input['confirm_password']);
        $_SESSION['_old'] = $input;
    }
}

if (!function_exists('clear_old')) {
    function clear_old(): void
    {
        unset($_SESSION['_old']);
    }
}

if (!function_exists('csrf_field')) {
    /** Hidden CSRF input for embedding in forms. */
    function csrf_field(): string
    {
        return Csrf::field();
    }
}

if (!function_exists('csrf_token')) {
    /** The current CSRF token value. */
    function csrf_token(): string
    {
        return Csrf::token();
    }
}

if (!function_exists('avatar_url')) {
    /**
     * Default profile illustration. Returns a custom picture when one is set,
     * otherwise a gender-appropriate illustrated avatar (male / female / neutral)
     * seeded by the person's name so it stays consistent.
     */
    function avatar_url(string $name, ?string $gender = null, ?string $custom = null, string $bg = 'd1fae5'): string
    {
        if ($custom !== null && $custom !== '') {
            return $custom;
        }
        $seed = rawurlencode($name !== '' ? $name : 'Yibera User');
        $base = "https://api.dicebear.com/9.x/avataaars/svg?seed={$seed}&backgroundColor={$bg}";

        switch (strtolower((string) $gender)) {
            case 'male':
                return $base . '&top=shortFlat,shortRound,shortWaved,shortCurly,theCaesar,sides&facialHairProbability=55';
            case 'female':
                return $base . '&top=straight01,straight02,bob,bun,curvy,longButNotTooLong&facialHairProbability=0';
            default:
                return $base;
        }
    }
}

if (!function_exists('money')) {
    /** Format an amount as a currency string. */
    function money($amount): string
    {
        return '₦' . number_format((float) $amount, 2);
    }
}

if (!function_exists('calculateAge')) {
    /** Calculate age in whole years from a date-of-birth string. */
    function calculateAge(?string $dateOfBirth)
    {
        if (empty($dateOfBirth)) {
            return 'N/A';
        }
        try {
            return (new DateTime($dateOfBirth))->diff(new DateTime('today'))->y;
        } catch (Throwable $e) {
            return 'N/A';
        }
    }
}
