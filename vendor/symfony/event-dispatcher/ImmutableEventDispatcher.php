<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\EventDispatcher;

/**
 * A read-only proxy for an event dispatcher.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class ImmutableEventDispatcher implements EventDispatcherInterface
{
<<<<<<< HEAD
    private EventDispatcherInterface $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
=======
    public function __construct(
        private EventDispatcherInterface $dispatcher,
    ) {
>>>>>>> tundeseun/devtest
    }

    public function dispatch(object $event, ?string $eventName = null): object
    {
        return $this->dispatcher->dispatch($event, $eventName);
    }

<<<<<<< HEAD
    /**
     * @return never
     */
    public function addListener(string $eventName, callable|array $listener, int $priority = 0)
=======
    public function addListener(string $eventName, callable|array $listener, int $priority = 0): never
>>>>>>> tundeseun/devtest
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

<<<<<<< HEAD
    /**
     * @return never
     */
    public function addSubscriber(EventSubscriberInterface $subscriber)
=======
    public function addSubscriber(EventSubscriberInterface $subscriber): never
>>>>>>> tundeseun/devtest
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

<<<<<<< HEAD
    /**
     * @return never
     */
    public function removeListener(string $eventName, callable|array $listener)
=======
    public function removeListener(string $eventName, callable|array $listener): never
>>>>>>> tundeseun/devtest
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

<<<<<<< HEAD
    /**
     * @return never
     */
    public function removeSubscriber(EventSubscriberInterface $subscriber)
=======
    public function removeSubscriber(EventSubscriberInterface $subscriber): never
>>>>>>> tundeseun/devtest
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

    public function getListeners(?string $eventName = null): array
    {
        return $this->dispatcher->getListeners($eventName);
    }

    public function getListenerPriority(string $eventName, callable|array $listener): ?int
    {
        return $this->dispatcher->getListenerPriority($eventName, $listener);
    }

    public function hasListeners(?string $eventName = null): bool
    {
        return $this->dispatcher->hasListeners($eventName);
    }
}
