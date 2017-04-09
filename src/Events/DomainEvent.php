<?php

namespace malotor\Common\Events;


interface DomainEvent
{
    /**
     * @return \DateTimeImmutable
     */
    public function occurredOn();

}
