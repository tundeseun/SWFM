<?php

namespace Psr\Log;

/**
 * Basic Implementation of LoggerAwareInterface.
 */
trait LoggerAwareTrait
{
    /**
     * The logger instance.
<<<<<<< HEAD
     *
     * @var LoggerInterface|null
=======
>>>>>>> tundeseun/devtest
     */
    protected ?LoggerInterface $logger = null;

    /**
     * Sets a logger.
<<<<<<< HEAD
     *
     * @param LoggerInterface $logger
=======
>>>>>>> tundeseun/devtest
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }
}
