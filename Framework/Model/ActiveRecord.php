<?php

namespace Framework\Model;

/**
 * ActiveRecord class.
 *
 * @package Exception
 * @author Jura Zubach
 * @since 1.0
 */
class ActiveRecord
{

    protected $table;
    protected $key_field_name = 'id';


    public function find()
    {
        //... command change
    }

    public function save()
    {
        $fields = get_object_vars($this);

        $coulmns = '';// Get column names for $table;
        foreach($coulmns as $col =>$value)
        {
            /*if( array_key_exists()){
                $sql_part .= sprintf(' `%s`=%s'. $col, $fields[$col]);}
            $sql .= 'WHERE' . $this->key_field_name.'='.$this-> ??? ;

            implode(','. $sql_part);*/
        }

    }

    public function getRules()
    {

    }

}
