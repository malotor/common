<?php

namespace malotor\Common\Messaging;


class Message
{
    private $body;
    private $priority;

    public function __construct(
        MessageBody $body,
        $priority
    ) {
        $this->setPriority($priority);
        $this->setBody($body);
    }

    /**
     * @param MessageBody $body
     */
    private function setBody($body)
    {
        $body->setPriority($this->priority);
        $this->body = $body;
    }

    /**
     * @param mixed $priority
     */
    private function setPriority($priority)
    {
        if ($priority == '') {
            throw new \InvalidArgumentException('priority is required');
        }
        if (!is_numeric($priority)) {
            throw new \InvalidArgumentException('expiration must be numeric');
        }
        $this->priority = $priority;
    }

    /**
     * @return MessageBody
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }
}
