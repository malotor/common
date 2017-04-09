<?php

namespace malotor\Common\Events;

interface EventStore
{
    public function append(DomainEvent $event);
}