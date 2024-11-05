<?php


class Container
{
    private array $services = [];
    public function get(string $class)
    {
        if(!isset($this->services[$class])) {
            return new $class();
        }
        $callback = $this->services[$class];
        return $callback($this);
    }

    public function set(string $class, callable $callback): void
    {
        $this->services[$class] = $callback;
    }


}