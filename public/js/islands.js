var islandsObj=function(){
	//中心点坐标
	this.x=[];
	this.y=[];
	//左上角坐标
	this.x1=[];
	this.y1=[];
	//中心点距离
	this.x2=[];
	this.y2=[];
	this.life=[];
	this.rectElement=[];
	this.angle;
	this.bigEye=new Image();
	this.island=document.getElementById("islandsEffects");
	this.islands=this.island.getElementsByTagName("div");
	console.log(this.islands.length,"islands");

}
islandsObj.prototype.init=function(){



	this.angle=0;
	this.bigEye.src="./src/爆炸.png";

//获取9个岛中心点的坐标

	for(var i=0;i<this.islands.length;i++){
			this.rectElement[i]=this.islands[i].getBoundingClientRect();
			
		}
		var scrollLeft = document.documentElement.scrollLeft || document.body.scrollLeft,
		scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
	for(var i=0;i<this.islands.length;i++){
		this.x[i]=this.rectElement[i].left+(this.rectElement[i].right-this.rectElement[i].left)/2+scrollLeft;
		this.y[i]=this.rectElement[i].top+(this.rectElement[i].bottom-this.rectElement[i].top)/2+scrollTop;
		// this.x[i]=this.rectElement[i].left+(this.rectElement[i].right-this.rectElement[i].left)/2;
		// this.y[i]=this.rectElement[i].top+(this.rectElement[i].bottom-this.rectElement[i].top)/2;
		this.x1[i]=this.rectElement[i].left;
		this.y1[i]=this.rectElement[i].top;
		this.x2[i]=(this.rectElement[i].right-this.rectElement[i].left)/2;
		this.y2[i]=(this.rectElement[i].bottom-this.rectElement[i].top)/2;
	}

		
	
}
islandsObj.prototype.draw=function(){
	// for(var i=0;i<this.islands.length;i++){
		
	// 	ctx1.drawImage(this.bigEye,this.x[i],this.y[i],81,81);
		
	// }
	
}

