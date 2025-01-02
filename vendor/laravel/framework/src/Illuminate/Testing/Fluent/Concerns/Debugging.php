<?php

namespace Illuminate\Testing\Fluent\Concerns;

trait Debugging
{
    /**
     * Dumps the given props.
     *
     * @param  string|null  $prop
     * @return $this
     */
<<<<<<< HEAD
    public function dump(string $prop = null): self
=======
    public function dump(?string $prop = null): self
>>>>>>> tundeseun/devtest
    {
        dump($this->prop($prop));

        return $this;
    }

    /**
     * Dumps the given props and exits.
     *
     * @param  string|null  $prop
     * @return never
     */
<<<<<<< HEAD
    public function dd(string $prop = null): void
=======
    public function dd(?string $prop = null): void
>>>>>>> tundeseun/devtest
    {
        dd($this->prop($prop));
    }

    /**
     * Retrieve a prop within the current scope using "dot" notation.
     *
     * @param  string|null  $key
     * @return mixed
     */
<<<<<<< HEAD
    abstract protected function prop(string $key = null);
=======
    abstract protected function prop(?string $key = null);
>>>>>>> tundeseun/devtest
}
