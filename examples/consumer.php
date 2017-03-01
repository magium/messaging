<?php

class DoSomeConsuming implements \Magium\Messaging\ExceptionListenerInterface
{

    protected $connectionFactory;

    public function __construct(
        \Magium\Messaging\ConnectionFactoryInterface $factory
    )
    {
        $this->connectionFactory = $factory;
    }

    public function onException(\Magium\Messaging\MessagingException $e)
    {
        echo 'Oh well ¯\_(ツ)_/¯ : ' . $e->getMessage();
        die();
    }

    public function run()
    {
        $connection = $this->connectionFactory->createConnection();
        $connection->setExceptionListener($this);

        $session = $connection->createSession();
        $destination = $session->createQueue('some queue');

        $consumer = $session->createConsumer($destination);

        $message = $consumer->receive();

        echo $message->getText();
    }

}
