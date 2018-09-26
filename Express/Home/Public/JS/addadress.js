$("#add-btn").click(function(){
	var AdressArr=$("#AdressArr").serializeArray();
    postdata={};
    $(AdressArr).each(function(i){
        postdata[this.name]=this.value;
    });
    var url=scope.addurl;
    var jampurl=scope.jampurl;
    $.post(url,postdata,function(result){
        if(result.status==1){
                //成功提示
              layer.open({
                content: result.message
                ,skin: 'msg'
                ,time: 2 //2秒后自动关闭
                ,end: function(){
                    window.location.href=jampurl;
                    }
              });
        }else if(result.status==0){
        //底部提示
         return dialog.error(result.message);
        }
    },"JSON")
})