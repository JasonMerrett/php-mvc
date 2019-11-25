<?php

namespace App\Core;

abstract class Model {
    protected $attributes = [];
    
    public function __construct($attributes = []) {
        $this->populate($attributes);
    }

    public function populate($attributes) {
        foreach($attributes as $key => $value) {
            $this->attributes[$key] = $value;
        }

        return $this;
    }

    public function __get($key)
    {
        if(array_key_exists($key, $this->attributes)) {
            return $this->attributes[$key];
        } else {
            return null;
        }
    }

    public function __set($key, $value)
    {
        $this->attributes[$key] = $value;
    }
}