<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
/**
 * 后台首页
 */
class IndexController extends AdminBaseController{
    // 后台首页
    public function index(){
        $this->display();
    }
    // 欢迎页面
    public function welcome(){
        $assign=array(
            'all_article'=>D('Article')->getCountData(),
            'delete_article'=>D('Article')->getCountData(array('is_delete'=>1)),
            'hide_article'=>D('Article')->getCountData(array('is_show'=>0)),
            'all_chat'=>D('Chat')->getCountData(),
            'delete_chat'=>D('Chat')->getCountData(array('is_delete'=>1)),
            'hide_chat'=>D('Chat')->getCountData(array('is_show'=>0)),
            'all_comment'=>M('Comment')->count(),
            'all_file'=>D('File')->getCountData(),
            'delete_file'=>D('File')->getCountData(array('is_delete'=>1)),
            'hide_file'=>D('File')->getCountData(array('is_show'=>0)),
            );
        $this->assign($assign);
        $this->display();
    }

}




?>
