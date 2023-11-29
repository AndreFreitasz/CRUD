<?php

namespace Core;

abstract class Config
{
    protected function configAdm()
    {
       define('URL', 'http://localhost/crud/');
       define('URLADM', 'http://localhost/crud/adm/');

       define('CONTROLLER', 'Login');
       define('METODO', 'index');
       define('CONTROLLERERRO', 'Login');
    }
}