<?php
namespace Common\Model;
use Common\Model\BaseModel;
/**
* 配置项model
*/
class ConfigModel extends BaseModel{

    // // 自动验证
    // protected $_validate=array(
    //  array('old_password','require','原密码不能为空'),
    //  array('ADMIN_PASSWORD','require','新密码不能为空'),
    //  array('re_password','require','重复密码不能为空'),
    //  array('re_password','ADMIN_PASSWORD','两次密码不一致',0,'confirm'),
    //  );

    // 修改数据
    public function editData(){
        $data=I('post.');
        // p($data);die;
        foreach ($data as $k => $v) {
            $this->where(array('name'=>$k))->setField('value',$v);
            $data[$k]=htmlspecialchars_decode($v);
        }

        $data['ABOUT_ME_CONTENT']=preg_replace('/src=\"^\/.*\/Upload\/image\/ueditor$/','src="/Upload/image/ueditor',$data['ABOUT_ME_CONTENT']);
        $data['ABOUT_ME_CONTENT']=htmlspecialchars($data['ABOUT_ME_CONTENT']);

        $data['WEB_STATISTICS']=str_replace( "'",'"',$data['WEB_STATISTICS']);
        $data['CHANGYAN_COMMENT']=str_replace( "'",'"',$data['CHANGYAN_COMMENT']);
        $data['CHANGYAN_COMMENT']=str_replace( '<div id="SOHUCS"></div>','',$data['CHANGYAN_COMMENT']);
        $str=<<<php
<?php
return array(
//此配置项为自动生成请勿直接修改；如需改动请在后台网站设置
//                        --------------- 佛祖保佑 神兽护体 女神助攻 流量冲天 ---------------
//                                                     _ooOoo_
//                                                    o8888888o
//                                                    88\" . \"88
//                                                    (| ^_^ |)
//                                                    O\\  =  /O
//                                                 ____/`---'\\____
//                                               .'  \\\\|     |//  `.
//                                              /   \\|||  :  |||//  \\
//                                             /  _||||| -:- |||||-  \\
//                                             |   | \\\\\\  -  /// |   |
//                                             | \\_|  ''\\---/''  |   |
//                                             \\  .-\\__  `-`  ___/-. /
//                                           ___`. .'  /--.--\\  `. . ___
//                                         .\"\" '<  `.___\\_<|>_/___.'  >'\"\".
//                                       | | :  `- \\`.;`\\ _ /`;.`/ - ` : | |
//                                       \\  \\ `-.   \\_ __\\ /__ _/   .-` /  /
//                                 ========`-.____`-.___\\_____/___.-`____.-'========
//                                                      `=---='
//                                 ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
//                                    佛祖保佑       永不宕机     永无BUG    流量冲天
//
//
//                        　　　　　　　  ┏┓             ┏┓+ +
//                        　　　　　　　┏┛┻━━━━━━━┛┻┓ + +
//                        　　　　　　　┃　　　　　　         ┃
//                        　　　　　　　┃　　　━　　　       ┃ ++ + + +
//                        　　　　　　 █████━█████  ┃+
//                        　　　　　　　┃　　　　　　         ┃ +
//                        　　　　　　　┃　　　┻　　　       ┃
//                        　　　　　　　┃　　　　　　         ┃ + +
//                        　　　　　　　┗━━┓　   ┏━━━━┛
//                                          ┃　　  ┃
//                        　　　　　　　　　 ┃　　  ┃ + + + +
//                        　　　　　　　　 　┃　　　┃　
//                        　　　　　　　 　　┃　　　┃ + 　　　　神兽护体,流量冲天
//                        　　　　　　　 　　┃　　　┃          永不宕机,代码无bug
//                        　　　　　　　　 　┃　　　┃　　+
//                        　　　　　　　　 　┃　 　 ┗━━━━━┓ + +
//                        　　　　　　　　 　┃ 　　　　　       ┣┓
//                        　　　　　　　　 　┃ 　　　　　       ┏┛
//                        　　　　　　　　 　┗┓┓┏━━━┳┓┏┛ + + + +
//                        　　　　　　　　 　  ┃┫┫　    ┃┫┫
//                        　　　　　　　　 　  ┗┻┛　    ┗┻┛+ + + +
//
//
//                        　　　　　　 ┏┓           ┏┓
//                                  ┏┛┻━━━━━━┛┻┓
//                                  ┃　　　　　　        ┃
//                                  ┃　　　━　　　      ┃
//                                  ┃　┳┛　  ┗┳　    ┃
//                                  ┃　　　　　　        ┃
//                                  ┃　　　┻　　　      ┃
//                                  ┃　　　　　　       ┃
//                                  ┗━┓　　　┏━━━┛
//                                      ┃　　　┃   神兽护体 流量冲天
//                                      ┃　　　┃   永不宕机 代码无BUG！
//                                      ┃　　　┗━━━━━━━━━┓
//                                      ┃　　　　　　　            ┣┓
//                                      ┃　　　　                  ┏┛
//                                      ┗━┓ ┓ ┏━━━┳ ┓ ┏━┛
//                                          ┃ ┫  ┫    ┃  ┫ ┫
//                                          ┗━┻━┛   ┗━┻━┛
//
//
//                                               .::::.
//                                             .::::::::.
//                                            :::::::::::
//                                         ..:::::::::::'
//                                      '::::::::::::'
//                                        .::::::::::
//                                   '::::::::::::::..        女神助攻,流量冲天
//                                        ..::::::::::::.     永不宕机,代码无bug
//                                      ``::::::::::::::::
//                                       ::::``:::::::::'        .:::.
//                                      ::::'   ':::::'       .::::::::.
//                                    .::::'      ::::     .:::::::'::::.
//                                   .:::'       :::::  .:::::::::' ':::::.
//                                  .::'        :::::.:::::::::'      ':::::.
//                                 .::'         ::::::::::::::'         ``::::.
//                             ...:::           ::::::::::::'              ``::.
//                            ```` ':.          ':::::::::'                  ::::..
//                                               '.:::::'                    ':'````..
//
//
//                                   唐伯虎:
//                                                    桃花庵歌
//                                          桃花坞里桃花庵，桃花庵下桃花仙；
//                                          桃花仙人种桃树，又摘桃花卖酒钱。
//                                          酒醒只在花前坐，酒醉还来花下眠；
//                                          半醒半醉日复日，花落花开年复年。
//                                          但愿老死花酒间，不愿鞠躬车马前；
//                                          车尘马足富者趣，酒盏花枝贫者缘。
//                                          若将富贵比贫贱，一在平地一在天；
//                                          若将贫贱比车马，他得驱驰我得闲。
//                                          别人笑我太疯癫，我笑他人看不穿；
//                                          不见五陵豪杰墓，无花无酒锄作田。
//
//
//                                   曹操:
//                                                         短歌行
//                                          对酒当歌，人生几何？譬如朝露，去日苦多。
//                                          概当以慷，忧思难忘。何以解忧？唯有杜康。
//                                          青青子衿，悠悠我心。但为君故，沈吟至今。
//                                          呦呦鹿鸣，食野之苹。我有嘉宾，鼓瑟吹笙。
//                                          明明如月，何时可掇？忧从中来，不可断绝。
//                                          越陌度阡，枉用相存。契阔谈咽，心念旧恩。
//                                          月明星稀，乌鹊南飞。绕树三匝，何枝可依。
//                                          山不厌高，海不厌深，周公吐哺，天下归心。
//
//
//                                  关羽：
//                                                    咏关公
//                                         桃园结义薄云天，偃月青龙刀刃寒。
//                                         一骑绝尘走千里，五关斩将震坤乾。
//                                         忠心报国为梁栋，肝胆护兄铸铁肩。
//                                         一去麦城无复返，英魂庙里化青烟。
//
//
//                                  程序员:
//                                                   程序开发行
//                                          写字楼里写字间，写字间里程序员；
//                                          程序人员做开发，又拿程序换活钱。
//                                          酒醒只在屏前坐，酒醉还来屏下眠；
//                                          酒醉酒醒日复日，屏前屏下年复年。
//                                          但愿老死电脑间，不愿鞠躬老板前；
//                                          奔驰宝马贵者趣，公交自行程序员。
//                                          别人笑我忒疯癫，我笑自己命太贱；
//                                          不见满街漂亮妹，哪个归得程序员。
//                                          年复一年代码圈，精益求精产品圈；
//                                          至情之人同成长，缔造和谐至情间。
//                                          千锤百炼飞冲天，辉煌有为戏人间；
//                                          谈笑风生社会圈，享天福天下归心。
//*************************************网站设置****************************************
    'WEB_STATUS'                =>  '{$data['WEB_STATUS']}',           //网站状态1:开启 0:关闭
    'WEB_CLOSE_WORD'            =>  '{$data['WEB_CLOSE_WORD']}',       //网站关闭时提示文字
    'WEB_ICP_NUMBER'            =>  '{$data['WEB_ICP_NUMBER']}',       // 网站ICP备案号
    'ADMIN_EMAIL'               =>  '{$data['ADMIN_EMAIL']}',          // 站长邮箱

//*************************************优化推广****************************************
    'WEB_NAME'                  =>  '{$data['WEB_NAME']}',             //网站名：
    'WEB_KEYWORDS'              =>  '{$data['WEB_KEYWORDS']}',         //网站关键字
    'WEB_DESCRIPTION'           =>  '{$data['WEB_DESCRIPTION']}',      //网站描述
    'AUTHOR'                    =>  '{$data['AUTHOR']}',               //默认作者
    'COPYRIGHT_WORD'            =>  '{$data['COPYRIGHT_WORD']}',       //文章保留版权提示
    'IMAGE_TITLE_ALT_WORD'      =>  '{$data['IMAGE_TITLE_ALT_WORD']}', //图片默认title和alt
    'DEFAULT_IMAGE'             =>  '{$data['DEFAULT_IMAGE']}',        //文章默认图片

//*************************************水印设置****************************************
    'WATER_TYPE'                =>  '{$data['WATER_TYPE']}',           //水印类型 0:不使用水印 1:文字水印 2:图片水印 3:文字和图片水印同时使用
    'TEXT_WATER_WORD'           =>  '{$data['TEXT_WATER_WORD']}',      //文字水印内容
    'TEXT_WATER_TTF_PTH'        =>  '{$data['TEXT_WATER_TTF_PTH']}',   //文字水印字体路径
    'TEXT_WATER_FONT_SIZE'      =>  '{$data['TEXT_WATER_FONT_SIZE']}', //文字水印文字字号
    'TEXT_WATER_COLOR'          =>  '{$data['TEXT_WATER_COLOR']}',     //文字水印文字颜色
    'TEXT_WATER_ANGLE'          =>  '{$data['TEXT_WATER_ANGLE']}',     //文字水印文字倾斜程度
    'TEXT_WATER_LOCATE'         =>  '{$data['TEXT_WATER_LOCATE']}',    //文字水印位置 1：上左 2：上中 3：上右 4：中左 5：中中 6：中右 7：下左 8：下中 9：下右
    'IMAGE_WATER_PIC_PTAH'      =>  '{$data['IMAGE_WATER_PIC_PTAH']}', //图片水印 水印路径
    'IMAGE_WATER_LOCATE'        =>  '{$data['IMAGE_WATER_LOCATE']}',   //图片水印 水印位置 1：上左 2：上中 3：上右 4：中左 5：中中 6：中右 7：下左 8：下中 9：下右
    'IMAGE_WATER_ALPHA'         =>  '{$data['IMAGE_WATER_ALPHA']}',    //图片水印 水印透明度：0-100

//*************************************第三方登录****************************************
    'QQ_APP_ID'                 =>  '{$data['QQ_APP_ID']}',            // QQ登录APP D
    'QQ_APP_KEY'                =>  '{$data['QQ_APP_KEY']}',           // QQ登录APP KEY
    'SINA_API_KEY'              =>  '{$data['SINA_API_KEY']}',         // 新浪登录API KEY
    'SINA_SECRET'               =>  '{$data['SINA_SECRET']}',          // 新浪登录SECRET
    'DOUBAN_API_KEY'            =>  '{$data['DOUBAN_API_KEY']}',       // 豆瓣登录API KEY
    'DOUBAN_SECRET'             =>  '{$data['DOUBAN_SECRET']}',        // 豆瓣登录SECRET
    'RENREN_API_KEY'            =>  '{$data['RENREN_API_KEY']}',       // 人人登录API KEY
    'RENREN_SECRET'             =>  '{$data['RENREN_SECRET']}',        // 人人登录SECRET
    'KAIXIN_API_KEY'            =>  '{$data['KAIXIN_API_KEY']}',       // 开心网登录API KEY
    'KAIXIN_SECRET'             =>  '{$data['KAIXIN_SECRET']}',        // 开心网登录SECRET
    'GITHUB_CLIENT_ID'          =>  '{$data['GITHUB_CLIENT_ID']}',     // github登录API KEY
    'GITHUB_CLIENT_SECRET'      =>  '{$data['GITHUB_CLIENT_SECRET']}', // github登录SECRET
    'SOHU_API_KEY'              =>  '{$data['SOHU_API_KEY']}',         // 搜狐网登录API KEY
    'SOHU_SECRET'               =>  '{$data['SOHU_SECRET']}',          // 搜狐网登录SECRT
//***********************************其他第三方接口****************************************
    'WEB_STATISTICS'            =>  '{$data['WEB_STATISTICS']}',       // 第三方统计代码
    'BAIDU_SITE_URL'            =>  '{$data['BAIDU_SITE_URL']}',       // 百度推送site提交接
//***********************************邮箱设置***********************************************
    'EMAIL_SMTP'                =>  '{$data['EMAIL_SMTP']}',           //  SMTP服务器
    'EMAIL_USERNAME'            =>  '{$data['EMAIL_USERNAME']}',       //  邮箱用户名
    'EMAIL_PASSWORD'            =>  '{$data['EMAIL_PASSWORD']}',       //  邮箱密码
    'EMAIL_FROM_NAME'           =>  '{$data['EMAIL_FROM_NAME']}',      //  发件名
//***********************************评论管理***********************************************
    'COMMENT_REVIEW'            =>  '{$data['COMMENT_REVIEW']}',       // 评论审核1:开启 0:关闭
    'COMMENT_SEND_EMAIL'        =>  '{$data['COMMENT_SEND_EMAIL']}',   // 被评论邮件通知1:开启 0:关闭
    'EMAIL_RECEIVE'             =>  '{$data['EMAIL_RECEIVE']}',        // 接收评论通知邮箱
//***********************************QQ群设置***********************************************
    'QQ_GROUP_ACCOUNT'          =>  '{$data['QQ_GROUP_ACCOUNT']}',     // QQ群账号
    'QQ_GROUP_CODE'             =>  '{$data['QQ_GROUP_CODE']}',        // QQ群代码
    'QQ_GROUP_IMAGE'            =>  '{$data['QQ_GROUP_IMAGE']}',       // QQ群二维码
//***********************************关于我设置***********************************************
    'ABOUT_ME_CONTENT'          =>  '{$data['ABOUT_ME_CONTENT']}',     // 关于我内容

);
php;
        file_put_contents('./Application/Common/Conf/webconfig.php', $str);
        return true;
    }

    // 获取全部数据
    public function getAllData(){

//        foreach ($this->getField('name,value') as $result){
//            \Think\Log::write('name------->'.$result);
//        }
        // 获取相对路径的图片地址
//        $data['content']=preg_ueditor_image_path($data['content']);
        return $this->getField('name,value');
    }

    // 修改密码
    public function changePassword(){
        $data=I('post.');
        if($data['ADMIN_PASSWORD']==$data['re_password']){
            $old_password=$this->getFieldByName('ADMIN_PASSWORD','value');
            if(md5($data['old_password'])==$old_password){
                $password=md5($data['ADMIN_PASSWORD']);
                $this->where(array('name'=>'ADMIN_PASSWORD'))->setField('value',$password);
                return true;
            }else{
                $this->error='原密码输入错误';
            }
        }else{
            $this->error='两次密码不一致';
            return false;
        }
    }
}
