<?php 
namespace Student\Model;
use Think\Model\RelationModel;

/**
* 课程关联的模型
*/
class CourseRelationModel extends RelationModel
{
    protected  $tableName ="course";

    //关联规则
    protected $_link = array(
        'author'=>array(
            'mapping_type'      => self::BELONGS_TO,//课程必定属于某个用户创建的
            'class_name'        => 'Member',
            'mapping_name'  => 'author',
            'foreign_key' =>'uid',
            'mapping_fields'=>'nickname,middle_photo',            
            ),

         'category'=>array(
            'mapping_type'      => self::BELONGS_TO,//课程必定属于某个分类
            'class_name'        => 'CourseCategory',
            'mapping_name'  => 'category',
            'foreign_key' =>'category_id',
            'mapping_fields'=>'title',            
            ),
         // 'lesson'=>array(
         //    'mapping_type'      => self::HAS_MANY ,//课程有许多课时
         //    'class_name'        => 'Lesson',
         //    'mapping_name'  => 'lesson',
         //    'foreign_key' =>'cid',
         //    'mapping_fields'=>'id,title',      
         //    ),
         'note'=>array(
            'mapping_type'      => self::HAS_MANY ,//课程有许多笔记
            'class_name'        => 'Note',
            'mapping_name'  => 'note',
            'foreign_key' =>'cid',
            'mapping_fields'=>'count(id)',      
            )

        );

	
	
	/**
	 * 课程列表:
	 * @param  Array $status [状态（-1：已删除，0：禁用，1：正常）默认为1 和0]
	 * @param  string  $order  [排序:默认按照seq 倒序]
	 * @param  boolean $field  [字段:默认为所有的字段]
	 * @return [type]          [description]
	 */
	public function lists($status = array(1), $order = 'seq DESC', $field = true,$Page=null){
        $map['status'] =array('in',$status);
        if($Page != null){
            return $this->relation(true)->field($field)->where($map)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
        }
        return $this->relation(true)->field($field)->where($map)->order($order)->select();
    }

    /**
     * 推荐的课程 显示在首页
     * @param  array   $status [description]
     * @param  string  $order  [description]
     * @param  boolean $field  [description]
     * @param  [type]  $Page   [description]
     * @return [type]          [description]
     */
    public function listsByIndex($status = array(1), $order = 'seq DESC', $field = true,$Page=null){
        $map['status'] =array('in',$status);
        if($Page != null){
            return $this->relation(true)->field($field)->where($map)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
        }
        return $this->relation(true)->field($field)->where($map)->order($order)->select();
    }
    /**
     * 返回数据的数量：默认为正常数据
     * @return [type] [description]
     */
     public function listCount($status =array(0,1)){
        
        $map['status'] =array('in',$status);
        return $this->where($map)->Count('id');
    }

    /**
     * 指定用户下的课程列表，包含笔记
     * @return [type] [description]
     */
    public function listsByUid($status = array(1), $order = 'seq DESC', $field = true,$Page=null){
        $map['status'] =array('in',$status);
        $map['uid']=array('eq',2);
        if($Page != null){
            return $this->relation('note')->field($field)->where($map)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
        }
        return $this->relation('note')->field($field)->where($map)->order($order)->select();
    }

    public function detail($id=0)
    {
        # code...
        if ($id == 0) {
            # code...
            return '没有指定索引';
        }

        $map = array(
            //'status'=>1,
            'id'=>$id,
            );
        return $this->relation(true)->where($map)->find();
    }
   
   




}

 ?>