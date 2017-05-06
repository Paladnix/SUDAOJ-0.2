<?php

class StatusModel extends Model {

    public function add( $data ){

        $sql = sprintf("insert into `%s` %s; select @@Identity as pid;", $this->_table, $this->formatInsert($data));

        try{

            $sth = $this->_dbHandle->prepare($sql);
            
            $sth->execute();

        }catch(PDOException $e){

            exit("<br><br><br><br> $sql has throw an error: $e->getMessage()  <br>");
        }
        return $this->_dbHandle->lastInsertId();
    }

    public function select($data){

        $sql = sprintf("select * from `%s` where %s order by rid desc", $this->_table, $this->formatWhere($data));

        return $this->selectSQL($sql);
    }
    public function selectAll(){

        $sql = sprintf("select * from `%s` order by rid desc", $this->_table);

        return $this->selectSQL($sql);
    }

    public function update($data, $where){

        $sql = sprintf("update `%s` set %s where %s;", $this->_table, $this->formatUpdate($data), $this->formatWhere($where));

        return $this->querySQL($sql);
    }

}
