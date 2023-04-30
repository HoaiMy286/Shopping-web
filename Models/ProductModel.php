<?php
    class ProductModel extends BaseModel
    {
        const TABLE = 'products';
        public function getAll($select =['*'], $orderBys = [], $limit = 15 )
        {
            return $this->basegetall(self::TABLE, $select, $orderBys, $limit);
        }
        public function getby($key)
        {
            return $this->basegetby(self::TABLE, $key);
        }
        public function store($insert, $file)
        {
            return $this->basestore(self::TABLE, $insert, $file);
        }

    }
?>