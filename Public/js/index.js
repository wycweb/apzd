var shownum = $(".clientContent").length;
for(var i = 12; i < shownum; i++) {
			$(".clientContent").eq(i).hide();
	};
$(window).scroll( function() { 
var bianjienum=$(document).scrollTop();
var navmun=$(".Mynav").offset().top;
   if(bianjienum>=navmun){
	$(".jqnavwarp").show();
}else{
	$(".jqnavwarp").hide();
}

} );
var speed=500;
$(".Mynav ul li a").on("click",move);
function move(){
	var indexnum=$(this).parent("li").index();
	var target=$(".anchorAnminate").eq(indexnum);
	var distance=parseInt(target.offset().top);
	$(".Mynav ul li ").eq(indexnum).addClass("changeBgcolor").siblings().removeClass("changeBgcolor");
	$(".jqnav ul li ").eq(indexnum).addClass("changeBgcolor").siblings().removeClass("changeBgcolor");
	if (indexnum==6) {
		return
	} else{
		$("body").stop().animate({"scrollTop":distance},speed);
	}
	
	
	
}
$(".rightFloatBox").hover(function(){
	var num=$(this).index();
	$(this).addClass("changeBG");
	$(this).siblings(".rightFloatBox").removeClass("changeBG");
	$(".rightFloatChild").hide();
	$(".rightFloatChild").eq(num).show();
});
$(".rightWindow").mouseleave(function(){
	$(".rightFloatChild").hide();
	$(".rightFloatBox").removeClass("changeBG")
})
$(".showmore").on("click",showmore);
//var setHuifu=$(".setHuifu").offset().top;
//var setHuifu=$(".clientContent").offset().top;
function showmore() {
	

	if($(this).hasClass("chexiao")) {
		for(var i = 12; i < shownum; i++) {
			$(".clientContent").eq(i).hide(500);
		};
//		$("body").animate({
//			"scrollTop":setHuifu
//		},200);
		$(this).removeClass("chexiao").text("更多客户信息");
	} else {
		for(var i = 0; i < shownum; i++) {
			$(".clientContent").eq(i).show(500);
		}
		$(this).addClass("chexiao").text("收起客户信息");
	}

}
$(".contentBox").eq(0).show();
$(".jsUl li ").click(function(){
	var num=$(this).index();
	$(this).addClass("changeContentText").siblings().removeClass("changeContentText");
	$(".contentBox").eq(num).fadeIn(300).siblings(".contentBox").hide();
	
})