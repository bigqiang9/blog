<?php
namespace Common\Model;
use Common\Model\BaseModel;
/**
* 友情链接model
*/
class LinkModel extends BaseModel{
    // 定义自动验证规则
    protected $_validate=array(
        array('lname','require','链接名称必填'),
        array('url','require','链接必填'),
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
            $data['url']='http://'.str_replace(array('http://','https://'), '', $data['url']);

            $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
            // 如果用户输入邮箱；则将邮箱记录入oauth_user表中
            if (preg_match($pattern, $data['email'])) {
                D('Oauth_user')->where(array('id'=>$_SESSION['user']['id']))->setField('email',$data['email']);
            }

            // 获取当前最大的sort
            $where=array();
            $result = $this->where($where)->order('sort DESC')->find();

            $data['sort'] = $result['sort'] + 1;
            $data['addtime'] = time();
            $lid=$this->add($data);
            return $lid;
        }else{
            return false;
        }
    }

    // 修改数据
    public function editData(){
        $data=I('post.');
        if($this->create($data)){
            $data['url']='http://'.str_replace(array('http://','https://'), '', $data['url']);
            $this->where(array('lid'=>$data['lid']))->save($data);
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

    // 传递lid获取单条数据
    public function getDataByLid($lid){
        return $this->where(array('lid'=>$lid))->find();
    }
}
