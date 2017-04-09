<?php

namespace malotor\Common\Messaging;

interface MessageProcessor
{
    
    public function process($msg);
}
