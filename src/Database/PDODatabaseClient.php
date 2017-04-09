<?php

namespace malotor\Common\Database;

class PDODatabaseClient implements DatabaseClient
{

    protected $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function select($sql, $args)
    {

        $sth = $this->connection->prepare($sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY]);

        $execSQL = $sth->execute($args);

        if (($execSQL === FALSE) || (is_null($execSQL))) {
            throw new DatabaseClientException($sql);
        }

        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);

        return $result;

    }


    public function modify($sql, $args)
    {

        $sth = $this->connection->prepare($sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY]);

        $execSQL = $sth->execute($args);

        if (($execSQL === FALSE) || (is_null($execSQL))) {
            throw new DatabaseClientException($sql);
        }

        return $sth->rowCount();

    }
}