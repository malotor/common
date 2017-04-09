<?php

namespace malotor\Common\Messaging;

use PhpAmqpLib\Message\AMQPMessage;

class RabbitMqMessageReceiver extends RabbitMqMessaging
{

    private $listennerId;
    /**
     * @return mixed
     */
    public function getListennerId()
    {
        return $this->listennerId;
    }

    /**
     * @param mixed $listennerId
     */
    public function setListennerId($listennerId)
    {
        $this->listennerId = $listennerId;
    }


    /**
     * Listen from a Exchange and send messages body to a MessageProcessor
     * @param $exchangeName
     * @param MessageProcessor $handler
     */
    public function listen( MessageProcessor $handler )
    {

        $exchangeName = $this->exchangeName;

        $callback = function($msg) use ($handler) {

            $this->logger->info("Message received", ['msg' => $msg->body] );

            $handler->process($msg->body);

            $this->logger->info("Message done", ['msg' => $msg->body] );

            $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
        };


        $this->logger->info("Thread  {$this->getListennerId()} waiting for messages. ");

        $this->channel($exchangeName)->basic_qos(null, 1, null);
        $this->channel($exchangeName)->basic_consume($exchangeName, $this->getListennerId(), false, false, false, false, $callback);
        while(count($this->channel($exchangeName)->callbacks)) {
          $this->channel($exchangeName)->wait();
        }

        $this->logger->info("Thread  {$this->getListennerId()} close. ");
        $this->close();

    }

}
