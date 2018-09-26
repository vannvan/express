//设定默认地址操作
$(".check-btn").click(function(){
	var id=$(this).attr('data-id');
	var userid=$(this).attr('data-userid');
	var url=scope.modurl;
	var data={'id':id,'userid':userid};
	$.post(url,data,function(result){
        if(result.status==1){
         //成功提示
          layer.open({
            content: result.message
            ,skin: 'msg'
            ,time: 2 //2秒后自动关闭
            ,end: function(){
                window.location.reload();//刷新当前页面
                }
          });
        }else if(result.status==0){
        //底部提示
          layer.open({
            content: result.message
            ,skin: 'footer'
            ,time:1
          });
        }else if(result.status==2){
            //底部提示
          layer.open({
            content: result.message
            ,skin: 'footer'
            ,time:1
          });
        }
    },"JSON")	
})