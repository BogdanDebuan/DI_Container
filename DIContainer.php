<?php
namespace Psr\Container;
Class DIContainer implements ContainerInterface
{

    public function get($service)
    {
        $refcl = new \ReflectionClass($service);

        if(! $refmethod = $refcl->getConstructor()){
            return new $service();
        }

        $args = [];
        foreach ($refmethod->getParameters() as $parameter){
            $arg = $parameter->getType()->getName();

            $args[] = self::get($arg);
        }

        return new $service(...$args);
    }
}
