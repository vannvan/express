//设定默认地址操作
$(".check-btn").click(function(){
	var id=$(this).attr('data-id');
	var userid=$(this).attr('data-userid');
	var url=scope.modurl;
  var jampurl=scope.jampurl;
	var data={'id':id,'userid':userid};
	$.post(url,data,function(result){
        if(result.status==1){
          window.location.href=jampurl; 
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