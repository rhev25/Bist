/**********************************************************************
* modal windows and messages
************************************************************************/
function showBusyModal(pSelector){
	try{
		$.blockUI({ message: $('#busy'), overlayCSS:{backgroundColor:'#FFF'}, css:{border:'10px solid #535353', padding:'8px'} }); 
	}
	catch(error){
		//alert("There is error. Please reload your browser.");
	}
}


function hideBusyModal(){
	$.unblockUI();
}


function confirm(title, message, callback) {
	try{
		$.blockUI({ message: $('#confirm'), overlayCSS:{backgroundColor:'#FFF'}, css:{border:'10px solid #535353', padding:'8px'} }); 
		
		if(title == ""){
			title = "Confirm";		
		}
		
		$('#confirm').find('.header span').html(title);
		$('#confirm').find('.message').html(message);
		$('#confirm').find('.yes').bind("click", function () {
			if ($.isFunction(callback)) {
				$.unblockUI();
				setTimeout(callback, 1000);
			}
			else{
				$.unblockUI();
			}
			
			$('#confirm').find('.yes').unbind("click");
		});
		$('#confirm').find('.closeAnchor').click(function (){
			$.unblockUI();	
		});
		$('#confirm').find('.cancel').click(function () {
			$.unblockUI();
		
		});
	}
	catch(error){
		//alert("There is error. Please reload your browser.");
	}
}


function confirmation(pMessage, pConfirmUrl) {
	confirm("Confirm",pMessage, function(){
		window.location = pConfirmUrl;												  
	});
}



function notify(title, message, callback) {
	try{
		
		message = (message == null)?"":message;
		
		$('#notify').find('.header span').text(title);
		$('#notify').find('.message').html(message);
		$('#notify').find('.ok').show();
		$('#notify').find('.ok').bind("click", function () {
			if ($.isFunction(callback)) {
				$.unblockUI();
				setTimeout(callback, 1000);
			}
			else{
				$.unblockUI();
			}
			
			$('#notify').find('.ok').unbind("click");
		});
		$('#notify').find('.closeAnchor').click(function (){
			$.unblockUI();
		});
		$('#notify').find('.ok').show();
	
	
		$.blockUI({ message: $('#notify'), overlayCSS:{backgroundColor:'#FFF'}, css:{border:'10px solid #535353', padding:'8px'} }); 
	}
	catch(error){
		//alert("There is error. Please reload your browser.");
	}
	
}

//same as notify only that there will be no ok button
//and modal will disappear automatically
function flash(title, message){
  try{
		message = (message == null)?"":message;
		
		$('#notify').find('.header span').text(title);
		$('#notify').find('.message').html(message);
		$('#notify').find('.ok').hide();
		
		$.blockUI({ message: $('#notify'), overlayCSS:{backgroundColor:'#FFF'}, css:{border:'10px solid #535353', padding:'8px'} }); 
		
		$('#notify').find('.closeAnchor').click(function (){
			// close the dialog
			$.unblockUI();
		});
		
		setTimeout($.unblockUI, 5000);
	}
	catch(error){
		//alert("There is error. Please reload your browser.");
	}
}


/**
* open a popup window
*/
function MM_openBrWindow(theURL,winName,features) { //v2.0
 	return window.open(theURL,winName,features);
}
  

/***
* logout
*/
function logout(){
	window.location = sb_base_index+"splash/logout";	
}
  


function thisMovie(movieName) {
	if (navigator.appName.indexOf("Microsoft") != -1) {
		return window[movieName];
	} else {
		return document[movieName];
	}
}