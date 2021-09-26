<?php

function redirectTo($location = null)
{
    if ($location != null) {
        header("Location: {$location}");
        exit;
    }
}

function outputMessage($message = "")
{
    if (!empty($message)) {
        return "<p class=\"message\">{$message}</p>";
    } else {
        return "";
    }
}

function includeLayoutTemplate($template = "")
{
    include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . $template);
}

function isGetRequest()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function isPostRequest()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function u($string = "")
{
    return urlencode($string);
}

function rawU($string = "")
{
    return rawurlencode($string);
}

function h($string = "")
{
    return htmlspecialchars($string);
}
/*
function my_autoload($class_name)
{
    $class_name = strtolower($class_name);
    $path = LIB_PATH . DS . "{$class_name}.php";
    if (file_exists($path)) {
        require_once($path);
    } else {
        die("The file {$class_name}.php could not be found.");
    }
}

spl_autoload_register('my_autoload');
*/
?>