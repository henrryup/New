<?php
    class CategoryModel extends Model{
        //获取所有分类
        public function getAllCates(){
            $sql = "select * from category order by categoryid";
           return $this->select($sql);

        }

        //对取出的分类进行递归排序
        public function sortCate($data,$parent_id = 0,$lev = 0){
            static $arr = array();
            foreach ($data as $key=>$value) {
                if ($value['parent_id'] == $parent_id){

                    //先将当前的小数组存放到arr中
                    $value['lev'] = $lev;
                    $arr[] = $value;
                    $this->sortCate($data,$value['categoryid'],$lev+1);
                }
            }
            return $arr;
        }

        //添加分类
        public function insert(){
            $sql = "insert into category(name,parent_id) values(:category_name,:parent_id)";
            foreach($_POST as $key =>$value){
                $params[':'.$key] = $value;
             }
             //array(':category_name' =>'昌平',':parent_id' =>4);
            return $this->add($sql,$params);
        }

        //删除
        public function delet($id){
            $sql = "delete from category where categoryid=$id";
            return $this->delete($sql);
        }

        //修改分类管理的标题
        public function update($categoryid){
            $arr ='';
            $sql ="select name from category where categoryid = $categoryid";
            $arr['name'] = $this->find($sql);
            $sql = "select categoryid from category where categoryid = (select parent_id from category where categoryid = $categoryid)";
            $arr['categoryid'] = $this->find($sql);
            return $arr;
        }

        public function modify($name,$id){
            $sql = "update category set name='$name' where categoryid =".$id;
            return  $this->save($sql);
        }
    }
?>