<?php

namespace malotor\Common\Events;



class StoredEvent implements DomainEvent
{
    /**
     * @var int
     */
    private $eventId;

    /**
     * @var string
     */
    private $eventBody;

    /**
     * @var \DateTimeInmutable
     */
    private $occurredOn;

    /**
     * @var string
     */
    private $typeName;

    /**
     * @param string $aTypeName
     * @param \DateTimeInmutable $anOccurredOn
     * @param string $anEventBody
     */
    public function __construct($aTypeName, \DateTimeInmutable $anOccurredOn, $anEventBody)
    {
        $this->eventBody = $anEventBody;
        $this->typeName = $aTypeName;
        $this->occurredOn = $anOccurredOn;
    }

    /**
     * @return string
     */
    public function eventBody()
    {
        return $this->eventBody;
    }

    /**
     * @return int
     */
    public function eventId()
    {
        return $this->eventId;
    }

    /**
     * @return string
     */
    public function typeName()
    {
        return $this->typeName;
    }

    /**
     * @return \DateTimeInmutable
     */
    public function occurredOn()
    {
        return $this->occurredOn;
    }
}
