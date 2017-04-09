<?php

namespace malotor\Common\Messaging;

interface MessageReceiver
{
    public function listen(MessageProcessor $processor);
}
