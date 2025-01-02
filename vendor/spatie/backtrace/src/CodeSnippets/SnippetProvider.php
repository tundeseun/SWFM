<?php

namespace Spatie\Backtrace\CodeSnippets;

interface SnippetProvider
{
    public function numberOfLines(): int;

<<<<<<< HEAD
    public function getLine(int $lineNumber = null): string;
=======
    public function getLine(?int $lineNumber = null): string;
>>>>>>> tundeseun/devtest

    public function getNextLine(): string;
}
