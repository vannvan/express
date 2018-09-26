# express

Express -v 1.1.0



基于微信公众号的校园综合服务平台，目前由于平台全站运营所需服务器配置较高，暂时只有校园快递模块属于平台开发内容。<br/>


 服务器配置：PHP 7.0.10 / Apache 2.4.23 / MySQL 5.7.14
 <br/>

                     ------- PHP框架 Thinkphp 3.2.3
 前端框架&插件版本：
 <br/>

                     -------Boostrap 3.3.7
  <br/>

                     -------Jquery 3.2.0
 <br/>
                       
	     -------FrozenUI 2.0.0
    <br/>
                    
                     -------layer v-3.0.3 
   <br/>
                  
                     -------layer-mobile v-2.0.0
 <br/>

 ——————————————————————————————————————————
 
   项目目录：<br/>


    Common //前后台公共配置文件
<br/>

  Home//用户
  <br/>

kdadmin//系统管理
 <br/>

 sender//快递员
<br/>

各模块下文件功能均为Thinkphp默认配置

   <br/>

               
  数据库： Express <br/>


     数据表：admin
	<br/>

			     -----------adress
<br/>

				     -----------express
<br/>

				     -----------floor
	<br/>

			     -----------news
	<br/>

			     -----------sender
<br/>

				     -----------userinfo
<br/>

				     -----------welpage
   <br/>

     微信支付：
        \ThinkPHP\Library\Vendor\Weixinpay\WxPayPubConfig.php有详细说明，按照注释添加必要配置项即可。
    <br/>

          
        暂且缺少功能：
        <br/>


 1. 全站404页面；Express -v 1.1.0<br/>
 2. 派送员页面有待改进；
 <br/>
3.系统管理需要增加日志查看页面；<br/>
 4. 管理员管理

项目属于第一个版本，部分业务代码还需做进一步优化，有一定的代码冗余，数据库也需要进一步改进。<br/>

———————————————————————————————————————————<br/>


项目地址[uidoer](http://www.uidoer.top).除微信内置浏览器之外的浏览器打开均只有微信公众号二维码。<br/>


初次托管，详细说明文档及功能完善在后期将进一步完善。
                        
