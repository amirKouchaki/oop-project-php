<?php


namespace app\config;

class Database
{
    private const HOST = 'localhost';
    private const USERNAME = 'root';
    private const PASSWORD = '';
    private const DATABASE_TYPE = 'mysql';
    private const DATABASE_NAME = 'oop-project-php';
    public static \PDO $connection;

    public static function connect(): \PDO
    {
        if (!isset(self::$connection)) {
            try {
                self::$connection = new \PDO(
                    self::DATABASE_TYPE . ':host=' . self::HOST .';dbname='. self::DATABASE_NAME,
                    self::USERNAME,
                    self::PASSWORD
                );
                self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                self::$connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            } catch (\Exception $e) {
                echo $e;
            }
            return self::$connection;
        }

        return self::$connection;
    }


}