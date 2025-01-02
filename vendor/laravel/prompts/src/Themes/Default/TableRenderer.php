<?php

namespace Laravel\Prompts\Themes\Default;

use Laravel\Prompts\Output\BufferedConsoleOutput;
use Laravel\Prompts\Table;
use Symfony\Component\Console\Helper\Table as SymfonyTable;
use Symfony\Component\Console\Helper\TableStyle;

class TableRenderer extends Renderer
{
    /**
     * Render the table.
     */
    public function __invoke(Table $table): string
    {
<<<<<<< HEAD
        $tableStyle = (new TableStyle())
=======
        $tableStyle = (new TableStyle)
>>>>>>> tundeseun/devtest
            ->setHorizontalBorderChars('─')
            ->setVerticalBorderChars('│', '│')
            ->setCellHeaderFormat($this->dim('<fg=default>%s</>'))
            ->setCellRowFormat('<fg=default>%s</>');

        if (empty($table->headers)) {
            $tableStyle->setCrossingChars('┼', '', '', '', '┤', '┘</>', '┴', '└', '├', '<fg=gray>┌', '┬', '┐');
        } else {
            $tableStyle->setCrossingChars('┼', '<fg=gray>┌', '┬', '┐', '┤', '┘</>', '┴', '└', '├');
        }

<<<<<<< HEAD
        $buffered = new BufferedConsoleOutput();
=======
        $buffered = new BufferedConsoleOutput;
>>>>>>> tundeseun/devtest

        (new SymfonyTable($buffered))
            ->setHeaders($table->headers)
            ->setRows($table->rows)
            ->setStyle($tableStyle)
            ->render();

        collect(explode(PHP_EOL, trim($buffered->content(), PHP_EOL)))
            ->each(fn ($line) => $this->line(' '.$line));

        return $this;
    }
}
