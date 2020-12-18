<?php

namespace LuBan\Pop\Interfaces;

use LuBan\Pop\Exceptions\ParameterException;

interface Request
{

    public function getApiMethodName();

    public function getApiParas();

    /**
     * @throws ParameterException
     */
    public function check();

}