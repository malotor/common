<?php

namespace malotor\Common\Database;

interface DatabaseClient
{
    public function select($sql, $args);
    public function modify($sql, $args);
}