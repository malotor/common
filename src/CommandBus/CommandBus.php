<?php

namespace malotor\Common\CommandBus;

class CommandBus
{
    private $commandHandlers = [];

    public function handle($aCommand)
    {
        $anUnderscoredCommandClass = get_class($aCommand);

        if (!isset($this->commandHandlers[$anUnderscoredCommandClass])) {
            throw new HandlerNotFoundException(get_class($aCommand));
        }

        $aCommandHandler = $this->commandHandlers[$anUnderscoredCommandClass];
        $aCommandHandler->handle($aCommand);
    }

    public function register($aCommandHandler)
    {
        $aCommandClass = str_replace(
            [
                'Handler',
            ],
            [
                'Command',
            ],
            get_class($aCommandHandler)
        );

        $this->commandHandlers[$aCommandClass] = $aCommandHandler;
    }
}