<?php

namespace App\Transformers;

use ArrayAccess;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use JsonSerializable;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;

abstract class BaseTransformer implements Arrayable, ArrayAccess, JsonSerializable
{
    /**
     * 驗證傳入的函數是否為有效的 getter。
     * 
     * @param string|ReflectionMethod $method 函數實體或函數名稱字串。
     * @return ReflectionMethod|null 函數有效時回傳函數實體，無效時回傳 null。
     */
    private function getValidGetter($method) {
        if (is_string($method)) {
            try {
                $method = new ReflectionMethod(static::class, $method);
            } catch (ReflectionException) {
                // 找不到指定名稱函數時，視為無效。
                return null;
            }
        }
        if ( ! $method->isPublic() ||
            $method->isStatic() ||
            ! preg_match('/^get([A-Z][a-zA-Z0-9]*)$/', $method->getName()) ||
            $method->getNumberOfRequiredParameters() <> 0) {
            return null;
        }
        return $method;
    }

    /**
     * @return array
     */
    public function toArray() {
        $class = new ReflectionClass(static::class);
        /** @var Collection<int, ReflectionMethod> $allMethods */
        $allMethods = collect($class->getMethods(ReflectionMethod::IS_PUBLIC));
        $allMethods = $allMethods->filter(function ($value, $key) {
            return $this->getValidGetter($value);
        });
        $results = [];
        foreach ($allMethods as $method) {
            $matches = [];
            preg_match('/^get([A-Z][a-zA-Z0-9]*)$/', $method->getName(), $matches);
            $propertyName = Str::snake($matches[1]);
            $results[$propertyName] = $method->invoke($this);
        }
        return $results;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset($name) {
        return $this->offsetExists($name);
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset) {
        return ! is_null($this->offsetGet($offset));
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name) {
        return $this->offsetGet($name);
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset) {
        $methodName = 'get' . Str::studly($offset);
        return $this->getValidGetter($methodName)?->invoke($this);
    }

    public function offsetSet($offset, $value) {
        // TODO:
    }

    public function offsetUnset($offset) {
        // TODO:
    }

    /**
     * @return array
     */
    public function jsonSerialize() {
        return $this->toArray();
    }
}
