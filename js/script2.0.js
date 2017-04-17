var oldIE = document.all?true:false;
//if (oldIE) {document.captureEvents(Event.MOUSEMOVE);}
var tempX = 0;
var tempY = 0;
var scroll = 0;
var showsuggest = 0;

var imagesLoaded = 0;

function countImages(){
	return imagesLoaded++;
}

function mousepos(e,what) {
	if (oldIE) {
		//tempX = event.clientX + document.body.scrollLeft;
		//tempY = event.clientY + document.body.scrollTop;
		//scroll = document.body.scrollTop; ie7
		tempX = event.clientX + document.body.parentElement.scrollLeft;
		tempY = event.clientY + document.body.parentElement.scrollTop;
		scroll = document.body.parentElement.scrollTop;
	}
	else {
		tempX = e.pageX;
		tempY = e.pageY;
		scroll = window.pageYOffset;
	}  
	if (tempX < 0){tempX = 0;}
	if (tempY < 0){tempY = 0;}
	drawBox(what,tempX,tempY);
	return true;
}

var displayStyle = 'block';
var fromRight = 15;
var fromBottom = 15;
var imgLoadBlockCount = 100;
var scrolling = true;

function scrollCheck(){
	if(scrolling){
		if (oldIE) {
			//scroll = document.body.scrollTop; ie7
			scroll = document.body.parentElement.scrollTop;
			//cH = document.body.clientHeight; ie7
			cH = document.documentElement.clientHeight;
		}
		else{
			scroll = window.pageYOffset;
			cH = document.documentElement.clientHeight;
		}
		boj = document.getElementById('loadingWrap');
		if(boj.offsetTop-cH<scroll){
			shortcut();
		}
		setTimeout("scrollCheck();", 1000);
	}
}

function shortcut(){
	show('loading');
	pull('hurf','ajax/page/'+retrieve('page')+'/'+retrieve('args'));
	loadBlock(retrieve('showcount'))
	set(parseInt(retrieve('page'))+1,'page');
}

function drawBox(xname,x,y){
	var shiftLeft = 0;
	var shiftUp = 0;
	var obj = document.getElementById("info_"+xname);
	show("info_"+xname);
	obj.style.position='absolute';
	cW = (oldIE) ? document.body.clientWidth : document.documentElement.clientWidth;
	cH = (oldIE) ? document.body.clientHeight : document.documentElement.clientHeight;
	if(obj.offsetWidth+x>cW-fromRight){
		shiftLeft=cW-(obj.offsetWidth+x+fromRight);
	}
	if(obj.offsetHeight+y>cH+scroll-fromBottom){
		shiftUp=(cH+scroll)-(obj.offsetHeight+y+fromBottom);
	}
	if((shiftLeft!=0)&&(shiftUp!=0)){
		shiftLeft = 0-fromRight-obj.offsetWidth;
		shiftUp = 0-fromBottom-obj.offsetHeight;
	}
	//fill('scroll:'+scroll+' shift up:'+shiftUp+' shift left:'+shiftLeft+' client W:'+cW+' Client H:'+cH+' x:'+x+' y:'+y+' off W:'+obj.offsetWidth+' off H:'+obj.offsetHeight,'ratings_'+xname);
	obj.style.left=shiftLeft+x-obj.offsetParent.offsetLeft+'px';	
	obj.style.top=shiftUp+y-obj.offsetParent.offsetTop+'px';
}

function pull(where,args,how){
	var xmlhttp=null;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}
	else if (window.ActiveXObject){
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	if (xmlhttp!=null){
		xmlhttp.open("GET",args,false);
		xmlhttp.send(null);
		if(how==1){
			document.getElementById(where).innerHTML=xmlhttp.responseText;
		}
		else{
			document.getElementById(where).innerHTML+=xmlhttp.responseText;
		}
	}
	else{
		alert("Your browser does not support XMLHTTP.");
	}
}

function pull2(where,args){
	var xmlhttp=null;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}
	else if (window.ActiveXObject){
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	if (xmlhttp!=null){
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4){
				document.getElementById(where).innerHTML = xmlhttp.responseText;
			}
			else{
				document.getElementById(where).innerHTML = '';
			}
		}
		xmlhttp.open("GET",args,true);
		xmlhttp.send(null); 
	}
}

function changeext(where,newExt){
	var inputObj = document.getElementById(where);
	inputObj.value = inputObj.value.substr(0,inputObj.value.indexOf('.'))+'.'+newExt;
}

function showhide(obj, e){
	if (e.relatedTarget) {
		if(e.relatedTarget != obj && e.relatedTarget.parentNode != obj){
			hide(obj.id,500);
		}
	}
	else{
		if(e.toElement != obj && e.toElement.parentNode != obj){
			hide(obj.id,500);
		}
	}
}

function show(id){
	document.getElementById(id).style.display=displayStyle;
}

function hide(id, time){
	if (!time) var time = 0;
	setTimeout("document.getElementById('"+id+"').style.display='none';",time);
}

function fill(what,where){
	document.getElementById(where).innerHTML=what;
}

function set(what,where){
	document.getElementById(where).value=what;
}

function iSelect(dropDownId){
	var dropDown = document.getElementById(dropDownId);
	imagesLoaded=0;
	return (dropDown.options[dropDown.selectedIndex].value);
}

function prioritize(primary,secondary){
	if(document.getElementById(primary).value!=""){
		return document.getElementById(primary).value;
	}
	else{
		return document.getElementById(secondary).value;
	}
}

function retrieve(where){
	return (document.getElementById(where).value);
}

function checksubmit(e){
	var code;
	if(window.event){
		code = window.event.keyCode;
	}
	else{
		code = e.which;
	}
	if (code == 13){
		pull('hurf','ajax/search/'+retrieve('searchField'),1);
	}
	else{
		return true;
	}
}

function ffffff(){
	if(retrieve('searchField').length > 1){
		boxunder('searchField','suggestbox');
		show('suggestbox');
		pull2('suggestbox','ajax/suggest/'+retrieve('searchField'));
	}
}

//testing this
function loadImg(imgUrl){
	var bgImage = new Image(); 
	if(window.addEventListener){
		bgImage.src = imgUrl;
		bgImage.addEventListener('load',function(){imgLoadBlockCount = ++imagesLoaded;},true);
	}
	else{
		bgImage.attachEvent('onload',function(){imgLoadBlockCount = ++imagesLoaded;});
		bgImage.src = imgUrl;
	}
}

function loadBlock(num){
	if(imagesLoaded/num<.8){
		setTimeout("loadBlock("+num+");",100);
	}
	else{
		document.getElementById('loading').style.display='none';
	}
}

function boxunder(top,bot){
	tobj = document.getElementById(top);
	bobj = document.getElementById(bot);
	bobj.style.marginTop=parseInt(tobj.offsetHeight+tobj.offsetTop)+'px';
	bobj.style.marginLeft=tobj.offsetLeft+'px';
}