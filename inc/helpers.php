<?php

if (!function_exists('gf_is_route_match')) {
    /**
     * Match/Exact Match check the current path with expected path.
     * By default exact match is disable
     * 
     * @param string $path Expected path should match
     * @param bool   $isExact Is exact matching or not
     * 
     * @return bool
     */
    function gf_is_route_match(string $path, bool $isExact = false)
    {
        /** @var WP $wp */
        global $wp;
        $currentPath = $wp->request;

        if ($isExact) return "/" . $currentPath === $path;

        return str_contains($path, $currentPath);
    }
}

if (!function_exists('gf_print_if')) {
    /**
     * Conditional check either string should print or not by given condition
     * 
     * @param string $print The string should be print when condition passed
     * @param bool   $condPassed Expected condition should passed to print string
     * 
     * @return string Return empty string if condition not passed
     */
    function gf_print_if(string $print, bool $condPassed)
    {
        if (!$condPassed) {
            echo "";
            return;
        }
        echo $print;
    }
}
