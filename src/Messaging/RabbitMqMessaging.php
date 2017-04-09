<?php

namespace malotor\Common\Messaging;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use Psr\Log\LoggerInterface;

abstract class RabbitMqMessaging
{
    protected $connection;
    protected $channel;
    protected $logger;
    protected $exchangeName;

    public function __construct($exchangeName, AMQPStreamConnection $aConnection, LoggerInterface $logger)
    {
        $this->connection = $aConnection;
        $this->channel = null;
        $this->logger = $logger;
        $this->exchangeName = $exchangeName;
    }

    private function connect($exchangeName)
    {
        if (null !== $this->channel) {
            return;
        }

        $channel = $this->connection->channel();
        //$channel->exchange_declare($exchangeName, 'fanout', false, true, false);
        //$channel->queue_declare($exchangeName, false, true, false, false);
        //$channel->queue_bind($exchangeName, $exchangeName);

        $this->channel = $channel;
    }

    public function open($exchangeName)
    {

    }

    protected function channel($exchangeName)
    {
        $this->connect($exchangeName);
        return $this->channel;
    }

    public function close($exchangeName = '')
    {
        $this->channel->close();
        $this->connection->close();
    }
}
