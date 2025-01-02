<?php

namespace Spatie\Backtrace;

use Spatie\Backtrace\CodeSnippets\CodeSnippet;
use Spatie\Backtrace\CodeSnippets\FileSnippetProvider;
use Spatie\Backtrace\CodeSnippets\LaravelSerializableClosureSnippetProvider;
use Spatie\Backtrace\CodeSnippets\NullSnippetProvider;
use Spatie\Backtrace\CodeSnippets\SnippetProvider;

class Frame
{
    /** @var string */
    public $file;

<<<<<<< HEAD
=======
    /** @var string|null */
    public $trimmedFilePath;

>>>>>>> tundeseun/devtest
    /** @var int */
    public $lineNumber;

    /** @var array|null */
    public $arguments = null;

    /** @var bool */
    public $applicationFrame;

    /** @var string|null */
    public $method;

    /** @var string|null */
    public $class;

    /** @var string|null */
    protected $textSnippet;

    public function __construct(
        string $file,
        int $lineNumber,
        ?array $arguments,
<<<<<<< HEAD
        string $method = null,
        string $class = null,
        bool $isApplicationFrame = false,
        ?string $textSnippet = null
    ) {
        $this->file = $file;

=======
        ?string $method = null,
        ?string $class = null,
        bool $isApplicationFrame = false,
        ?string $textSnippet = null,
        ?string $trimmedFilePath = null
    ) {
        $this->file = $file;

        $this->trimmedFilePath = $trimmedFilePath;

>>>>>>> tundeseun/devtest
        $this->lineNumber = $lineNumber;

        $this->arguments = $arguments;

        $this->method = $method;

        $this->class = $class;

        $this->applicationFrame = $isApplicationFrame;

        $this->textSnippet = $textSnippet;
    }

    public function getSnippet(int $lineCount): array
    {
        return (new CodeSnippet())
            ->surroundingLine($this->lineNumber)
            ->snippetLineCount($lineCount)
            ->get($this->getCodeSnippetProvider());
    }

    public function getSnippetAsString(int $lineCount): string
    {
        return (new CodeSnippet())
            ->surroundingLine($this->lineNumber)
            ->snippetLineCount($lineCount)
            ->getAsString($this->getCodeSnippetProvider());
    }

    public function getSnippetProperties(int $lineCount): array
    {
        $snippet = $this->getSnippet($lineCount);

        return array_map(function (int $lineNumber) use ($snippet) {
            return [
                'line_number' => $lineNumber,
                'text' => $snippet[$lineNumber],
            ];
        }, array_keys($snippet));
    }

    protected function getCodeSnippetProvider(): SnippetProvider
    {
<<<<<<< HEAD
        if($this->textSnippet) {
            return new LaravelSerializableClosureSnippetProvider($this->textSnippet);
        }

        if(file_exists($this->file)) {
=======
        if ($this->textSnippet) {
            return new LaravelSerializableClosureSnippetProvider($this->textSnippet);
        }

        if (file_exists($this->file)) {
>>>>>>> tundeseun/devtest
            return new FileSnippetProvider($this->file);
        }

        return new NullSnippetProvider();
    }
}
