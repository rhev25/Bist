// prepare the form when the DOM is ready 
$(document).ready(function() { 
	  	  
	imagebox = {
		url:"",
		image:null,
		showImagePostTimeOut:null, 
		hideModalTimeOut:null, 
		showImageTimeOut:null, 
		
		load:function(ref){
			imagebox.url = $(ref).attr("rel");
			imagebox.image = new Image();
			
			if(imagebox.showImagePostTimeOut != null){
				clearTimeout(imagebox.showImagePostTimeOut);
			}
			
			if(imagebox.hideModalTimeOut != null){
				clearTimeout(imagebox.hideModalTimeOut);
			}
			
			if(imagebox.showImageTimeOut != null){
				clearTimeout(imagebox.showImageTimeOut);
			}
			
			showBusyModal();
			
			// image onload
			$(imagebox.image).load(function () {
				// hide first
				$(this).css('display','none');
				imagebox.hideModalTimeOut = setTimeout(hideBusyModal, 1000);
				imagebox.showImageTimeOut = setTimeout(imagebox.showImage, 2000);
			}).error(function () {
				notify("Error","Can't load image.");
			}).attr('src', imagebox.url);
			
		},
		
		showImage:function(){
			
			$('#zoomImageContainer').remove();
			
			var str = '<div id="zoomImageContainer" style="display:none"><a href="javascript:void(0); return false;" class="zoomImageCloseBtn"><span>X</span></a></div>';
			$('body').append(str);
			$('#zoomImageContainer').append(imagebox.image);
			
			imagebox.showImagePostTimeOut = setTimeout(function(){
				var iheight = imagebox.image.height;
				var iwidth = imagebox.image.width;
				
				//calculate the width to fit the screen
				var maxWidth = 600;
				var maxHeight = 400;
				
				var rWidth = iwidth/maxWidth;
				var rHeight = iheight/maxHeight;
				
				var s = 1; //scale
				s = (rWidth > rHeight)?rWidth/iwidth:rHeight/iheight;
				
				var mWidth = iwidth;
				var mHeight = iheight;
				
				if(s > 1){
					mWidth = iwidth*s;
					mHeight = iheight*s;
				}
			
				//only apply for images exceeding dimension
				//alert("iwidth:"+iwidth+",iheight:"+iheight+",mWidth:"+mWidth+",mHeight:"+mHeight);
				
				var mWStr = String(mWidth)+'px';
				var mHStr = String(mHeight)+'px';
			
			
				imagebox.image.width = mWidth;
				imagebox.image.height = mHeight;
				
				var ileft = $(window).width()/2- mWidth/2;
				var itop = $(window).height()/2- mHeight/2;
				
				var cssParam = {border:'0px', padding:'0px', width:mWStr, height:mHStr, top:itop, left:ileft};
				$.blockUI({ message: $('#zoomImageContainer'), overlayCSS:{}, css:cssParam}); 
				$(imagebox.image).css('display','block');
				$('#zoomImageContainer').css('display','block');
				
				
				$(document).bind("click", imagebox.hideImage);
				
			}, 200);
			
			
			
			
			$('.zoomImageCloseBtn').click(function(){
				$(imagebox.image).css('display','none');								   
				$.unblockUI();
				$('#zoomImageContainer').remove();	
			});
			
		},
		
		
		hideImage:function(){
			$(imagebox.image).css('display','none');								   
			$.unblockUI();
			$('#zoomImageContainer').remove();
			$(document).unbind("click", imagebox.hideImage);
		}
	
	};	
	
}); 



