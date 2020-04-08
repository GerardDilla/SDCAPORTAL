 var sc = 3
 var count = 1;
function Slider(){
 $(".slider #"+count+"").show("fade",500);
 $(".slider #"+count+"").delay(5000).hide("fade",500);
count =2;
setInterval(function(){
  $(".slider #"+count+"").show("fade",500);
  $(".slider #"+count+"").delay(5000).hide("fade",500);
  if (count == sc){
   count = 1;
  }else{
   count = count + 1;
  }
 },6500);
}



