<?php

class ProblemModel extends Model {

    public function add( $data ){

        $sql = sprintf("insert into `%s` %s; select @@Identity as pid;", $this->_table, $this->formatInsert($data));

        try{

            $sth = $this->_dbHandle->prepare($sql);
            
            $sth->execute();

        }catch(PDOException $e){

            LOGGER::ERROR(" $sql has throw an error: $e->getMessage(). ");
            exit("System Error! Connect the system administrator, please.");
        }
        return $this->_dbHandle->lastInsertId();
    }

    public function select($data){

        $sql = sprintf("select * from `%s` where %s", $this->_table, $this->formatWhere($data));

        return $this->selectSQL($sql);
    }

    public function selectLimit($data){

        $sql = sprintf("select timeLimit, memoryLimit from `%s` where %s", $this->_table, $this->formatWhere($data));

        return $this->selectSQL($sql);
    }

    public function archive($data){

        if($data == array())
            $sql = sprintf("select pid, pname, ratio, accepted, submited, tag from `%s` where visable='1';", $this->_table);
        else 
            $sql = sprintf("select pid, pname, ratio, accepted, submited, tag from `%s` where %s;", $this->_table, $this->formatWhere($data));

        return $this->selectSQL($sql);

    }

    public function updateSubmit($data, $where){
        
        $sql = sprintf("update `%s` set %s where %s;", $this->_table, $this->formatUpdate($data), $this->formatWhere($where));

        return $this->querySQL($sql);

    }
}
