<?php

namespace Hopher\Rpc;

/**
 * 服务提供者
 */
class Service 
{

    public static function encode()
    {
        $argv = file_get_contents("php://input");
    }
    
}

