<?php
namespace Application\Models\Entities;
abstract class Entity {
	public function __get($name)
	{
		//comprobamos si la propiedad existe en la clase:
		if (property_exists($this, $name)) {
			return $this->{$name};
		}
	}
	public function __set($name, $value)
	{
		if (property_exists($this, $name)) {
			$this->{$name} = $value;
		}
	}
}