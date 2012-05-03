<?php
/**
 * Copyright © 2012 Online Buddies, Inc. - All Rights Reserved
 *
 * @package Modyllic
 * @author bturner@online-buddies.com
 */

class Modyllic_Compound extends Modyllic_String {
    public $values;
    function clone_from(Modyllic_Type $old) {
        parent::clone_from($old);
        $this->values = $old->values;
    }
    function to_sql(Modyllic_Type $other=null) {
        $sql = $this->name . "(";
        $valuec = 0;
        foreach ( $this->values as $value ) {
            if ( $valuec ++ ) {
                $sql .= ",";
            }
            $sql .= $value;
        }
        $sql .= ")";
        $sql .= $this->charset_collation($other);
        return $sql;
    }
}
