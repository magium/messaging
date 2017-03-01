<?php

namespace Magium\Messaging;

interface SessionInterface
{

    /**
     * Creates a destination
     *
     * @param $name
     * @return DestinationInterface
     */

    public function createQueue($name);

    /**
     * @param $name
     * @return DestinationInterface
     */

    public function createTopic($name);

    /**
     * @param string $text
     * @return MessageInterface
     */

    public function createTextMessage($text);

    /**
     * @param $destination DestinationInterface
     * @return MessageConsumerInterface
     */

    public function createConsumer(DestinationInterface $destination);

    /**
     * @param $destination DestinationInterface
     * @return MessageProducerInterface
     */

    public function createProducer(DestinationInterface $destination);

    public function close();

}
