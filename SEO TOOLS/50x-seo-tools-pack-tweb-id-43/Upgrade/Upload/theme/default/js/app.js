var baseUrl = '/';
var badWords = [];
var badStr = 'Bad Word Found!';
var oopsStr = 'Oops...';
var emptyStr = 'Domain name field can\'t empty!';
var axPath = '/ajax';
var imageVr = 'Please verify your image verification';
var capCodeWrg = 'Your image verification code is wrong!'
var inputEm = 'Input data field can\'t empty!';
var inputURL = 'Enter a valid URL';
var charLeft = 'Characters left';
var capRefresh = 'Loading...';
var titleCheck = 'Site title field can\'t be empty!';
var desCheck = 'Site dscription field can\'t be empty!';
var keyCheck = 'Site keywords field can\'t be empty!';
var searchNo = 'No result found related to your keyword...';
var tools,toolsURL;

function containsAny(str, substrings) {
    for (var i = 0; i != substrings.length; i++) {
       var substring = substrings[i];
       if (str.indexOf(substring) != - 1) {
         return substring;
       }
    }
    return null; 
}

function fixURL() {
    //Check URL
    var myUrl= jQuery.trim($('input[name=url]').val());
    if (myUrl==null || myUrl=="") {
        sweetAlert(oopsStr, emptyStr , "error");
        return false;
    }
    //Fix URL
    if (myUrl.indexOf("http://") == 0) {
        myUrl=myUrl.substring(7);
        document.getElementById("url").value = myUrl;
    }
    if (myUrl.indexOf("https://") == 0) {
        myUrl=myUrl.substring(8);
        document.getElementById("url").value = myUrl;
    }
    if(containsAny(myUrl, badWords) !== null){
        sweetAlert(oopsStr, badStr , "error");
        return false;
    }
    return true;
}

function getCapKeys(capType){
    var postName,capCode;
    var bolCheck = false;
    if(capType == 'phpcap'){
        capCode = $('input[name=scode]').val();
        postName = 'scode';
        bolCheck = true;
    }else if(capType == 'recap'){
        capCode = grecaptcha.getResponse();
        postName = 'g-recaptcha-response';
        bolCheck = true;
    }
    return [bolCheck, postName, capCode];
}

function reloadCap(){
     $('input[name="scode"]').val('');
     $('input[name="scode"]').attr("placeholder", "Loading...");
     $('input[name="scode"]').prop('disabled', true);
     $('#capImg').css("opacity","0.5");
     jQuery.get(baseUrl + 'phpcap/reload',function(data){
        $('#capImg').attr('src', jQuery.trim(data));
        $('input[name="scode"]').attr("placeholder", "");
        $('input[name="scode"]').prop('disabled', false);
        $('#capImg').css("opacity","1");
     });    
}
$("#description").focus(function (){ countDes() });
$("#description").keypress(function (){ countDes() });
$("#description").blur(function (){ countDes(); });
$("#description").click(function (){ countDes() });

$("#metatitle").focus(function (){ countTitle() });
$("#metatitle").keypress(function (){ countTitle() });
$("#metatitle").blur(function (){ countTitle(); });
$("#metatitle").click(function (){ countTitle() });

function searchResults(sidebar){
    var searchTxt,searchRes,sidebarmatch = '';
    if(sidebar){
        searchTxt = "#sidebarsearch";
        searchRes = "#sidebar-results";
        sidebarmatch = 'sidebarmatch';
    }else{
        searchTxt = "#search";
        searchRes = "#index-results";
    }
	var val = clearText($(searchTxt).val());
	$(searchRes).html('');
	$(searchRes).hide();
	if(val.length < 2){
		return false;
	}
	$(searchRes).show();
	var matches = 0;
	$(tools).each(function(count){
		var myVal = clearText(tools[count]);
		if(myVal.match(val)){
			matches++;
			var href = toolsURL[count];
			var re = new RegExp(val,"gi");
			var toolName = tools[count].replace(re, "<strong>"+val+"</strong>");
			$(searchRes).append('<span class="match '+sidebarmatch+'"><a href="'+href+'">'+capitalizeFirstLetter(toolName)+ '</a></span>');
		}
	});
	if(matches < 1)
		$(searchRes).html(searchNo);
}

function capitalizeFirstLetter(string) {
   string = string.trim();
    if(string.charAt(0) == '<')
         return '<strong>' + string.charAt(8).toUpperCase() + string.slice(9);
    else
        return string.charAt(0).toUpperCase() + string.slice(1);
}

function clearText(text) {
	myStr = text.toLowerCase();
	myStr = myStr.replace(/ /g,"");
	myStr = myStr.replace(/[^a-zA-Z0-9]+/g,"");
	myStr = myStr.replace(/(\s)+/g, "");
	return myStr;
}
    
function countDes() {
    var myDes= $('textarea#description').val();
    if(myDes.length <= 320)
        $("#limitBar").html("<span>(" + charLeft + ": " + (320 - myDes.length) + ")</span>");  
    else
        $("#limitBar").html("<span style='color: red;'>(" + charLeft + ": " + (320 - myDes.length) + ")</span>"); 
}

function countTitle() {
    var mTitle= jQuery.trim($('input[name=title]').val());
    if(mTitle.length <= 70) 
        $("#limitBarT").html("<span>(" + charLeft + ": " + (70 - mTitle.length) + ")</span>");  
    else
        $("#limitBarT").html("<span style='color: red;'>(" + charLeft + ": " + (70 - mTitle.length) + ")</span>"); 
}

function metaData() {
    
    //Check Title
    var mTitle= jQuery.trim($('input[name=title]').val());
    if (mTitle==null || mTitle=="") {
        sweetAlert(oopsStr, titleCheck, "error");
        return false;
    }
    
    //Check description
    var myDes= $('textarea#description').val();
    if (myDes==null || myDes=="") {
        sweetAlert(oopsStr, desCheck, "error");
        return false;
    }

    //Check keywords
    var myKey= $('textarea#keywords').val();
    if (myKey==null || myKey=="") {
        sweetAlert(oopsStr, keyCheck, "error");
        return false;
    }

    if (captchaCodeCheck()){
        sweetAlert(oopsStr, imageVr , "error");
        return false;
    }
    return true;
}

function fixData() {
    var myData= $('textarea#data').val();
    if (myData==null || myData=="") {
        sweetAlert(oopsStr, inputEm, "error");
        return false;
    }else if (captchaCodeCheck()){
        sweetAlert(oopsStr, imageVr , "error");
        return false;
    }
    return true;
}

function fixKey() {
    var myData= $('#key').val();
    if (myData==null || myData=="") {
        sweetAlert(oopsStr, inputEm, "error");
        return false;
    }else if (captchaCodeCheck()){
        sweetAlert(oopsStr, imageVr , "error");
        return false;
    }
    return true;
}

if (document.getElementById('headturbo')) {
    document.addEventListener('DOMContentLoaded', function () {
      particleground(document.getElementById('headturbo'), {
        dotColor: 'rgba(255,255,255, 0.1)',
        lineColor: 'rgba(255,255,255, 0.2)'
      });
      var intro = document.getElementById('headturbo-wrap');
      intro.style.marginTop = '-435px';
    }, false);
}

jQuery(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
    $(".dropdown-toggle").dropdown();
    
    jQuery("#getStarted").click(function(){
        var pos = $('#seoTools').offset();
        $('body,html').animate({ scrollTop: pos.top-12});
    });
    
    jQuery("#browseTools").click(function() {
        var pos1 = $('#browseTools').offset();
        $('body,html').animate({ scrollTop: pos1.top-12});
        jQuery("#browseTools").hide();
       	jQuery(".hideAll").css({"display":"block"});
       	jQuery(".hideAll").show();
       	jQuery(".hideAll").fadeIn();
    });
    
    jQuery('.thumbnail').on('mouseleave', function() {
        var $this = jQuery(this);
        jQuery('img', $this).removeClass('animated bounceIn');
    });
                    
    jQuery('.thumbnail').on('mouseenter', function() {
        var $this = jQuery(this);
        jQuery('img', $this).addClass('animated bounceIn');
    });
                
	$("#search").keyup(function(){ searchResults(false); });
	$("#search").click(function(){ searchResults(false); });
    
   	$("#sidebarsearch").keyup(function(){ searchResults(true); });
	$("#sidebarsearch").click(function(){ searchResults(true); });

	$(document).mouseup(function (e){
		var container = $("#searchSec");
		if (!container.is(e.target) && container.has(e.target).length === 0)
			$("#index-results").hide();
        container = $("#sidebarSc");
		if (!container.is(e.target) && container.has(e.target).length === 0)
			$("#sidebar-results").hide();
	});
	
    var reviewBtnText = $("#review-btn").html();
    var shareBox = 0;
    $(".shareBox").fadeOut();
    
    jQuery("#shareBtn").click(function() {
        if(shareBox == 0){
            $(".shareBox").fadeIn();
            setTimeout(function(){
			var pos = $('#scoreBoard').offset();
			 $('body,html').animate({ scrollTop: pos.top });
			}, 100);
            shareBox = 1;
        }else{
            setTimeout(function(){
			var pos = $('#overview').offset();
			 $('body,html').animate({ scrollTop: pos.top });
			}, 100);
            $(".shareBox").fadeOut();
            shareBox = 0;
        }
    });
    
    if($(window).innerWidth() <= 751) {
        $("#scroll-nav").removeClass('nav-stacked');
        $("#scroll-nav").addClass('nav-inverse');
        $("#review-btn").html('<span class="glyphicon glyphicon-search"></span>');
    } else {
        $("#scroll-nav").removeClass('nav-inverse');
        $("#scroll-nav").addClass('nav-stacked');
        $("#review-btn").html(reviewBtnText);
    }
    
    $(window).resize(function(){

        if($(window).innerWidth() <= 751) {
            $("#scroll-nav").addClass('nav-inverse');
            $("#scroll-nav").removeClass('nav-stacked');
            $("#review-btn").html('<span class="glyphicon glyphicon-search"></span>');
        } else {
            $("#scroll-nav").addClass('nav-stacked');
            $("#scroll-nav").removeClass('nav-inverse');
            $("#review-btn").html(reviewBtnText);
        }
    });

	$(window).scroll(function(){
		if ($('.wrapper-header').offset().top > 50){
			$('.navbar-fixed-top').addClass('top-nav-collapse');
            $('.main-header').css({"padding":"10px"});
		} else {
			$('.navbar-fixed-top').removeClass('top-nav-collapse');
            $('.main-header').css({"padding":"30px"});
		}
	}); 
    
    $('.headturbo-wrap').css({
        'margin-top': -($('.headturbo-wrap').height() / 2)
    });
      
	$('.start-mobile-nav').on('click', function(){
		$('body').toggleClass('open-nav');
	});
	
	$('.wrapper-submenu > a').on('click', function(){
		$(this).next('.submenu').slideToggle();
	});

	$('.mobile-nav .selected-lang').on('click', function(){
		$(this).next('.lang-nav').slideToggle();
    });		
});



function cleanURL(myUrl){
    if (myUrl.indexOf("http://") == 0)
        myUrl=myUrl.substring(7);
    else if (myUrl.indexOf("https://") == 0)
        myUrl=myUrl.substring(8);
    return myUrl;
}

function captchaCodeCheck(){
    if ($(".captchaCode").length > 0){
        var capType = $('#capType').val(); 
        if(capType == 'phpcap'){
            if($('input[name=scode]').val() == '')
                return true;
        }else if(capType == 'recap'){
            if(grecaptcha.getResponse() == '')
                return true;
        }
    }
    return false;
}

function captchaCodeCheckMsg(){
    if (captchaCodeCheck()){
        sweetAlert(oopsStr, imageVr , "error");
        return false;
    }
    return true;
}

function validateCaptcha(){
    if ($(".captchaCode").length > 0){
        var capCode,capData,authCode; 
        if (captchaCodeCheck()){
            sweetAlert(oopsStr, imageVr , "error");
            return false;
        }
        capData = {capthca:'1'};
        capType = $('#capType').val();
        if(capType == 'phpcap'){
            capCode = $('input[name=scode]').val();
            capData['scode'] = capCode;
            capData['pageUID'] = $('input[name=pageUID]').val();
        }else if(capType == 'recap'){
            capCode = grecaptcha.getResponse();
            capData['g-recaptcha-response'] = capCode;
        }
        $.post(axPath + '/verification/get-auth',capData,function(data){
            authCode = data.split(':::');
            if(authCode[0] == '1')
                startTask(authCode[1]);
            else{
                sweetAlert(oopsStr, capCodeWrg , "error");
                if(capType == 'phpcap')
                    reloadCap();
                return false;
            }
        });
    }else{
        authCode = $('#authCode').val();
        startTask(authCode);
    }
}