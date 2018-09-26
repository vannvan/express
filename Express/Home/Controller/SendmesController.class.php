<?php
namespace Home\Controller;
use Think\Controller;
class SendmesController extends Controller {
  //设置与发送模板信息
    public function set_msg(){
    //获取access_token
    $access_token = getaccess_token();
    $openid=session('openid');
    //echo "$openid";
    // //下面是要填充模板的信息  订购成功模板
    // $formwork = '{
    //        "touser":$openid,
    //        "template_id":"EybeGBJ2MW3iki_nkoSVXETuBbzVa1_nu1d2XubS5Qo",
    //        "url":"http://www.uidoer.top",            
    //        "data":{
    //                "first":{
    //                    "value":"我们已收到您的订单，将尽快安排配送，请耐心等待: )",
    //                    "color":"#173177"
    //                },
    //                "orderMoneySum": {
    //                    "value":"3.00元",
    //                    "color":"#ff2929"
    //                },
    //                "orderProductName": {
    //                    "value":"校园快递",
    //                    "color":"#ff2929"
    //                },
    //                "Remark":{
    //                    "value":"有问题请致电18329684862或直接在微信留言，客服将第一时间为您服务！",
    //                    "color":"#ff2929"
    //                }
    //        }
    //    }';
      $formwork = array(
        "touser"=>$openid, //推送给谁,openid
        "template_id"=>"EybeGBJ2MW3iki_nkoSVXETuBbzVa1_nu1d2XubS5Qo", //微信后台的模板信息id
        "url"=>"http://www.uidoer.top/user/order", //下面为预约看房模板示例
        "data"=> array(
            "first" => array(
                "value"=>"我们已收到您的订单，将尽快安排配送，请耐心等待: )",
                "color"=>"#ff2929"
            ),
            "orderMoneySum"=>array(
                "value"=>"3.00元", //如果传变量可以写成$customName的格式，不用双引号
                "color"=>"#173177"
            ),
            "orderProductName"=>array(
                "value"=>"校园快递",
                "color"=>"#173177"
            ),
            "Remark"=> array(
                "value"=>"有问题请致电18329684862或直接在微信留言，客服将第一时间为您服务！",
                "color"=>"#173177"
            ),
            
        )
    );

    $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token={$access_token}";
    $formwork = json_encode($formwork);//将上面的数组数据转为json格式
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
    curl_setopt($ch, CURLOPT_POST,1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$formwork);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
    //echo set_msg();
   }

}