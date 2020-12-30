<?php

namespace LuBan\Pop\Interfaces;

use LuBan\Pop\Exceptions\ParameterException;

interface Oauth2Request
{

    public function getGateway();

    public function getApiParas();

    /**
     * @throws ParameterException
     */
    public function check();

}