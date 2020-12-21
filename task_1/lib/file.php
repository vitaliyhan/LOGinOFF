<?php

class File implements StorageInterface
{
    public $filePath = '';

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function write($content)
    {
        $fp = fopen($this->filePath, "w+");
        $file = fwrite($fp, $content);
        if ($file) {
            // Успешное занесение данных.
        } else {
            // Обработка ошибок занесения данных
        }
        fclose($fp);

    }

    public function read()
    {
        $this->createIfNotExist();
        return file_get_contents($this->filePath);
    }

    private function createIfNotExist()
    {
        if (file_exists($this->filePath)) {
            // Файл  существует
        } else {
            // Файл не существует, создаем
            $file = fopen($this->filePath, "w+");
            fclose($file);
            // По хорошему, нужно еще проверять права на папку, и выдавать ошибку, если прав на запись нет.
        }
    }


}