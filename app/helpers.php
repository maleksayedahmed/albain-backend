<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('can')) {
    /**
     * Check if the authenticated user has the given permission.
     *
     * @param string $ability
     * @param array|mixed $arguments
     * @return bool
     */
    function can($ability, $arguments = [])
    {
        $user = Auth::user();
        if (!$user) {
            return false;
        }
        return $user->can($ability, $arguments);
    }
} 