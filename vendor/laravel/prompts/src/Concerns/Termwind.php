<?php

namespace Laravel\Prompts\Concerns;

use Laravel\Prompts\Output\BufferedConsoleOutput;

use function Termwind\render;
use function Termwind\renderUsing;

trait Termwind
{
    protected function termwind(string $html)
    {
<<<<<<< HEAD
        renderUsing($output = new BufferedConsoleOutput());
=======
        renderUsing($output = new BufferedConsoleOutput);
>>>>>>> tundeseun/devtest

        render($html);

        return $this->restoreEscapeSequences($output->fetch());
    }

    protected function restoreEscapeSequences(string $string)
    {
        return preg_replace('/\[(\d+)m/', "\e[".'\1m', $string);
    }
}
