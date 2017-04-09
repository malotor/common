<?php

namespace malotor\Common\Database;


class DatabaseClientException extends \Exception
{
    public function __construct($sql, $code = 0, Exception $previous = null)
    {
        $message = "Error executing SQL: " . $sql;

        parent::__construct($message, $code, $previous);
    }

}