<?php

namespace Magium\Messaging;

interface ConnectionFactoryInterface
{

    /**
     * @return ConnectionInterface;
     */

    public function createConnection();

}
