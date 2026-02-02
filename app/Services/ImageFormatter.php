<?php

namespace App\Services;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageFormatter
{

    public static function formatAndUpload(UploadedFile $file, string $folder, int $maxMb = 1): string
    {
        $maxBytes = $maxMb * 1024 * 1024;

        // Crear manager de imágenes versión 3
        $manager = new ImageManager(new Driver());

        // Leer la imagen
        $image = $manager->read($file->getRealPath());

        // Redimensionar para optimizar tamaño
        $image->scaleDown(width: 1600);

        // Comprimir hasta entrar en el límite
        $quality = 90;
        $imageData = (string) $image->toJpeg($quality);

        while (strlen($imageData) > $maxBytes && $quality > 40) {
            $quality -= 5;
            $imageData = (string) $image->toJpeg($quality);
        }

        // Nombre único
        $filename = $folder . '/' . uniqid('img_') . '.jpg';

        // Subir a S3
        Storage::disk('s3')->put($filename, $imageData);

        return $filename;
    }
}
