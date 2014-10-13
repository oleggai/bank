<?php
/**
 * Created by PhpStorm.
 * User: Matrix
 * Date: 29.07.14
 * Time: 11:51
 * @description singleton for database connection
 */

final class Connection {


    /**
     * @var PDO
     */
    private static $conn;

    private function __construct(){}

    /**
     * @return PDO
     */
    public static function getConnection(){
        if(self::$conn === null){
            self::$conn = self::connect();
        }

        return self::$conn;
    }

    /**
     * Open the database connection with the credentials from application/config/config.php
     * @return PDO
     */
    private static function connect(){
        // set the (optional) options of the PDO connection. in this case, we set the fetch mode to
        // "objects", which means all results will be objects, like this: $result->user_name !
        // For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
        // @see http://www.php.net/manual/en/pdostatement.fetch.php
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        // generate a database connection, using the PDO connector
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
        return new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);
    }

} 