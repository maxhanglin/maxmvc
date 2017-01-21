<?php

class BaseModel {
	
	public function __get($property) {
        if (property_exists($this, "_".$property)) {
        	$reflection = new ReflectionProperty($this, "_".$property);
	        $reflection->setAccessible("_".$property);
	        return $reflection->getValue($this);
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, "_".$property)) {
        	$reflection = new ReflectionProperty($this, "_".$property);
	        $reflection->setAccessible("_".$property);
	        $reflection->setValue($this, $value);
        }
    }

}