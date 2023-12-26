/*
	demo.js
	JavaScript support code for the Style Sheet switcher code from
		http://www.thesitewizard.com/javascripts/change-style-sheets.shtml
		http://www.thesitewizard.com/javascripts/cookies.shtml
	Copyright 2008-2015 by Christopher Heng. All rights reserved.var temp=xcModPath.toLowerCase();
 
temp=xcModPath.substring(0,ip+ip2+2);

	http://www.thesitewizard.com/
*/
var style_domain =window.location.hostname.toLowerCase(); //"nongthongmoi.dongnai.gov.vn";
var style_cookie_name =style_domain+"_theme";//"nongthongmoi_theme" ;// //
var style_cookie_duration = 30 ;	// 1thang

function set_cookie ( cookie_name, cookie_value, lifespan_in_days, valid_domain )
{
    var d = new Date();
    d.setTime(d.getTime() + (style_cookie_duration*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = style_cookie_name + "=" + cookie_value+ "; " + expires;
 
}
function get_cookie ( cookie_name )
{
    // http://www.thesitewizard.com/javascripts/cookies.shtml
   var cookie_string = document.cookie;   
	if (cookie_string.length != 0) {
	    //var cookie_value = cookie_string.match ( '(^|;)[\s]*' + cookie_name + '=([^;]*)' );
	   var st=cookie_string;
	   var i=st.indexOf(style_cookie_name);
	   st=st.substr(i);
	   i=st.indexOf(";");
	   st=st.substr(0,i);
	   i=st.indexOf("=");
	   st=st.substr(i+1);
	 
	   return st;
	}
    return '' ;
}

function switch_style ( css_title )
{
  // You may use this script on your site free of charge provided you
  // do not remote this notice or the URL below.
  // http://www.thesitewizard.com/javascripts/change-style-sheets.shtml
  // Please see the above article for explanations on how to use and
  // a demo. red blue yellow green
  try{
	  var i, link_tag ;
	  link_tag = document.getElementsByClassName("stylecolor");
	  for (i = 0; i < link_tag.length ; i++ ) { 
	      if (link_tag[i].title == css_title) {
	        link_tag[i].disabled = false ;
	        link_tag[i].rel = "stylesheet";
	      }
	      else{
	      	link_tag[i].disabled = true ;
	      	link_tag[i].rel = "alternate stylesheet";
	      }
  }   
   set_cookie(style_cookie_name, css_title, style_cookie_duration, style_domain);
  }
  catch(ex)
  {
   
  }
}
function set_style_from_cookie()
{
  var css_title = get_cookie(style_cookie_name);
  if (css_title.length>0){

    switch_style( css_title );
  }
}
 
function onload_handler()
{
 set_style_from_cookie();
}
 