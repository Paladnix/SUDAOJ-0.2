<?php

class ProblemModel extends Model {

    public function add( $data ){

        $sql = sprintf("insert into `%s` %s", $this->_table, $this->formatInsert($data));

        return $this->querySQL($sql);
    }

    public function select($data){

        $sql = sprintf("select * from `%s` where %s", $this->_table, $this->formatWhere($data));

        return $this->selectSQL($sql);
    }

}
