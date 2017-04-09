<?php

namespace malotor\Common\Database;

use Psr\Log\LoggerInterface;

class LoggerPDODatabaseClient implements DatabaseClient
{
    private $client;
    private $logger;

    /**
     * LoggerPDODatabaseClient constructor.
     *
     * @param $client
     * @param $logger
     */
    public function __construct(DatabaseClient $client, LoggerInterface $logger)
    {
        $this->client = $client;
        $this->logger = $logger;
    }


    public function select($sql, $args)
    {
        $this->logger->debug("Prepare SELECT SQL", ['sql' => $sql, 'args' => $args]);

        return $this->client->select($sql, $args);
    }

    public function modify($sql, $args)
    {
        if (isset($this->logger)) $this->logger->debug("Prepare INSERT SQL", ['sql' => $sql, 'args' => $args]);

        return $this->client->modify($sql, $args);

    }
}