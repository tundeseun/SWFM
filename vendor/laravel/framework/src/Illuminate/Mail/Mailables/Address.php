<?php

namespace Illuminate\Mail\Mailables;

class Address
{
    /**
     * The recipient's email address.
     *
     * @var string
     */
    public $address;

    /**
     * The recipient's name.
     *
     * @var string|null
     */
    public $name;

    /**
     * Create a new address instance.
     *
     * @param  string  $address
     * @param  string|null  $name
     * @return void
     */
<<<<<<< HEAD
    public function __construct(string $address, string $name = null)
=======
    public function __construct(string $address, ?string $name = null)
>>>>>>> tundeseun/devtest
    {
        $this->address = $address;
        $this->name = $name;
    }
}
