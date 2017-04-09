<?php

namespace malotor\Common\Messaging;

interface MessageProducer
{
    public function send(Message $message);
}
