<?php

namespace Maatwebsite\Excel;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\PendingDispatch;
use Illuminate\Support\Collection;
<<<<<<< HEAD
=======
use Illuminate\Support\Traits\Macroable;
>>>>>>> tundeseun/devtest
use Maatwebsite\Excel\Files\Filesystem;
use Maatwebsite\Excel\Files\TemporaryFile;
use Maatwebsite\Excel\Helpers\FileTypeDetector;

class Excel implements Exporter, Importer
{
<<<<<<< HEAD
    use RegistersCustomConcerns;
=======
    use Macroable, RegistersCustomConcerns;
>>>>>>> tundeseun/devtest

    const XLSX     = 'Xlsx';

    const CSV      = 'Csv';

    const TSV      = 'Csv';

    const ODS      = 'Ods';

    const XLS      = 'Xls';

    const SLK      = 'Slk';

    const XML      = 'Xml';

    const GNUMERIC = 'Gnumeric';

    const HTML     = 'Html';

    const MPDF     = 'Mpdf';

    const DOMPDF   = 'Dompdf';

    const TCPDF    = 'Tcpdf';

    /**
     * @var Writer
     */
    protected $writer;

    /**
     * @var QueuedWriter
     */
    protected $queuedWriter;

    /**
     * @var Filesystem
     */
    protected $filesystem;

    /**
     * @var Reader
     */
    private $reader;

    /**
     * @param  Writer  $writer
     * @param  QueuedWriter  $queuedWriter
     * @param  Reader  $reader
     * @param  Filesystem  $filesystem
     */
    public function __construct(
        Writer $writer,
        QueuedWriter $queuedWriter,
        Reader $reader,
        Filesystem $filesystem
    ) {
        $this->writer       = $writer;
        $this->reader       = $reader;
        $this->filesystem   = $filesystem;
        $this->queuedWriter = $queuedWriter;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function download($export, string $fileName, string $writerType = null, array $headers = [])
=======
    public function download($export, string $fileName, ?string $writerType = null, array $headers = [])
>>>>>>> tundeseun/devtest
    {
        // Clear output buffer to prevent stuff being prepended to the Excel output.
        if (ob_get_length() > 0) {
            ob_end_clean();
            ob_start();
        }

        return response()->download(
            $this->export($export, $fileName, $writerType)->getLocalPath(),
            $fileName,
            $headers
        )->deleteFileAfterSend(true);
    }

    /**
     * {@inheritdoc}
     *
     * @param  string|null  $disk  Fallback for usage with named properties
     */
<<<<<<< HEAD
    public function store($export, string $filePath, string $diskName = null, string $writerType = null, $diskOptions = [], string $disk = null)
=======
    public function store($export, string $filePath, ?string $diskName = null, ?string $writerType = null, $diskOptions = [], ?string $disk = null)
>>>>>>> tundeseun/devtest
    {
        if ($export instanceof ShouldQueue) {
            return $this->queue($export, $filePath, $diskName ?: $disk, $writerType, $diskOptions);
        }

        $temporaryFile = $this->export($export, $filePath, $writerType);

        $exported = $this->filesystem->disk($diskName ?: $disk, $diskOptions)->copy(
            $temporaryFile,
            $filePath
        );

        $temporaryFile->delete();

        return $exported;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function queue($export, string $filePath, string $disk = null, string $writerType = null, $diskOptions = [])
=======
    public function queue($export, string $filePath, ?string $disk = null, ?string $writerType = null, $diskOptions = [])
>>>>>>> tundeseun/devtest
    {
        $writerType = FileTypeDetector::detectStrict($filePath, $writerType);

        return $this->queuedWriter->store(
            $export,
            $filePath,
            $disk,
            $writerType,
            $diskOptions
        );
    }

    /**
     * {@inheritdoc}
     */
    public function raw($export, string $writerType)
    {
        $temporaryFile = $this->writer->export($export, $writerType);

        $contents = $temporaryFile->contents();
        $temporaryFile->delete();

        return $contents;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function import($import, $filePath, string $disk = null, string $readerType = null)
=======
    public function import($import, $filePath, ?string $disk = null, ?string $readerType = null)
>>>>>>> tundeseun/devtest
    {
        $readerType = FileTypeDetector::detect($filePath, $readerType);
        $response   = $this->reader->read($import, $filePath, $readerType, $disk);

        if ($response instanceof PendingDispatch) {
            return $response;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function toArray($import, $filePath, string $disk = null, string $readerType = null): array
=======
    public function toArray($import, $filePath, ?string $disk = null, ?string $readerType = null): array
>>>>>>> tundeseun/devtest
    {
        $readerType = FileTypeDetector::detect($filePath, $readerType);

        return $this->reader->toArray($import, $filePath, $readerType, $disk);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function toCollection($import, $filePath, string $disk = null, string $readerType = null): Collection
=======
    public function toCollection($import, $filePath, ?string $disk = null, ?string $readerType = null): Collection
>>>>>>> tundeseun/devtest
    {
        $readerType = FileTypeDetector::detect($filePath, $readerType);

        return $this->reader->toCollection($import, $filePath, $readerType, $disk);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function queueImport(ShouldQueue $import, $filePath, string $disk = null, string $readerType = null)
=======
    public function queueImport(ShouldQueue $import, $filePath, ?string $disk = null, ?string $readerType = null)
>>>>>>> tundeseun/devtest
    {
        return $this->import($import, $filePath, $disk, $readerType);
    }

    /**
     * @param  object  $export
     * @param  string|null  $fileName
     * @param  string  $writerType
     * @return TemporaryFile
     *
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
<<<<<<< HEAD
    protected function export($export, string $fileName, string $writerType = null): TemporaryFile
=======
    protected function export($export, string $fileName, ?string $writerType = null): TemporaryFile
>>>>>>> tundeseun/devtest
    {
        $writerType = FileTypeDetector::detectStrict($fileName, $writerType);

        return $this->writer->export($export, $writerType);
    }
}
