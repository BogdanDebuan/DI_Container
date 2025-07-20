<?php

namespace Psr\Container;

interface ContainerInterface
{
    public function get($service);
}