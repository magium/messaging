<?php

namespace Magium\Messaging;

interface ExceptionListenerInterface
{

    public function onException(MessagingException $e);

}
