<?php

namespace Maatwebsite\Excel\Files;

use Illuminate\Support\Str;

class TemporaryFileFactory
{
    /**
     * @var string|null
     */
    private $temporaryPath;

    /**
     * @var string|null
     */
    private $temporaryDisk;

    /**
     * @param  string|null  $temporaryPath
     * @param  string|null  $temporaryDisk
     */
<<<<<<< HEAD
    public function __construct(string $temporaryPath = null, string $temporaryDisk = null)
=======
    public function __construct(?string $temporaryPath = null, ?string $temporaryDisk = null)
>>>>>>> tundeseun/devtest
    {
        $this->temporaryPath = $temporaryPath;
        $this->temporaryDisk = $temporaryDisk;
    }

    /**
     * @param  string|null  $fileExtension
     * @return TemporaryFile
     */
<<<<<<< HEAD
    public function make(string $fileExtension = null): TemporaryFile
=======
    public function make(?string $fileExtension = null): TemporaryFile
>>>>>>> tundeseun/devtest
    {
        if (null !== $this->temporaryDisk) {
            return $this->makeRemote($fileExtension);
        }

        return $this->makeLocal(null, $fileExtension);
    }

    /**
     * @param  string|null  $fileName
     * @param  string|null  $fileExtension
     * @return LocalTemporaryFile
     */
<<<<<<< HEAD
    public function makeLocal(string $fileName = null, string $fileExtension = null): LocalTemporaryFile
=======
    public function makeLocal(?string $fileName = null, ?string $fileExtension = null): LocalTemporaryFile
>>>>>>> tundeseun/devtest
    {
        if (!file_exists($this->temporaryPath) && !mkdir($concurrentDirectory = $this->temporaryPath, config('excel.temporary_files.local_permissions.dir', 0777), true) && !is_dir($concurrentDirectory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
        }

        return new LocalTemporaryFile(
            $this->temporaryPath . DIRECTORY_SEPARATOR . ($fileName ?: $this->generateFilename($fileExtension))
        );
    }

    /**
     * @param  string|null  $fileExtension
     * @return RemoteTemporaryFile
     */
<<<<<<< HEAD
    private function makeRemote(string $fileExtension = null): RemoteTemporaryFile
=======
    private function makeRemote(?string $fileExtension = null): RemoteTemporaryFile
>>>>>>> tundeseun/devtest
    {
        $filename = $this->generateFilename($fileExtension);

        return new RemoteTemporaryFile(
            $this->temporaryDisk,
            config('excel.temporary_files.remote_prefix') . $filename,
            $this->makeLocal($filename)
        );
    }

    /**
     * @param  string|null  $fileExtension
     * @return string
     */
<<<<<<< HEAD
    private function generateFilename(string $fileExtension = null): string
=======
    private function generateFilename(?string $fileExtension = null): string
>>>>>>> tundeseun/devtest
    {
        return 'laravel-excel-' . Str::random(32) . ($fileExtension ? '.' . $fileExtension : '');
    }
}
