<?php
    use App\Connection;
    use App\QueryBuilder;

    return new QueryBuilder(Connection::make("test"));