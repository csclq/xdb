var can1;
var can2;
var ctx1;
var ctx2;
//游戏进度
var Level;//当前游戏进度
var Level1;//好友帮助后进度
var attackCount=[];//攻击次数
var attackCountHD=[];
var attackCountValue=0;
var Animal;//动画是否执行
var currently=1;
var PersonCount_DJ;
var PersonCount_CY;
var HitCount;

var HfangCount=[];
var HfangCount1=[];


var canWidth;
var canHeight;
var lastTime;//上一帧执行时间
var deltaTime;//两帧执行时间差
var TGDHTrue=false;

var bgPic=new Image();

var aircraftCarrier;
var islands;
var arms;
var equipment2=document.getElementById("equipment2");

	
document.body.onload=game;
//js入口
function game(){
	init();
	lastTime=Date.now();
	deltaTime=0;
	// gameloop();
}
//初始化函数
function init(){
	can1=document.getElementById("canvas1");//fishes,dust,ui
	ctx1=can1.getContext('2d');//获得场景
	can2=document.getElementById("canvas2");//background,
	ctx2=can2.getContext('2d');
	canWidth=can1.width;
	canHeight=can1.height;
	resizeCanvas();

	lastTime=Date.now();

	scrollBottom();
	Level=0;
	Animal=true;
	HfangCount=[3,3,3,3,3,3,3,3,3];//跳过动画执行次数
	HfangCount1=[1,1,1,1,1,1,1,1,1];//跳过动画初始化；
	//--------------从后台获取的数据

//获取数据成功后进行判断

		// for(var i=0;i<attackCount.length;i++){
		// 	if(attackCount[i]<=PersonCount_DJ){
		// 	Level1++;
		// 	}
		// }
		// for(var i=0;i<attackCount.length;i++){
		// 	if(attackCountHD[i]<=PersonCount_CY){
		// 		Level1=Level1>(i+1)?Level1:(i+1);
		// 	}
		// }

		// if(Level1>9){
		// 	Level1=9;
		// 	}else if(Level1<0){
		// 		Level1=0;
		// 	}


	//----------------------------------
	//请求数据
	var href= window.location.href;
 $.post(href,function(ret){
 	var ret=eval("("+ret+")");


 	for(var i=0;i<ret.data.buy_number.length;i++){
 		attackCount[i]=parseInt(ret.data.hit_number[i]);//导弹
 		attackCountHD[i]=parseInt(ret.data.buy_number[i]);//核弹
 	}
 	Level1=parseInt(ret.data.islandsCount);//进行到第几关(已经结束)
 	PersonCount_DJ=parseInt(ret.data.order_hit);//点击人数，导弹
 	PersonCount_CY=parseInt(ret.data.order_payment);//总参与人数,核弹

 	 var html=template('imgList',ret);
     document.getElementById('prizeBox').innerHTML = html;    

     var UserMessage=template('UserPic',ret);
     document.getElementById('equipment2').innerHTML = UserMessage;  


     var friendsHelp= '<% if(islandsTime.length>0){%>'
     	+'<% for (var i = 0; i <islandsTime.length; i++) { %>'
        +' <li><%= islandsTime[i].hit!=undefined?islandsTime[i].hit[0]:islandsTime[i].buy[0] %>帮助您投放了<%= islandsTime[i].hit!=undefined?"导弹"+islandsTime[i].hit[1]:"核弹"+islandsTime[i].buy[1]%></li>'
       	+'<%} }else{%>'	
       	+'<li>暂无记录</li>'
       	+'<% }%>'	
     var render=template.compile(friendsHelp);

     var FriendsHelp=render(ret.data);
     document.getElementById('con2').innerHTML=document.getElementById('con1').innerHTML = FriendsHelp;




     gameloop();
  });

	arms=new arms();
	//arms.init();
	islands=new islandsObj();
	islands.init();

	
}
function gameloop(){
	window.requestAnimFrame(gameloop);
	var now=Date.now();
	deltaTime=now-lastTime;
	lastTime=now;
	ctx1.clearRect(0,0,canWidth,canHeight);
	if(Animal){
		Animal=false;
		if(Level1>Level){
			if(Level>4){
				document.body.scrollTop=0;
			}
			
			Level++;
			arms.play(Level)
		}else if(Level1==9){
			console.log("结束");
		}else {
			document.getElementById('button5').style.display="none";
			if(PersonCount_DJ>attackCount[Level-1]&&PersonCount_DJ<attackCount[Level]){
				Level++;
				arms.play2(Level);
			}else if(PersonCount_DJ>=attackCount[Level]){
				Level++;
				arms.play(Level);
			}else if(PersonCount_DJ==attackCount[Level-1]){
				$("#mask").css({'display':'block'});
				$("#maskIsland").html($("#islandseffects"+(Level-1)).html());
				$("#mask").on('click',function(){
					$(this).css({'display':'none'});
				})
			}

			$("#button2").css({'display':'block'});
		}
		
	}
}

//辅助函数
// template.helper('hi',function(name,age){
// 	console.log('nihao'+name);
// 	console.log('nihao'+age);
// 	return 'result';
// })
//重置画布尺寸
function resizeCanvas() {
    w = can1.width =can2.width= window.innerWidth;
    h = can1.height =can2.height= window.innerHeight;
}
//滚动到屏幕底端
function scrollBottom(){
	var contentH=document.getElementById("bg").offsetHeight;
	var viewH=window.innerHeight;
	var timerScroll=setInterval(function(){
		if(contentH-viewH-document.body.scrollTop>5){
			document.body.scrollTop+=20;
		}else{
			document.body.scrollTop<=contentH-viewH;
			clearInterval(timerScroll);
		}
	},100);
};
//跳过动画
function TGDH(){
	document.getElementById('button5').style.display="none";
	Animal=false;
	arms.init();
}
//导弹支援
function DDZY(){
	$("#button2").css({'display':'none'});
	arms.playZY(Level);
}
//我也要玩
function playToo(){

	$("#playRule").css({'display':'block'});
	$("#playRule").on('click',function(){
		$(this).css({'display':'none'});
	})
}
//分享
function shareFriends(){
	$("#shareFriends").css({'display':'block'});
	$("#shareFriends").on('click',function(){
		$(this).css({'display':'none'});
	})
}
//信息滚动
 var area = document.getElementById('detailsShowItem1');
 var con1 = document.getElementById('con1');
 var con2 = document.getElementById('con2');
 var speed = 30;
 area.scrollTop = 0;
 con2.innerHTML = con1.innerHTML;
 function scrollUp(){
	 if(area.scrollTop >= con1.scrollHeight) {
		 area.scrollTop = 0;
		 }else{
		   area.scrollTop +=1; 
		 } 
		}
 setInterval("scrollUp()",speed);




