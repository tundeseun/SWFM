<?php

namespace Maatwebsite\Excel\Helpers;

use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileTypeDetector
{
    /**
     * @param  $filePath
     * @param  string|null  $type
     * @return string|null
     *
     * @throws NoTypeDetectedException
     */
<<<<<<< HEAD
    public static function detect($filePath, string $type = null)
=======
    public static function detect($filePath, ?string $type = null)
>>>>>>> tundeseun/devtest
    {
        if (null !== $type) {
            return $type;
        }

        if (!$filePath instanceof UploadedFile) {
            $pathInfo  = pathinfo($filePath);
            $extension = $pathInfo['extension'] ?? '';
        } else {
            $extension = $filePath->getClientOriginalExtension();
        }

        if (null === $type && trim($extension) === '') {
            throw new NoTypeDetectedException();
        }

        return config('excel.extension_detector.' . strtolower($extension));
    }

    /**
     * @param  string  $filePath
     * @param  string|null  $type
     * @return string
     *
     * @throws NoTypeDetectedException
     */
<<<<<<< HEAD
    public static function detectStrict(string $filePath, string $type = null): string
=======
    public static function detectStrict(string $filePath, ?string $type = null): string
>>>>>>> tundeseun/devtest
    {
        $type = static::detect($filePath, $type);

        if (!$type) {
            throw new NoTypeDetectedException();
        }

        return $type;
    }
}
