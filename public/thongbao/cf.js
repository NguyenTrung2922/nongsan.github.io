		$(function(){$(window).scroll(function(){if($(this).scrollTop()!=0){$('#totop').fadeIn();}else{$('#totop').fadeOut();}});$('#totop').click(function(){$('body,html').animate({scrollTop:0},800);});});

/*slide show img*/
$(function() {$('.img_gll').wmuSlider();  
animation: 'slide'
});

$(function() {$('.big_news_left').wmuSlider();  
animation: 'none'
});
/*//slide show img*/
/*thong bao*/
$(function(){	
		$("#scroll" ).imageScroller( {direction:'top',vertical: true,
		hoverPause:true,
		auto:3000,
		speed:5000} );
	}
	);  	
/*//thong bao*/	
$(document).ready(function() {
	$('.box_list').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});});
/*//Tin tuc su kien*/	
//Thong tin tuyen truyen
$(document).ready(function() {
	$('.responsive').slick({
  dots: true,
  autoplay: true,
  infinite: false,
  /*speed: 300,*/
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});});
//--thong tin tuyen truyen
//Tin noi bat

$(document).ready( function(){ 
        var buttons = { previous:$('.lof-slidecontent .button-previous') ,
                        next:$('.lof-slidecontent .button-next') };          
        $('.lof-slidecontent').lofJSidernews( { interval:5000,
    easing:'easeInOutQuad',
    duration:1200,
    auto:true,
    mainWidth:496,
    mainHeight:400,
    navigatorHeight     : 20,
    navigatorWidth      : 270,
    maxItemDisplay:3,
    buttons:buttons } );                        
    });//--tin noi bat
    
    //Tin chuyen de
 

/*=====================*/
function printbaiviet()
{
	var sPar=window.location.search;//?NewsId=14&CatId=1
    var index = sPar.indexOf('=');
    var index2 = sPar.indexOf('&');
	var val = sPar.substring(index+1,index2);
	window.open('print.aspx?NewsId='+val);

}
function fontPlus()
{
divTemp = document.getElementById('divNoiDungTinBai');
 if(divTemp.style.fontSize == '') 
  divTemp.style.fontSize = '14px';
 s = divTemp.style.fontSize;
 if((s.indexOf('px') > -1) && (s.indexOf('px') == (s.length - 2))) 
  s = s.substring(0, s.indexOf('px'));
 divTemp.style.fontSize = (parseFloat(s) + 1) + 'px';
 var s = divTemp.getElementsByTagName("p");
 var i;
 for (i = 0; i < s.length; i++) {
     //alert('divTemp.style.fontSize');
     s[i].style.fontSize = divTemp.style.fontSize;
 }
 var s = divTemp.getElementsByTagName("span");
 var i;
 for (i = 0; i < s.length; i++) {
     //alert('divTemp.style.fontSize');
     s[i].style.fontSize = divTemp.style.fontSize;
 }
var s = divTemp.getElementsByTagName("div");
 var i;
 for (i = 0; i < s.length; i++) {
     //alert('divTemp.style.fontSize');
     s[i].style.fontSize = divTemp.style.fontSize;
 }

 }

function fontMinus()
{
	divTemp = document.getElementById('divNoiDungTinBai');
 if(divTemp.style.fontSize == '') 
  divTemp.style.fontSize = '14px';
 s = divTemp.style.fontSize;
 if((s.indexOf('px') > -1) && (s.indexOf('px') == (s.length - 2))) 
  s = s.substring(0, s.indexOf('px'));
 divTemp.style.fontSize = (parseFloat(s) - 1) + 'px';
 var s = divTemp.getElementsByTagName("p");
 var i;
 for (i = 0; i < s.length; i++) {
     //alert('divTemp.style.fontSize');
     s[i].style.fontSize = divTemp.style.fontSize;
 }
 var s = divTemp.getElementsByTagName("span");
 var i;
 for (i = 0; i < s.length; i++) {
     //alert('divTemp.style.fontSize');
     s[i].style.fontSize = divTemp.style.fontSize;
 }
 var s = divTemp.getElementsByTagName("div");
 var i;
 for (i = 0; i < s.length; i++) {
     //alert('divTemp.style.fontSize');
     s[i].style.fontSize = divTemp.style.fontSize;
 }
}
 function copylinkurl() {
  	var u = window.location.href;
    var dummy = document.createElement("input");
    var text = u;

    document.body.appendChild(dummy);
    dummy.value = text;
    dummy.select();
    var success = document.execCommand("copy");
    document.body.removeChild(dummy);

	//alert('Đã sao chép thành công!');
}

$(function()
{
  
	dayName = new Array ("Chủ nhật","Thứ hai","Thứ ba","Thứ tư","Thứ năm","Thứ sáu","Thứ bảy")  
	monName = new Array ("1","2","3","4","5","6","7","8","9","10","11","12")  
	  
	now = new Date  
	
	var cal = dayName[now.getDay()]+ ", ngày " +now.getDate()+ "/" +monName[now.getMonth()]+ "/" +now.getFullYear(); 
	
	$('.cal').text(cal);
	
	var dayNameen = new Array ('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');  
	var monNameen = new Array ("January","February","March","April","May","June","July","August","September","October","November", "December");  


	var calen = now.toDateString();
    var s1,s2;
    //s1=calen.substring(0,3);
	//snam=Thu, Jul 15, 2021
 	//snam=calen.substring(calen.length-4);
	//s2=calen.substring(4,calen.length-5);
	//calen=s1+", "+s2+", "+snam;
	
	calen=dayNameen[now.getDay()]+ ", " + monNameen[now.getMonth()]+" " + now.getDate()+", " +now.getFullYear(); 
    $('.calen').text(calen);

});
$(function() {
		var theSearchBox = $('td.ms-sbcell input');
		var defaultSearchText = "Search this site";
		//alert(theSearchBox.val());
		var preferredSearchText = "Từ khóa tìm kiếm";
		var temp= window.location.toString();
		temp=temp.toLowerCase();
		var ip=temp.indexOf("/en");

		if(theSearchBox.val()=="Search this site..." && ip<0){
			theSearchBox.val(preferredSearchText);   //replace the text initially
		}
		theSearchBox.blur(function() { //replace the text when the search box loses focus and no value entered
		  if ($(this).val().indexOf(defaultSearchText) > -1)
		    $(this).val(preferredSearchText);  
		  
		});

  		$('.en td.ms-sbcell input').val("Search this site...");
});

  $(function() {$('.hotbanner-slide').wmuSlider();  
animation: 'slide'
});
/*slide banner*/ 
$(function() {
	cbpBGSlideshow.init();
});
/*left menu*/ 

/*slide tin noi bat*/
/*
$(document).ready( function(){	
		var buttons = { previous:$('#jslidernews3 .button-previous') ,
						next:$('#jslidernews3 .button-next') };			 
		$('#jslidernews3').lofJSidernews( { interval:5000,
			 	easing:'easeInOutQuad',
				duration:1200,
				auto:true,
				mainWidth:430,
				mainHeight:350,
				navigatorHeight		: 76,
				navigatorWidth		: 333,
				maxItemDisplay:4,
				buttons:buttons } );						
	});
	
 $(document).ready( function(){	
		var buttons = { previous:$('#jslidernews2 .button-previous') ,
						next:$('#jslidernews2 .button-next') };			 
		$('#jslidernews2').lofJSidernews( { interval:5000,
			 	easing:'easeInOutQuad',
				duration:1200,
				auto:true,
				mainWidth:430,
				mainHeight:350,
				navigatorHeight		: 76,
				navigatorWidth		: 333,
				maxItemDisplay:4,
				buttons:buttons } );						
	});
*/
/*m menu*/
$(function() {
	$('#menu_m').mmenu({
		extensions	: [ 'effect-slide-menu', 'pageshadow' ],
		counters	: true,
		
		navbars		: [
			{
				position	: 'top',
				content		: [ 'searchfield' ]
			}, {
				position	: 'top',
				content		: [
					'prev',
					'title',
					'close'
				]
			},
		]
	});
	});
/*thong bay run*/	
$(".r_scroll" ).imageScroller( {direction:'top',vertical: true,
		hoverPause:true,
		auto:3000,
		speed:5000} );

/*slide show img right*/			
 
	$(function() {$('.img_gll').wmuSlider();  
	animation: 'slide'
	});
 

/*show tab*/
$(function () {
    $('.tab-top a:first').tab('show');
    $('.tab-top a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
});
})
/*thong bao*/
  	$(function(){	
		$(".hotnews" ).imageScroller( {direction:'top',vertical: true,
		hoverPause:true,
		auto:3000,
		speed:5000} );
	}
	);
	
/*van ban moi
  	$(function(){	
		$(".news-hot" ).imageScroller( {direction:'top',vertical: true,
		hoverPause:true,
		auto:3000,
		speed:5000} );
	}
	);  	
*/
  //load video
	function loadvideoright(vName){
			try	{
				var vd=document.getElementById('VideoClip');
				var ids=vd.getElementsByTagName("source")[0];
				ids.src='/media/'+vName;
				vd.load();
				vd.play();
			}
			catch(ex){
				//alert(ex);
			}
 		}
function loadvideorighthome(vName){
	try	{
		var vd=document.getElementById('lstVideoClipHome');
		var ids=vd.getElementsByTagName("source")[0];
		ids.src= vName;
		vd.load();
		vd.play();
	}
	catch(ex){
		//alert(ex);
	}
}
//load audio
function loadaudioright(aName,Ten){
			try	{
				var TenBH=document.getElementById('TenBaiHat');
				TenBH.innerHTML=Ten;
				var vd=document.getElementById('Audiohome');
				var ids=vd.getElementsByTagName("source")[0];
				ids.src='/Audio/'+aName;
				vd.load();
				vd.play();
				
			}
			catch(ex){
				//alert(ex);
			}
 		}
