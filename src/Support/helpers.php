<?php
if (! function_exists('lib_env')) {
    function lib_env(string $key, $default = null) {
        $env = lib_get_env();
        return $env[$key] ?? $default;
    }
}

if (! function_exists('lib_get_env')) {
    function lib_get_env(): array {
        $rootDir = dirname(__FILE__);
        $envFilePath = $rootDir . DIRECTORY_SEPARATOR . '../../' . '.env';
        if (!file_exists($envFilePath)) {
            echo $envFilePath.PHP_EOL;
            throw new Exception('.env 文件不存在');
        }
        $envContent = file_get_contents($envFilePath);
        $envArray = [];
        $lines = explode("\n", $envContent);
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line !== '' && strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                $envArray[$key] = $value;
            }
        }
        return $envArray;
    }
}