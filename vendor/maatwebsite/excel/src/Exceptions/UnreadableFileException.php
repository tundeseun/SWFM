<?php

namespace Maatwebsite\Excel\Exceptions;

use Exception;
use Throwable;

class UnreadableFileException extends Exception implements LaravelExcelException
{
    /**
     * @param  string  $message
     * @param  int  $code
     * @param  Throwable|null  $previous
     */
    public function __construct(
        $message = 'File could not be read',
        $code = 0,
<<<<<<< HEAD
        Throwable $previous = null
=======
        ?Throwable $previous = null
>>>>>>> tundeseun/devtest
    ) {
        parent::__construct($message, $code, $previous);
    }
}
