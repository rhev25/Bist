// prepare the form when the DOM is ready 
$(document).ready(function() { 
	  	  
	imageupload = {
		id:null,
		uploadUrl:"",
		updateDatabaseUrl:"",
		image:null,
		photoBasePath:"",
		
		uploadPhoto:function(pId, pUploadUrl, pUpdateDatabaseUrl, pPhotoBasePath){
			
			imageupload.id = pId;
			imageupload.uploadUrl = sb_base_index + pUploadUrl;
			imageupload.updateDatabaseUrl = sb_base_index +pUpdateDatabaseUrl;
			imageupload.photoBasePath = pPhotoBasePath;
			
			$.ajaxFileUpload({
				url:imageupload.uploadUrl,
				fileElementId:'fileToUpload',
				dataType: 'json',
				timeout:1800000,
				success: function(data, status){
					if(typeof(data.error) != 'undefined'){
						if(data.error != ''){
							setTimeout(function(){
								notify('Error',data.error);
							}, 1000);
						}
						else{
							setTimeout(function(){
								imageupload.saveImageToDatabase(data.file);
							}, 1000);
						}
					}
				},
				error: function (data, status, e){
					notify('Error', 'Error in uploading image.');
				}
			});
			
			return false;
		
		},
		
		saveImageToDatabase:function(pHref){
			imageupload.photofile = pHref;
			
			//update the image link to the database only when the compilation, album or user exists
			//else just update the view to display the image
			if(imageupload.id != null && imageupload.id != "" && imageupload.id != 0){
				$.post(imageupload.updateDatabaseUrl,
					   {filename:imageupload.photofile, id:imageupload.id},
						function(result) {
							if(result['success'] == '1'){
								//reassign the id in case the 
								//saving to database generates a new id
								imageupload.id = result['id'];
								imageupload.onUpload();
							}
							else{
								notify("Error",result['error']);
							}	
						},
						"json");
			}			
			else{
				imageupload.onUpload();
			}
		},
		
		
		
		onUpload:function(){
			$("#imageHolder").attr("src",imageupload.photoBasePath+'thumbs/'+imageupload.photofile );
			$("#imageHolderAnchor").attr("rel",imageupload.photoBasePath+imageupload.photofile );
			$("input[name='filename']").val(imageupload.photofile);
			$("input[name='id']").val(imageupload.photoId);
			flash("Image uploaded", "");
			
		}
	
	};	
	
}); 



