
var ur="";var urp=new Array();var urpv=new Array();var arrayCount=0;pageOpen=new Date();var appURL="http://cleaning.12371.cn";var reqURL=appURL+"/servlet/PostVisitDetail?";var clickURL=appURL+"/servlet/PostClickDetail?";var leaveURL=appURL+"/servlet/PostVisitLeave?";var GUID=Math.round(Math.random()*2147483647);var uexp=pageOpen.getTime()+(1000*60*60*24*50);var rtu="false";var x;var y;var scwidth;var scheight;addDOMLoadEvent=(function(){var load_events=[],load_timer,script,done,exec,old_onload,init=function(){done=true;clearInterval(load_timer);while(exec=load_events.shift())
exec();if(script)
script.onreadystatechange='';};return function(func){if(done)
return func();if(!load_events[0]){if(document.addEventListener)
document.addEventListener("DOMContentLoaded",init,false);if(window.ActiveXObject){document.write("<script id=__ie_onload defer src=//0><\/scr"
+"ipt>");script=document.getElementById("__ie_onload");script.onreadystatechange=function(){if(this.readyState=="complete")
init();};}
if(/WebKit/i.test(navigator.userAgent)){load_timer=setInterval(function(){if(/loaded|complete/.test(document.readyState))
init();},10);}
old_onload=window.onload;window.onload=function(){init();if(old_onload)
old_onload();};}
load_events.push(func);}})();function isHeatUrl(){var noajaxurl=appURL+"/servlet/IsHeatConfigUrl?cur="+getHref();var s=document.createElement('SCRIPT');s.src=noajaxurl;document.body.insertBefore(s,document.body.firstChild);}
function _Ajax(o){(function(option){var XMLHttpRequestObject=null;if(window.XMLHttpRequest){XMLHttpRequestObject=new XMLHttpRequest();if(XMLHttpRequestObject.overrideMimeType){XMLHttpRequestObject.overrideMimeType('text/xml');}}else if(window.ActiveXObject){try{XMLHttpRequestObject=new ActiveXObject("Msxml2.XMLHTTP");}catch(e){try{XMLHttpRequestObject=new ActiveXObject("Microsoft.XMLHTTP");}catch(e){}}}
if(XMLHttpRequestObject==null)
return;var setup={xml:"application/xml, text/xml",html:"text/html",script:"text/javascript, application/javascript",json:"application/json, text/javascript",text:"text/plain"};var async=option.async&&true;var done=0;var url=option.url;var type=option.type||'GET';var dataType=setup[option.dataType]||'*/*';var fn=option.success;XMLHttpRequestObject.open(type,url,async);XMLHttpRequestObject.setRequestHeader("Content-Type","application/x-www-form-urlencoded");XMLHttpRequestObject.setRequestHeader("Accept",dataType);XMLHttpRequestObject.onreadystatechange=function(){if(XMLHttpRequestObject.readyState==4&&XMLHttpRequestObject.status==200){done=1;fn(XMLHttpRequestObject.responseText);}};XMLHttpRequestObject.send(null);})(o);}
function getclick(ev){ev=ev||window.event;var image=document.createElement("img");image.height=0;image.width=0;if(ev.pageX!=null||ev.pageY!=null){x=parseInt(ev.pageX);y=parseInt(ev.pageY);}else{x=parseInt(ev.clientX+document.documentElement.scrollLeft||document.body.scrollLeft-document.body.clientLeft);y=parseInt(ev.clientY+document.documentElement.scrollTop||document.body.scrollTop-document.body.clientTop);if(x<0||y<0||!isFinite(x)||!isFinite(y))
return;}
if(browser[0]=="Internet Explorer"&&parseInt(browser[1])<8)
return;image.src=clickURL+"cur="+getHref()+"&x="+x+"&y="+y
+"&posXY="+x+"-"+y+"&clientHeight="
+document.body.clientHeight+"&clientWidth="
+document.body.clientWidth+"&bType="+browser[0]+"&bVersion="
+browser[1];}
var browser=new Array();var sEn=new Array();var keyWord=new Array();sEn[0]="google";keyWord[0]="q";sEn[1]="yahoo";keyWord[1]="p";sEn[2]="msn";keyWord[2]="q";sEn[3]="aol";keyWord[3]="query";sEn[4]="lycos";keyWord[4]="query";sEn[5]="ask";keyWord[5]="q";sEn[6]="altavista";keyWord[6]="q";sEn[7]="search";keyWord[7]="q";sEn[8]="netscape";keyWord[8]="query";sEn[9]="earthlink";keyWord[9]="q";sEn[10]="cnn";keyWord[10]="query";sEn[11]="looksmart";keyWord[11]="key";sEn[12]="about";keyWord[12]="terms";sEn[13]="excite";keyWord[13]="qkw";sEn[14]="mamma";keyWord[14]="query";sEn[15]="alltheweb";keyWord[15]="q";sEn[16]="gigablast";keyWord[16]="q";sEn[17]="voila";keyWord[17]="kw";sEn[18]="virgilio";keyWord[18]="qs";sEn[19]="teoma";keyWord[19]="q";sEn[20]="baidu";keyWord[20]="wd";sEn[21]="localhost";keyWord[21]="q";function gethn(uri){if(!uri||uri=="")
return"";ur=uri;var sub;if(ur.indexOf("?")!=-1){var url=ur.substring(0,ur.indexOf("?"));var para=ur.substring(ur.indexOf("?")+1,ur.length);while(para.length>0){if(para.indexOf("&")==-1){urp[arrayCount]=para.substring(0,para.indexOf("="));urpv[arrayCount]=para.substring(para.indexOf("=")+1,para.length);break;}
sub=para.substring(0,para.indexOf("&"));urp[arrayCount]=sub.substring(0,sub.indexOf("="));urpv[arrayCount]=sub.substring(sub.indexOf("=")+1,sub.length);para=para.substring(para.indexOf("&")+1,para.length);arrayCount++;}
return url;}else
return ur;}
function getHostName(url){url=url.substring(url.indexOf('://')+3,url.length);url=url.substring(0,url.indexOf("/"));return url;}
function getKeyword(url){var hostname;if(url.indexOf(".")==-1){hostname=url;}else{hostname=url.substring(url.indexOf("."),url.lastIndexOf("."));}
for(var i=0;i<sEn.length;i++){if(hostname==sEn[i]){for(var j=0;j<urp.length;j++){if(urp[j]==keyWord[i]){return urpv[j];}}}}
return"";}
function getFlash(){var f="-1",n=navigator;if(n.plugins&&n.plugins.length){for(var ii=0;ii<n.plugins.length;ii++){if(n.plugins[ii].name.indexOf('Shockwave Flash')!=-1){f=n.plugins[ii].description.split('Shockwave Flash ')[1];break;}}}else if(window.ActiveXObject){for(var ii=10;ii>=2;ii--){try{var fl=eval("new ActiveXObject('ShockwaveFlash.ShockwaveFlash."+ii+"');");if(fl){f=ii+'.0';break;}}
catch(e){}}}
if(f=="-1")
return f;else
return f.substring(0,f.indexOf(".")+2);}
function PostVisit()
{if(isReturn()==false)
{var i=new Image(1,1);i.src=reqURL+accessEvent();}
else
{var i=new Image(1,1);i.src=reqURL+accessEvent();}}
function videoEvent()
{var para="";para+="cur="+encodeURIComponent(getHref())+"&";para+="GUID="+getCookieValue("GUID")+"&";para+="title="+encodeURIComponent(document.title)+"&";para+="username="+getCookie("username");return para;}
function accessEvent()
{BrowserInfo();var para="";para+="cur="+encodeURIComponent(getHref())+"&";para+="ref="+encodeURIComponent(document.referrer)+"&";para+="urr="+getHostName(gethn(document.referrer))+"&";para+="GUID="+getCookieValue("GUID")+"&";para+="title="+encodeURIComponent(document.title)+"&";para+="pageCode="+pagecode+"&";para+="bType="+encodeURIComponent(browser[0])+"&";para+="bVersion="+browser[1]+"&";para+="bJava="+browser[2]+"&";para+="bFlash="+browser[3];return para;}
function isReturn()
{if(getCookieValue()=="noCookie")
{setCookie("GUID",GUID);setCookie("lastTime",pageOpen.getTime());setCookie("firstTime",pageOpen.getTime());return false;}
else
{if((getCookie("firstTime")+1000*60*60*24*50)<pageOpen.getTime())
{setCookie("GUID",GUID);setCookie("lastTime",pageOpen.getTime());setCookie("firstTime",pageOpen.getTime());return false;}
else
{setCookie("lastTime",pageOpen.getTime());return true;}
return true;}}
function BrowserInfo()
{var Sys={};var ua=navigator.userAgent.toLowerCase();var s;var navname;(s=ua.match(/msie ([\d.]+)/))?Sys.ie=s[1]:(s=ua.match(/firefox\/([\d.]+)/))?Sys.firefox=s[1]:(s=ua.match(/chrome\/([\d.]+)/))?Sys.chrome=s[1]:(s=ua.match(/opera.([\d.]+)/))?Sys.opera=s[1]:(s=ua.match(/version\/([\d.]+).*safari/))?Sys.safari=s[1]:0;if(Sys.ie){browser[0]="Internet Explorer";browser[1]=Sys.ie;}else if(Sys.firefox){browser[0]="Fire Fox";browser[1]=Sys.firefox;}else if(Sys.chrome){browser[0]="Google Chrome";browser[1]=Sys.chrome;}else if(Sys.opera){browser[0]="Opera";browser[1]=Sys.opera;}else if(Sys.safari){browser[0]="Safari";browser[1]=Sys.safari;}else{navname="Other";}
browser[2]=navigator.javaEnabled()?1:-1;browser[3]=getFlash();}
function getHref()
{return document.location.href;}
function setCookie(name,value)
{var expdate=new Date();var argv=setCookie.arguments;var argc=setCookie.arguments.length;var expires=15768000;var path="/";var domain="12371.cn";var secure=(argc>5)?argv[5]:false;if(expires!=null)
{expdate.setTime(uexp);document.cookie=name+"="+encodeURIComponent(value)+((expires==null)?"":("; expires="+expdate.toGMTString()))
+((path==null)?"":("; path="+path))+((domain==null)?"":("; domain="+domain))
+((secure==true)?"; secure=":"");}}
function delCookie(name)
{var exp=new Date();var domain="12371.cn";exp.setTime(exp.getTime()-1);var cval=getCookie(name);document.cookie=name+"="+cval+"; expires="+exp.toGMTString()+"; path=/"+";domain="+domain;}
function getCookie(fname)
{var name,value;var cookies=new Object();var beginning,middle,end;beginning=0;while(beginning<document.cookie.length)
{middle=document.cookie.indexOf("=",beginning);end=document.cookie.indexOf(";",beginning);if(end==-1)
{end=document.cookie.length;}
if((middle>end)||(middle==-1))
{name=document.cookie.substring(beginning,end);value="";}
else
{name=document.cookie.substring(beginning,middle);value=document.cookie.substring(middle+1,end);}
if(name==fname)
{return unescape(value);}
beginning=end+2;}}
function getCookieValue()
{var guid=getCookie("GUID");if(guid!=null)
{return guid;}
else
{return"noCookie";}}
function getRegUserCookie()
{return;}
function _init(){if(getCookie("cookie_url"))
{delCookie("cookie_url");}
if(getCookie("cookie_pcode"))
{delCookie("cookie_pcode");}
if(getCookie("cookie_title"))
{delCookie("cookie_title");}
if(getCookie("lastTime"))
{delCookie("lastTime");}
if(getCookieValue()=="noCookie")
{setCookie("GUID",GUID);setCookie("lastTime",pageOpen.getTime());setCookie("firstTime",pageOpen.getTime());setCookie("cookie_url",getHref());setCookie("cookie_pcode",pagecode);setCookie("cookie_title",encodeURIComponent(document.title));PostVisit();isHeatUrl();}
else{setCookie("lastTime",pageOpen.getTime());setCookie("cookie_url",getHref());setCookie("cookie_pcode",pagecode);setCookie("cookie_title",encodeURIComponent(document.title));PostVisit();isHeatUrl();}}
addDOMLoadEvent(_init());