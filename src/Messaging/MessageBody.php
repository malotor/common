<?php

namespace malotor\Common\Messaging;


class MessageBody
{
    private $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function toString()
    {
        return $this->text;
    }
}