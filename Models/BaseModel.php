<?php
    class BaseModel extends Database
    {
        protected $connect;

        public function __construct()
        {
            $this->connect = $this->connect();
        }

        public function _query($sql)
        {
            return mysqli_query($this->connect, $sql);
        }
        public function basegetall($table, $select = ['*'], $orderBys = [], $limit = 15)
        {
            $columns = implode(',', $select);
            $orderByString = implode(' ', $orderBys);
            if($orderByString)
            {
                $sql = "SELECT ${columns} FROM ${table} WHERE status = '1' ORDER BY ${orderByString} LIMIT ${limit} ";
            }else{
                $sql = "SELECT ${columns} FROM ${table} WHERE status = '1' LIMIT ${limit} ";
            }
            $query = $this->_query($sql);
            $data = [];
            while($row = mysqli_fetch_assoc($query))
            {
                array_push($data, $row);
            }
            return $data;
        }
        
        public function basegetby($table, $key = []) 
        {
            $sql = "SELECT * FROM ${table} WHERE status = '1' AND ";
            $where = [];
            foreach($key as $key =>$value)
            {
                    array_push($where,"${key} = '${value}' ");
            }
            $sql .= implode('AND ',$where);
            $sql .= "; ";
            $query = $this->_query($sql);
            $data = [];
            while($row = mysqli_fetch_assoc($query))
            {
                array_push($data, $row);
            }

            return $data;
        }
        
        public function basestore($table, $store = [], $file = [])
        {
            if(!isset($file) == FALSE)
            {
                $type = $file['type'];
                $src = "./Assets/ImageProduct/${type}/".$file['name'];
                move_uploaded_file($file['tmp_name'], $src);
            }
            array_push($store['key'],'src');
            array_push($store['value'], $src); 
            $keys = implode(' , ',$store['key']) ;
            $values = implode("' , '",$store['value']) ;
            $values = "'".$values."'";
            $sql = "INSERT INTO ${table} (${keys}) VALUES (${values}) ; ";
            echo $sql;
            $this->_query($sql);
            $data = "Upload Successful";
            return $data;
        }
        
        public function update()
        {
            
        }
        
        public function delete()
        {
            
        }
    }
?>