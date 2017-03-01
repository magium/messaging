<?php

namespace Magium\Messaging;

interface MessageConsumerInterface
{

    /**
     * @param null $timeout
     * @return MessageInterface|null
     */

    public function receive($timeout = null);

}
