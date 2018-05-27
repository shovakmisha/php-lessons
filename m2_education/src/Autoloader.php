<?php

class Autoloader
{
    /**
     * System autoloader
     *
     * @param string $className Class name
     */
    static public function autoload($className)
    {
        $classPath = explode('\\', $className);
        $fullPath  = self::getBaseDir()
            . DIRECTORY_SEPARATOR
            . implode(DIRECTORY_SEPARATOR, $classPath)
            . '.php';
        require_once $fullPath;
    }

    /**
     * Returns base application directory
     *
     * @return string
     */
    static public function getBaseDir()
    {
        $directory = realpath(dirname(''));
        $directory = rtrim($directory, '/');
        return $directory;
    }
}