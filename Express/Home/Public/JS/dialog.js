var dialog={
	//错误弹出层
	error:function (message) {
		 layer.open({
            content: message
            ,skin: 'footer'
            ,time:1
          });
	},
     //成功刷新当前页
     success:function(message){
     	//成功提示
          layer.open({
            content: message
            ,skin: 'msg'
            ,time: 2 //2秒后自动关闭
            ,end: function(){
                window.location.reload();//刷新当前页面
                }
          });
     },
     
}  
