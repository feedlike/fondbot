<?php

declare(strict_types=1);

namespace Tests\Classes;

use FondBot\Contracts\Container;

class TestContainer implements Container
{
    private $binds = [];

    /**
     * Register a binding with the container.
     *
     * @param string|array         $abstract
     * @param \Closure|string|null $concrete
     */
    public function bind($abstract, $concrete = null): void
    {
        $this->binds[$abstract] = $concrete;
    }

    /**
     * Register a shared binding in the container.
     *
     * @param string|array         $abstract
     * @param \Closure|string|null $concrete
     */
    public function singleton($abstract, $concrete = null): void
    {
        $this->binds[$abstract] = $concrete;
    }

    /**
     * Resolve the given type from the container.
     *
     * @param string $abstract
     *
     * @return mixed
     */
    public function make(string $abstract)
    {
        $instance = $this->binds[$abstract];

        if ($instance instanceof \Closure) {
            return $instance();
        }

        return $instance;
    }
}
