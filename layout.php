<?php

class ParentClass
{
    public function methode1()
    {
        echo 'Je suis dans ParentClass';
    }
    public function methode2()
    {
    }
    public function methode3()
    {
    }
}

class ChildClass extends ParentClass
{

    public function methode1()
    {
        echo 'Je suis dans ChildClass';
    }
}

$obj = new ChildClass();

$obj->methode1();
