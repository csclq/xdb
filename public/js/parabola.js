//移动的dom，目标dom，角度，速度,回调函数
var funParabola = function(element, target,deg,spead,fun,options) {
	/*
	 * 网页模拟现实需要一个比例尺
	 * 如果按照1像素就是1米来算，显然不合适，因为页面动不动就几百像素
	 * 页面上，我们放两个物体，200~800像素之间，我们可以映射为现实世界的2米到8米，也就是100:1
	 * 不过，本方法没有对此有所体现，因此不必在意
	 */

	 switch(spead){
	 	case "DUOQU":spd=500.67;break;
	 	case "feiji":spd=50;break;
	 	case "hangmu":spd=30;break;
	 	default:spd=166.67;break;
	 }
	 var defaults = {
		speed:spd,// 166.67, // 每帧移动的像素大小，每帧（对于大部分显示屏）大约16~17毫秒
		curvature: 0.001,  // 实际指焦点到准线的距离，你可以抽象成曲率，这里模拟扔物体的抛物线，因此是开口向下的
		progress: function() {},
		complete: function() {}
	};
	
	var params = {}; options = options || {};
	
	for (var key in defaults) {
		params[key] = options[key] || defaults[key];
	}
	
	var exports = {
		mark: function() { return this; },
		position: function() { return this; },
		move: function() { return this; },
		init: function() { return this; },
		coolDown:function(){return this;},
		huidiao:function(){return this;},
		dajihuidiao:function(){return this;},
		zhiyuanhuidiao:function(){return this;}
	};
	
	/* 确定移动的方式 
	 * IE6-IE8 是margin位移
	 * IE9+使用transform
	 */
	 var moveStyle = "margin", testDiv = document.createElement("div");
	 if ("oninput" in testDiv) {
	 	["", "ms", "webkit"].forEach(function(prefix) {
	 		var transform = prefix + (prefix? "T": "t") + "ransform";
	 		if (transform in testDiv.style) {
	 			moveStyle = transform;
	 		}
	 	});		
	 }

	// 根据两点坐标以及曲率确定运动曲线函数（也就是确定a, b的值）
	/* 公式： y = a*x*x + b*x + c;
	*/
	var a = params.curvature, b = 0, c = 0;

	
	// 是否执行运动的标志量
	var flagMove = true;
	
	if (element && target && element.nodeType == 1 && target.nodeType == 1) {
		var rectElement = {}, rectTarget = {};
		
		// 移动元素的中心点位置，目标元素的中心点位置
		var centerElement = {}, centerTarget = {};
		
		// 目标元素的坐标位置
		var coordElement = {}, coordTarget = {};
		
		// 标注当前元素的坐标
		exports.mark = function() {
			if (flagMove == false) return this;
			if (typeof coordElement.x == "undefined") this.position();
			element.setAttribute("data-center", [coordElement.x, coordElement.y].join());
			target.setAttribute("data-center", [coordTarget.x, coordTarget.y].join());

			return this;
		}
		
		exports.position = function() {
			if (flagMove == false) return this;
			
			var scrollLeft = document.documentElement.scrollLeft || document.body.scrollLeft,
			scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
			
			//初始位置
			if (moveStyle == "margin") {
				element.style.marginLeft = element.style.marginTop = "0px";
			} else {
				element.style[moveStyle] = "translate(0, 0)";
			}

			
			// 四边缘的坐标
			rectElement = element.getBoundingClientRect();
			rectTarget = target.getBoundingClientRect();
			
			// 移动元素的中心点坐标
			centerElement = {
				x: rectElement.left + (rectElement.right - rectElement.left) / 2 + scrollLeft,
				y: rectElement.top + (rectElement.bottom - rectElement.top) / 2	+ scrollTop
			};
			
			// 目标元素的中心点位置
			centerTarget = {
				x: rectTarget.left + (rectTarget.right - rectTarget.left) / 2 + scrollLeft,
				y: rectTarget.top + (rectTarget.bottom - rectTarget.top) / 2 + scrollTop		

            };
            // 转换成相对坐标位置
			coordElement = {
				x: 0,
				y: 0	
			};
			coordTarget = {
				x: -1 * (centerElement.x - centerTarget.x),
				y:  -1 * (centerElement.y - centerTarget.y)	
			};
			
			
			/*
			 * 因为经过(0, 0), 因此c = 0
			 * 于是：
			 * y = a * x*x + b*x;
			 * y1 = a * x1*x1 + b*x1;
			 * y2 = a * x2*x2 + b*x2;
			 * 利用第二个坐标：
			 * b = (y2+ a*x2*x2) / x2
			 */
			// 于是
			b = (coordTarget.y - a * coordTarget.x * coordTarget.x) / coordTarget.x;	

			return this;
		};		
		
		// 按照这个曲线运动
		exports.move = function() {
			// 如果曲线运动还没有结束，不再执行新的运动
			if (flagMove == false) return this;
			
			var startx = 0, rate = coordTarget.x > 0? 1: -1;

			var step = function() {
				// 切线 y'=2ax+b
				var tangent = 2 * a * startx + b; // = y / x
				// y*y + x*x = speed
				// (tangent * x)^2 + x*x = speed
				// x = Math.sqr(speed / (tangent * tangent + 1));
				startx = startx + rate * Math.sqrt(params.speed / (tangent * tangent + 1));
				
				// 防止过界
				if ((rate == 1 && startx > coordTarget.x) || (rate == -1 && startx < coordTarget.x)) {
					startx = coordTarget.x;
				}
				var x = startx, y = a * x * x + b * x;
				
				// 标记当前位置，这里有测试使用的嫌疑，实际使用可以将这一行注释
				element.setAttribute("data-center", [Math.round(x), Math.round(y)].join());

				//
				var rotate=0;
				switch(deg){
					case 1:
					rotate=-60;
					break;
					case 2:
					rotate=-20;
					break;
					case 3:
					rotate=0;
					break;
					case 4:
					rotate=-90;
					break;
					case 5:
					rotate=-100;
					break;
					case 6:
					rotate=-100;
					break;
					case 7:
					rotate=10;
					break;
					case 8:
					rotate=30;
					break;
					case 9:
					rotate=-130;
					break;
					default:
					break;
				};
				
				// x, y目前是坐标，需要转换成定位的像素值
				if (moveStyle == "margin") {
					element.style.marginLeft = x + "px";
					element.style.marginTop = y + "px";
				} else {
					element.style[moveStyle] = "translate("+ [x + "px", y + "px"].join() +")"+" "+"rotate("+ [rotate + "deg"].join() +")";
				}
				
				if (startx !== coordTarget.x) {
					params.progress(x, y);
					window.requestAnimationFrame(step);	
				} else {
					// 运动结束，回调执行
					exports.huidiao();
					params.complete();
					flagMove = true;	
					
					
				}
			};
			window.requestAnimationFrame(step);
			flagMove = false;
			
			return this;
		};
		
		// 初始化方法
		exports.init = function() {
			this.position().mark().move();
		};
		exports.coolDown=function(target){
			var value=[];
			var timers=[];
			var num;
			num=parseInt(target.id.substring(7));
			value[num]=100;
			timers[num]=setInterval(function(){
				value[num]-=8;
				target.style.filters='alpha(opacity='+value[num]+')';
				target.style.opacity =value[num]/100; 
			if(value[num]<=0){
				value[num]=0;
				if(value[num]==0){
					target.style.backgroundImage='url("/src/guoqi.png")';
					target.style.backgroundSize="cover";
					target.style.filters='alpha(opacity=100)';
					target.style.opacity =1; 
					target.style.width=target.style.height="50px";
				//target.style.bottom=target.style.left="0px";
				if(fun!=null){
					document.getElementById("islandsPrize"+num).style.opacity=1;
					funParabola(document.getElementById("islandsPrize"+num), document.getElementById("prizeBox"+num),0,"jiangli").init();
					fun.init();
					}
				}
				clearInterval(timers[num]);
					}
				},20);
			}
		exports.dajihuidiao=function(){
			var value;
			var timers;
			value=100;
			timers=setInterval(function(){
				value-=8;
				target.style.filters='alpha(opacity='+value+')';
				target.style.opacity =value/100; 
			if(value<=0){
				value=0;
				if(value==0){
					$("#mask").css({'display':'block'});
					$("#maskIsland").html($("#islandseffects"+(Level-1)).html());
					$("#mask").on('click',function(){
						$(this).css({'display':'none'});
					})
				}
				clearInterval(timers);
					}
				},20);
		}
		exports.zhiyuanhuidiao=function(){
			var value;
			var timers;
			value=100;
			timers=setInterval(function(){
				value-=8;
				target.style.filters='alpha(opacity='+value+')';
				target.style.opacity =value/100; 
			if(value<=0){
				value=0;
				if(value==0){
					
				}
				clearInterval(timers);
					}
				},20);	
		}
			
	exports.huidiao=function(){
		var num=parseInt(element.id.substring(7));
		if(spead=="DUOQU"){
			//element.style.display="none";
			element.style.marginLeft = element.style.marginTop = "0px";
			element.style.transform = "translate(0, 0)";
			element.style.right="-50px";
			element.style.top="80px";
			if(TGDHTrue){
				return;
			}
			
			if(attackCount[num-1]>currently){
				document.getElementById("islandsLifeItem"+num).style.width=(((attackCount[num-1]-currently)/attackCount[num-1]))*80+"px";
				currently++;
				target.style.backgroundImage="url(/src/爆炸.png)";	
				target.style.width=(target.getBoundingClientRect().right-target.getBoundingClientRect().left)+0.5+"px";
				target.style.height=(target.getBoundingClientRect().bottom-target.getBoundingClientRect().top)+0.5+"px";
				funParabola(element, target,deg,"DUOQU",fun).init();	
			}else{
				document.getElementById("islandsLifeItem"+num).style.width="0px";
				currently=1;
				target.style.backgroundImage="url(/src/爆炸.png)";	
				exports.coolDown(target);		
			}		
		}else if(spead=="TGDH"){//跳过动画
			num=parseInt(element.id.substring(9));
			element.style.marginLeft = element.style.marginTop = "0px";
			element.style.transform = "translate(0, 0)";
			element.style.right="-50px";
			element.style.top="80px";
			if(HfangCount[num-1]>=HfangCount1[num-1]){	
				HfangCount1[num-1]++;
				target.style.backgroundImage="url(/src/蘑菇云.png)";
				target.style.width="150px"	;
				target.style.height="150px";
				//target.style.width=(target.getBoundingClientRect().right-target.getBoundingClientRect().left)+10+"px";
				//target.style.height=(target.getBoundingClientRect().bottom-target.getBoundingClientRect().top)+5+"px";
				funParabola(element,target,deg,spead,fun).init();
					
			}else{

				document.getElementById("islandsPrize"+num).style.opacity=1;
				funParabola(document.getElementById("islandsPrize"+num), document.getElementById("prizeBox"+num),0,"jiangli").init();
				document.getElementById("islandsLifeItem"+num).style.width="0px";
				element.style.display="none";
				exports.coolDown(target);
			}
					
		}else if(spead=="hangmu"){

			element.style.marginLeft = element.style.marginTop = "0px";
			element.style.transform = "translate(0, 0)";
			element.style.left=centerTarget.x-(rectElement.right - rectElement.left) / 2+"px";
			element.style.top=centerTarget.y-(rectElement.bottom-rectElement.top)/2+"px";
			// console.log(element.style.left,element.style.top,"element");
			Animal=true;
			TGDHTrue=false;
		}else if(spead=="jiangli"){
			var value=[];
			var timers=[];
			value[num+50]=0;
			element.style.opacity=1;
			timers[num+50]=setInterval(function(){
				value[num+50]++;
				target.getElementsByTagName("img")[0].style.filters='alpha(opacity='+value[num+50]+')';
				target.getElementsByTagName("img")[0].style.opacity =value[num+50]/100; 
				element.style.width=0;
				if(value[num+50]>=100){
					value[num+50]=100;
						//target.style.width=target.style.height="50px";
						//target.style.bottom=target.style.left="0px";
						// target.style.backgroundColor='rgba(0,0,0,0)';
					
					clearInterval(timers[num+50]);
				}

			},20);
		}else if(spead=="DAJI"){
			//element.style.display="none";
			element.style.marginLeft = element.style.marginTop = "0px";
			element.style.transform = "translate(0, 0)";
			element.style.right="-50px";
			element.style.top="80px";
			
			if(PersonCount_DJ>currently){
				document.getElementById("islandsLifeItem"+num).style.width=(((attackCount[num-1]-currently)/attackCount[num-1]))*80+"px";
				currently++;
				target.style.backgroundImage="url(/src/爆炸.png)";	
				target.style.width=(target.getBoundingClientRect().right-target.getBoundingClientRect().left)+0.5+"px";
				target.style.height=(target.getBoundingClientRect().bottom-target.getBoundingClientRect().top)+0.5+"px";
				funParabola(element, target,deg,"DAJI",fun).init();	
			}else{
				// document.getElementById("islandsLifeItem"+num).style.width="0px";
				// currently=1;
				target.style.backgroundImage="url(/src/爆炸.png)";	
				exports.dajihuidiao(target);
			}	
		}else if(spead=="ZHIYUAN"){
			element.style.marginLeft = element.style.marginTop = "0px";
			element.style.transform = "translate(0, 0)";
			element.style.right="-50px";
			element.style.top="80px";

			target.style.backgroundImage="url(/src/爆炸.png)";	
			exports.zhiyuanhuidiao(target);
		}
		return this;
	}
	return exports;
	}	
};
function ElementPosition(element){

}


