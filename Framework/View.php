<?php

namespace Framework;

class View
{
    public function make(string $view, array $data = [])
    {
        $this->view = $this->formatPath($view);

        $this->view = "{$this->path()}/app/View/{$this->view}.view.php";

        if (file_exists($this->view)) {
            extract($data);
            return require($this->view);
        }
    }
    public function template(string $file)
    {
    	$file = $this->formatPath($file);
    	return require "{$this->path()}/app/View/templates/{$file}.view.php";
    }

    public function path()
    {
    	return dirname(__DIR__);
    }
    public function formatPath(string $path)
    {
        return str_replace(".", "/", $path);
    }
    public function assets(string $asset, string $type)
    {
        if ($type == 'css')
            return "<link href='/assets/{$this->formatPath($asset)}.css' rel='stylesheet'>";
        if ($type == 'js')
            return "<script src='/assets/{$this->formatPath($asset)}.min.js'></script>";
    }
    public function redirect(string $to)
    {
        $to = $this->formatPath($to);

        return header("Location: /{$to}");
    }
}