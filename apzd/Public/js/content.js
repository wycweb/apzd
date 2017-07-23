
$(".Mynav ul li a").on("click",move);
function move(){
	var indexnum=$(this).parent("li").index();
	$(".Mynav ul li ").eq(indexnum).addClass("changeBgcolor").siblings().removeClass("changeBgcolor");
	$(".jqnav ul li ").eq(indexnum).addClass("changeBgcolor").siblings().removeClass("changeBgcolor");
	
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