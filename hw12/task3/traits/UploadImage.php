<?php

trait UploadImage
{
    private static string $filePath;
    private static string $fileName;
    public static function uploadUserAvatar(string $fileName): void
    {
        if (!empty($_FILES[$fileName]['tmp_name'])) {
            $tmp = $_FILES[$fileName]['tmp_name'];
            self::$fileName = $_FILES[$fileName]['name'];
            self::$filePath = "../images/".self::$fileName;
            move_uploaded_file($tmp, self::$filePath);
        }
    }
    public static function getFilePath(): string
    {
        return self::$filePath;
    }
    public static function getFileName(): string
    {
        return self::$fileName;
    }
}