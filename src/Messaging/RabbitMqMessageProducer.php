<?php

namespace malotor\Common\Messaging;

use PhpAmqpLib\Message\AMQPMessage;

class RabbitMqMessageProducer extends RabbitMqMessaging implements MessageProducer
{
    public function send(Message $message)
    {
        $exchangeName = $this->exchangeName;
        try {
            $messageBody = $message->getBody();
            $AMQPMessage = new AMQPMessage(
                $messageBody->toString(),
                [
                    'delivery_mode' => 2,
                    'priority' => $message->getPriority(),
                ]
            );
            $this->channel($exchangeName)->basic_publish($AMQPMessage, "", $exchangeName);
        } catch (\Exception $ex) {
            throw new \Exception('Error in message producer' . $ex->getMessage());
        }
    }
}