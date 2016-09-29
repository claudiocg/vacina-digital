<?php

use Framework\Application;

if (!function_exists('view')) {
    function view(string $view, array $data = [])
    {
        return Application::container('view')->make($view, $data);
    }
}

if (!function_exists('template')) {
    function template(string $file)
    {
        return Application::container('view')->template($file);
    }
}
if (!function_exists('assets')) {
    function assets(string $asset, string $type)
    {
        return Application::container('view')->assets($asset, $type);
    }
}

if (!function_exists('dd')) {
    /**
     * Dump and Die
     * @param  mixed $value
     * @return mixed
     */
    function dd($value)
    {
        die(dump($value));
    }
}

if (!function_exists('request')) {
    /**
     * Get all request
     * @param  mixed $model
     * @return mixed
     */
    function request($model)
    {
        foreach ($_POST as $key => $value) {
            $model->{$key} = $value;
        };
        return $model;
    }
}
