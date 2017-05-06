<?php

class ContestModel extends Model {

    public function add( $data ){

        $sql = sprintf("insert into `%s` %s", $this->_table, $this->formatInsert($data));

        if( APP_DEBUG_FRA )print_r($sql);

        try{

            $sth = $this->_dbHandle->prepare($sql);

            $sth->execute();

        }catch(PDOException $e){

            exit("<br><br><br><br> $sql has throw an error: $e->getMessage()  <br>");
        }
        return $this->_dbHandle->lastInsertId();

    }

    public function select( $data ){

        $sql = sprintf("select * from `%s` where %s", $this->_table, $this->formatWhere($data));

        if( APP_DEBUG_FRA ) print_r($sql);
       
        return $this->selectSQL($sql);
    }

    public function archive($data){

        $sql = sprintf("select cid, cname, password, timeStart, timeEnd, author from `%s`;", $this->_table);

        if(APP_DEBUG_FRA) print_r($sql);

        return $this->selectSQL($sql);

    }

    public function update($data, $where){
        
        $sql = sprintf("update `%s` set %s where %s", $this->_table, $this->formatUpdate($data), $this->formatWhere($where));

        return $this->querySQL($sql);
    }
    public function addProblem($data, $where){

        $sql = sprintf("update `%s` set problem=CONCAT(problem, \"%s#\") where %s", $this->_table, $data, $this->formatWhere($where));

        return $this->querySQL($sql);
    }

    public function rmProblem($data, $where){

        $sql = sprintf("select problem from `%s` where %s", $this->_table, $this->formatWhere($where));

        $result = $this->selectSQL($sql);

        if(APP_DEBUG_FRA) print_r($result);

        $problem = $result[0]['problem'];

        $problems = explode('#', $problem);

        $problem = "#";

        foreach($problems as $pid){
            if( $pid != $data['pid'] && $pid!="" )
                $problem = $problem."#".$pid;
        }

        $data = array('problem' => $problem);

        return $this->update($data, $where);
    }
}
