var arms=function(){
	this.equipment2=document.getElementById("equipment2");
}
arms.prototype.getElement=function(){
	
}
arms.prototype.init=function(){
	// 9个导弹
	TGDHTrue=true;
	for(var i=Level;i<=Level1;i++){//跳过动画
		console.log(i);
		if(i==Level1){
			funParabola(document.getElementById("elementHJ"+i), document.getElementById("islands"+i),i,"TGDH"
			,funParabola(this.equipment2,document.getElementById("islands"+Level1),0,"hangmu")
				).init();
			 
	 	 return;
		}
		funParabola(document.getElementById("elementHJ"+i), document.getElementById("islands"+i),i,"TGDH").init();
		Level++;
	}
		// //飞机
		//  funParabola(document.getElementById("equipment1"), document.getElementById("aims1"),0,"feiji").init();
	
}
arms.prototype.play=function(Level){
	funParabola(document.getElementById("element"+Level), document.getElementById("islands"+Level),Level,"DUOQU"
			,funParabola(this.equipment2, document.getElementById("islands"+Level),0,"hangmu")).init();
}
arms.prototype.play2=function(Level){
	funParabola(document.getElementById("element"+Level), document.getElementById("islands"+Level),Level,"DAJI").init();	
}
arms.prototype.playZY=function(Level){
	if(Level==0){
		Level++;
	}
	funParabola(document.getElementById("element"+Level), document.getElementById("islands"+Level),Level,"ZHIYUAN").init();	
}
