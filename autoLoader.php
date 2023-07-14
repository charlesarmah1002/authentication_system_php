<?php 

spl_autoload_register('MyAutoLoader');

function MyAutoLoader($filename)
{
    $path = 'classes/';
    $extension = '.class.php';
    $fullpath = $path.$filename.$extension;

    if(file_exists($fullpath))
    {
        require_once $fullpath;
    }else
    {
        return false;
    }
}
