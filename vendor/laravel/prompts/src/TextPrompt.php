<?php

namespace Laravel\Prompts;

<<<<<<< HEAD
=======
use Closure;

>>>>>>> tundeseun/devtest
class TextPrompt extends Prompt
{
    use Concerns\TypedValue;

    /**
     * Create a new TextPrompt instance.
     */
    public function __construct(
        public string $label,
        public string $placeholder = '',
        public string $default = '',
        public bool|string $required = false,
        public mixed $validate = null,
        public string $hint = '',
<<<<<<< HEAD
=======
        public ?Closure $transform = null,
>>>>>>> tundeseun/devtest
    ) {
        $this->trackTypedValue($default);
    }

    /**
     * Get the entered value with a virtual cursor.
     */
    public function valueWithCursor(int $maxWidth): string
    {
        if ($this->value() === '') {
            return $this->dim($this->addCursor($this->placeholder, 0, $maxWidth));
        }

        return $this->addCursor($this->value(), $this->cursorPosition, $maxWidth);
    }
}
