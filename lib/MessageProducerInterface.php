<?php

namespace Magium\Messaging;

interface MessageProducerInterface
{

    public function send(MessageInterface $message);

}
