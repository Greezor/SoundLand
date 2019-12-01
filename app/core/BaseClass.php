<?php

namespace app\core;

class BaseClass //Базовый родительский класс сожержащий в себе универсальные методы доступные для наследников
{

    public function __get($name)
    {
        return $this->{"get__$name"}(); //метод возвращения значения свойства объекта
    }

    public function __set($name, $value)
    {
        return $this->{"set__$name"}($value); //метод устанавливающий значение свойства объекта
    }

}
