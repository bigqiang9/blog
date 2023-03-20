<?php
namespace Home\Controller;
use Common\Controller\HomeBaseController;
/**
 * 更多友情链接
 */
class SitesController extends HomeBaseController {

    // 首页
    public function index(){
        $assign=array(
            'links'=>D('Link')->getDataByState(0,1),
            'cid'=>'sites'
        );
        $this->assign($assign);
        $this->display();
    }

    // ajax申请友链
    public function ajax_apply() {
        $data = I('post.');
        if(empty($data['lname']) || empty($data['url'])){
            die('内容为空');
        }else{
            $cmtid = D('Link')->addData();
            echo $cmtid;
        }
    }


}
