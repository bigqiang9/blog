<?php
namespace Common\Model;
use Common\Model\BaseModel;
/**
* 文件管理model
*/
class FileModel extends BaseModel{
    // 定义自动验证规则
    protected $_validate=array(
        array('fname','require','文件名称必填'),
        array('url','require','文件地址必填'),
//        array('sort','require','排序必填'),
        );

    // 自动完成
    protected $_auto=array(
        array('addtime','time',1,'function'),
    );

    // 添加数据
    public function addData(){
        $data=I('post.');
        if($this->create($data)){

            // 文件地址
            $domain = $_SERVER['HTTP_HOST'];
            $data['url']='http://'.$domain.str_replace(array('http://','https://'), '', $data['upload_path']);

            // 获取当前最大的sort
            $where=array();
            $result = $this->where($where)->order('sort DESC')->find();

            $data['sort'] = $result['sort'] + 1;
            $data['addtime'] = time();
            $fid=$this->add($data);
            return $fid;
        }else{
            return false;
        }
    }

    // 修改数据
    public function editData(){
        $data=I('post.');
        if($this->create($data)){
            // 文件地址
            $domain = $_SERVER['HTTP_HOST'];
            $data['url']='http://'.$domain.str_replace(array('http://','https://'), '', $data['upload_path']);
            $this->where(array('fid'=>$data['fid']))->save($data);
            return true;
        }else{
            return false;
        }
    }

    // 传递is_delete和is_show获取对应数据
    public function getDataByState($is_delete=0,$is_show=1){
        $where=array(
            'is_delete'=>$is_delete,
            'is_show'=>$is_show,
            );
        // 如果是获取全部链接；则删除is_show限制
        if ($is_show==='all') {
            unset($where['is_show']);
        }
        return $this->where($where)->order('sort')->select();
    }

    // 传递fid获取单条数据
    public function getDataByLid($fid){
        return $this->where(array('fid'=>$fid))->find();
    }

    // 传递$map获取count数据
    public function getCountData($map=array()){
        return $this->where($map)->count();
    }
}
