<?php

declare(strict_types=1);

namespace Termwind;

use Closure;
use Symfony\Component\Console\Output\OutputInterface;
use Termwind\Repositories\Styles as StyleRepository;
use Termwind\ValueObjects\Style;
use Termwind\ValueObjects\Styles;

if (! function_exists('Termwind\renderUsing')) {
    /**
     * Sets the renderer implementation.
     */
<<<<<<< HEAD
    function renderUsing(OutputInterface|null $renderer): void
=======
    function renderUsing(?OutputInterface $renderer): void
>>>>>>> tundeseun/devtest
    {
        Termwind::renderUsing($renderer);
    }
}

if (! function_exists('Termwind\style')) {
    /**
     * Creates a new style.
     *
<<<<<<< HEAD
     * @param (Closure(Styles $renderable, string|int ...$arguments): Styles)|null $callback
     */
    function style(string $name, Closure $callback = null): Style
=======
     * @param  (Closure(Styles $renderable, string|int ...$arguments): Styles)|null  $callback
     */
    function style(string $name, ?Closure $callback = null): Style
>>>>>>> tundeseun/devtest
    {
        return StyleRepository::create($name, $callback);
    }
}

if (! function_exists('Termwind\render')) {
    /**
     * Render HTML to a string.
     */
    function render(string $html, int $options = OutputInterface::OUTPUT_NORMAL): void
    {
        (new HtmlRenderer)->render($html, $options);
    }
}

if (! function_exists('Termwind\terminal')) {
    /**
     * Returns a Terminal instance.
     */
    function terminal(): Terminal
    {
        return new Terminal;
    }
}

if (! function_exists('Termwind\ask')) {
    /**
     * Renders a prompt to the user.
     *
     * @param  iterable<array-key, string>|null  $autocomplete
     */
<<<<<<< HEAD
    function ask(string $question, iterable $autocomplete = null): mixed
=======
    function ask(string $question, ?iterable $autocomplete = null): mixed
>>>>>>> tundeseun/devtest
    {
        return (new Question)->ask($question, $autocomplete);
    }
}
