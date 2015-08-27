<?php
namespace Core\Database;

/**
 * Class Database
 *
 * @package Core\Database
 */
abstract class Database
{
    protected $db_name;
    protected $db_user;
    protected $db_pass;
    protected $db_host;

    abstract public function __construct($db_name, $db_user, $db_pass, $db_host);

    /**
     * Exécute une requête et retourne un/des résultat(s)
     *
     * @param $statement
     * @param bool|false $one
     * @return mixed
     */
    abstract public function query($statement, $one = false);

    /**
     * Prépare une requête et retourne un/des résultat(s)
     *
     * @param $statement
     * @param $attributes
     * @param bool|false $one
     * @return mixed
     */
    abstract public function prepare($statement, $attributes, $one = false);

    /**
     * Exécute une requête sans retour
     *
     * @param $statement
     * @param $attributes
     * @return mixed
     */
    abstract public function execute($statement, $attributes);

    /**
     * @param string $table
     * @param string $field
     * @param string $where
     * @return mixed
     */
    abstract public function count($table, $field = '*', $where = '');

}