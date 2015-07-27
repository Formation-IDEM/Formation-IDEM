<?php
namespace Core\Tables;

/**
 * Class setCollection
 * @package Core\Tables
 */
class setCollection extends Collection
{
    public function insert($data)
    {
        $sql = 'INSERT INTO ' . $this->collection . ' SET ';

        $count = 0;
        foreach( $data as $key => $value )
        {
            $sql .= $key . ' = ' . $value;
            if( $count < (count($data) - 1) )
            {
                $sql .= ', ';
            }
            $count++;
        }

        echo $sql;
    }
}