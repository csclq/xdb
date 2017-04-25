<?php
/*
*@param  string $bgImgPath 背景图片路径
*@param  array $font_set 合成文字设置
*  {
*     @param string $flag 标识
*     @param int $fontSize  字体大小
*     @param int $angle  字体旋转角度
*     @param int $left   左偏移
*     @param int $top    上偏移
*     @param int $color   字体颜色
*     @param string $font   字体文件路径
*     @param  string $str    合成的字符串
*  }
*
* 
*@param  array $img_set 合成图片设置
* {
*     @param string $flag 标识
*     @param string path 要合成的图片路径
*     @param int $width   宽度
*     @param int $height  高度
*     @param int $left   左偏移
*     @param int $top    上偏移
*    
* }
*
*
* @param string $saveName 最终图片保存名字(请包含您所需的路径和文件名，不包括文件后缀)
 */


function makeCard($bgImgPath='',
    $font_set=array( array('flag'=>'','fontSize'=>20,'angle'=>0,'left'=>0,'top'=>0,'color'=>0,'font'=>'','str'=>'',)),
    $img_set=array( array('flag'=>'','path'=>'','width'=>0,'height'=>0,'left'=>0,'top'=>0,)),
    $saveName='a'
    ){
     
     if(empty($bgImgPath)){


     }elseif(empty($font_set)){


     }elseif(empty($img_set)){

        
     }
    
   
    
    //$qCodePath = 'qcode.jpg';
     
    //根据图片路径生成背景图片
    $bgImg = imagecreatefromstring(file_get_contents($bgImgPath));

   //合成字体设置


    
    foreach ($font_set as $key => $val) {
         
          ImageTTFText($bgImg, $val['fontSize'], $val['angle'], $val['left'], $val['top'], $val['color'], $val['font'],$val['str']);
    }

  
    foreach ($img_set as $k=>$v){
        $qCodeImg = imagecreatefromstring(file_get_contents($v['path']));
        list($qCodeWidth, $qCodeHight, $qCodeType) = getimagesize($v['path']);


        $dst_im= imagecreatetruecolor($v['width'],$v['height']);
        
        imagecopyresized($dst_im,$qCodeImg, 0, 0, 0, 0, $v['width'], $v['height'], $qCodeWidth,$qCodeHight);
       
        imagecopymerge($bgImg, $dst_im, $v['left'], $v['top'], 0, 0, $v['width'],$v['height'], 100);
         
      
 
        

    }

   
     
    





    list($bgWidth, $bgHight, $bgType) = getimagesize($bgImgPath);
    $path=BASE_PATH.'/public/img/recommend/';
    switch ($bgType) {
        case 1: //gif
           // header('Content-Type:image/gif');
            $saveName .= ".gif";

           imagegif($bgImg,$path.$saveName);
            break;
        case 2: //jpg
            //header('Content-Type:image/jpg');
            $saveName .= ".jpg";
            imagejpeg($bgImg,$path. $saveName);
            break;
        case 3: //png
           // header('Content-Type:image/png');
            $saveName .= ".png";
            imagepng($bgImg,$path.$saveName);
            break;
        default:
            break;
    }

 
  
   
  return $saveName;
}



