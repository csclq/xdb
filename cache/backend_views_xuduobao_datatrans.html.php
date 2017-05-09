
<div class="wrapper main-wrapper wrapper-content ">

    <div class="page-content" style="display: block;">
        <div class="page-heading"> <h2>商品销售转化率</h2> <span>查询商品浏览量及购买转化率，默认排序为转化率从高到低 总数: <span style="color:red">21</span></span></div>



        <form action="http://abc.5xieys.cn/web/index.php" method="get" class="form-horizontal">
            <input type="hidden" name="c" value="site">
            <input type="hidden" name="a" value="entry">
            <input type="hidden" name="m" value="ewei_shopv2">
            <input type="hidden" name="do" value="web">
            <input type="hidden" name="r" value="statistics.goods_trans">
	<div class="page-toolbar row m-b-sm m-t-sm">
		<div class="col-sm-5">

			<div class="btn-group btn-group-sm" style="float:left">
				<button class="btn btn-default btn-sm" type="button" data-toggle="refresh"><i class="fa fa-refresh"></i></button>

			</div> 
  
			 			
		</div>	


		<div class="col-sm-6 pull-right">

			<select name="orderby" class="form-control  input-sm select-md" style="width:100px;float:left">

				<option value="" selected="">排序</option>
				<option value="0">降序</option>
				<option value="1">升序</option>
			</select>
			<div class="input-group">				 
				<input type="text" class="form-control input-sm" name="title" value="" placeholder="商品名称"> 
				<span class="input-group-btn">
							
					<button class="btn btn-sm btn-primary btn-sm" type="submit"> 搜索</button>
                       <button type="submit" name="export" value="1" class="btn btn-success  btn-sm">导出 Excel</button>
                    				</span>
			</div>

		</div>
	</div>

</form>
 
     <table class="table table-hover">
            <thead>
                <tr>
                
                    <th style="width:400px;">商品名称</th>
                    <th style="width:200px;">访问次数</th>
                    <th style="width:300px;">购买件数</th>
                    <th>转化率</th>
                </tr>
            </thead>
            <tbody>
                                <tr>
                    <td>
                        <img src="" style="width: 30px; height: 30px;border:1px solid #ccc;padding:1px;">
                        许多宝保湿面膜(活动)</td>
                    <td>24</td>
                    <td>7</td> 
                    <td>   <div class="progress" style="max-width:500px;">
                            <div style="width: 29.17%;" class="progress-bar progress-bar-info"><span style="color:#000">29.17%</span></div>
                       </div></td>
                </tr>
                              
                        </tbody></table>
        <div><ul class="pagination pagination-centered" style="background-color: #fff !important;color:#000 !important;">
        <li class="active"><a href="javascript:;">1</a></li>
         <li><a href="http://abc.5xieys.cn/web/index.php?c=site&amp;a=entry&amp;m=ewei_shopv2&amp;do=web&amp;r=statistics.goods_trans&amp;page=2">2</a></li >
        <li><a href="http://abc.5xieys.cn/web/index.php?c=site&amp;a=entry&amp;m=ewei_shopv2&amp;do=web&amp;r=statistics.goods_trans&amp;page=2" class="pager-nav">下一页»</a></li>
        <li><a href="http://abc.5xieys.cn/web/index.php?c=site&amp;a=entry&amp;m=ewei_shopv2&amp;do=web&amp;r=statistics.goods_trans&amp;page=2" class="pager-nav">尾页</a></li></ul></div> 
</div>

<script language="javascript">
    require(['bootstrap'], function ($) {
        $('[data-toggle="tooltip"]').tooltip({
            container: $(document.body)
        });
        $('[data-toggle="popover"]').popover({
            container: $(document.body)
        });
    });


     function check_ewei_shopv2_upgrade() {
  
        require(['util'], function (util) {  
            if (util.cookie.get('checkeweishopv2upgrade_sys')) {
                return;
            }
            $.post('http://abc.5xieys.cn/web/index.php?c=site&a=entry&m=ewei_shopv2&do=web&r=system.auth.upgrade.check', function (ret) {
                if (ret && ret.status == '1') { 
		  
	var result = ret.result;	    
                    if(result.filecount>0 || result.database || result.upgrades){
	 	 
                        var html = '<div id="ewei-shopv2-upgrade-tips" class="tips-upgrade">';
	   html+='<span class="tclose" onclick="check_ewei_shopv2_upgrade_hide();"><i class="fa fa-times-circle fa-2x"></i></span>';
                         html+= '<div class="title">检测到更新</div>';
                        html+='<div class="text"> 新版本 ' + result.version + " RELEASE " + result.release;
                        html+=',请尽快更新! </div>';
			html+='<div class="buttons"><a href="http://abc.5xieys.cn/web/index.php?c=site&a=entry&m=ewei_shopv2&do=web&r=system.auth.upgrade" class="btn btn-warning btn-sm">立即去更新</a></div></div>';
                        $('body').prepend(html);
                   }
                }
            },'json');
        });
    }
      function check_ewei_shopv2_upgrade_hide() {
        require(['util'], function (util) {
            util.cookie.set('checkeweishopv2upgrade_sys', 1, 3600);
            $('#ewei-shopv2-upgrade-tips').fadeOut(150);
        });
    }
    $(function () {
        setTimeout( function() {
            check_ewei_shopv2_upgrade();
        },4000);
    });
    
    $(function () {
        $('.page-content').show();
        $('.img-thumbnail').each(function () {
            if ($(this).attr('src').indexOf('nopic.jpg') != -1) {
                $(this).attr('src', "../addons/ewei_shopv2/static/images/nopic.jpg");
            }
        })
        $.ajax({
              url: "http://abc.5xieys.cn/web/index.php?c=site&a=entry&m=ewei_shopv2&do=web&r=util.task",
			  async:false,
              cache: false
        });
    });
</script>
</div><div id="tip-msgbox" class="msgbox"></div>