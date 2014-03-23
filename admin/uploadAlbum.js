/*
javascript specific to uploadAlbum in admin folder, probably not needed.
*/
function UploadAlbumApp(){
	if (this==window){
		console.log("Please instantiate this class properly with new.");
		return;
	}
	function init(){

	}
	init();
}
document.observe('dom:loaded',function(){
	new UploadAlbumApp();
});