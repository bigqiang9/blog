<?php
namespace Home\Controller;
use Common\Controller\HomeBaseController;
/**
 * 关于我
 */
class AboutController extends HomeBaseController {

    // 首页
    public function index(){

        $where=array('name'=>'ABOUT_ME_CONTENT');
        $data = M('Config')->where($where)->find();
        $content = htmlspecialchars_decode($data['value']);
        $assign=array(
            'data'=>$data,
            'content'=>$content,
        );
        $this->assign($assign);
        $this->display();
    }

}
