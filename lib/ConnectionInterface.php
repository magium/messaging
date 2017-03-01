<?php

namespace Magium\Messaging;

interface ConnectionInterface
{

    public function setExceptionListener(ExceptionListenerInterface $listener);

    /**
     * @return SessionInterface
     */

    public function createSession();

    public function connect();

}
