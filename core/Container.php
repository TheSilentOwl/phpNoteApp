<?php

namespace core;

class Container
{
    private $bindings = [];

    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key)
    {
        // always check for errors (checking if this key actually exists in the array or not)
        if (!key_exists($key, $this->bindings)) {
            throw new \Exception("No matching key as {$key} was found!!!");
        }

        $resolver =  $this->bindings[$key];
        return call_user_func($resolver);
    }
}
