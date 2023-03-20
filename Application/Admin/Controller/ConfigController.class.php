<?php 
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
use Common\Controller\UploadFile;
/**
 * 网站设置
 */
class ConfigController extends AdminBaseController{
    // 定义数据表
    private $db;
    
    // 构造函数 实例化TagModel
    public function __construct(){
        parent::__construct();
        $this->db=D('Config');
    }

    // 网站配置首页
    public function index(){
        if(IS_POST){
            if($this->db->editData()){
                $this->success('修改成功',U('Admin/Config/index'));
            }else{
                $this->error('修改失败');
            }
        }else{
            $data=$this->db->getAllData();
            $this->assign('data',$data);
            $this->display();           
        }
    }

    // 修改密码
    public function change_password(){
        if(IS_POST){
            if($this->db->changePassword()){
                $this->success('修改成功');
            }else{
                $this->error($this->db->getError());
            }
        }else{
            $this->display();
        }
    }


    //普通上传
    public function upimg() {

        set_time_limit(0);
        $type = @$_REQUEST["t"];
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = 1024*1024*99999 ;// 设置附件上传大小 最大2M
        //$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg','mp3','mp4','avi');// 设置附件上传类型

        $upload->thumb=false;//是否开启图片文件缩略图
        $upload->savePath = './Upload/image/';// 设置附件上传目录
        $upload->autoSub =true;
        $upload->subType ="date";
        $upload->dateFormat="Ymd";
        if(!$upload->upload()) {// 上传错误提示错误信息
            $info =  $upload->getUploadFileInfo();
            $data['status'] = 0;
            $data['info'] = $upload->getErrorMsg();
            echo json_encode($data);
            exit();

        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
            $img_url=$info[0]['savename'];
            $data['status'] = 1;
            $data['info'] = '上传成功';
            $data['url'] = $img_url;
            $img_src = '/Upload/image/'.$img_url;
            echo $img_src;
//            echo json_encode($data);
            exit();
        }
    }

    /**
     * 删除文件
     */
    public function delimg(){
        $data = I('post.');
        unlink('./'.$data['upload_path']);
        echo 0;
    }


}




