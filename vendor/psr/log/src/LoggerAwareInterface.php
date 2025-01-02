<?php

namespace Psr\Log;

/**
 * Describes a logger-aware instance.
 */
interface LoggerAwareInterface
{
    /**
     * Sets a logger instance on the object.
<<<<<<< HEAD
     *
     * @param LoggerInterface $logger
     *
     * @return void
=======
>>>>>>> tundeseun/devtest
     */
    public function setLogger(LoggerInterface $logger): void;
}
