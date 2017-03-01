# Currently just an experiment in messaging

This library consists only of interfaces.  There is no functionality in it.  It is intended to be used as a means of allowing PHP developers to build messaging-based applications without committing to a specific messaging platform.  The platform libraries would need to implement the actual implementation.  The **only** purpose of this library is to define consistent usage across libraries.

This borrows **very** heavily from the JMS standard, though is much smaller.

How would you use this?

## As a consumer

```
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

```

When you create an instance of this class you would need to provide your messaging library's factory.  From there on out it should work exactly the same.

## As a producer

```
<?php

class DoSomeproducing implements \Magium\Messaging\ExceptionListenerInterface
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

        $producer = $session->createProducer($destination);

        $message = $session->createTextMessage('This is some text');

        $producer->send($message);
    }

}

```
