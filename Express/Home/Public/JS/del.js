//删除操作
$(".del-btn").click(function(){
	var id=$(this).attr('data-id');
	var url=scope.deleteurl;
	//alert(url);
	data={'id':id}
	
//底部对话框
  layer.open({
    content: '删除数据不可恢复'
    ,btn: ['删除', '取消']
    ,skin: 'footer'
    ,yes: function(index){
      todelete(url,data);
    }
  });
});



function todelete(url,data){
	$.post(
		url,
		data,
		function(result){
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
			}else{
				layer.open({
		            content: result.message
		            ,skin: 'footer'
		            ,time:1
		          });
			}
		},"JSON");
}