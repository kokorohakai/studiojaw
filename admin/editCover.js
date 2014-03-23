function EditCoverApp(inData){
	var data = {},
		E={};
	if (this==window){
		console.log("Please instantiate this class properly with new.");
		return;
	}

	this.reloadPage = function(){
		location.reload();
	}
	this.useDefault = function(){
		if (confirm("Are you sure?")){
			new Ajax.Request("/ajax.php?a=albumDefaultCover&id="+data.id,{
				onComplete:function(rsp){
					var data = false;
					try{
						data = JSON.parse(rsp.responseText);
					} catch(e){}					
					if (data.error){
						alert(data.error);
					} else {
						location.reload();
					}
				}
			});
		}
	}

	function init(inData){
		data = inData;
	}
	init(inData);
}

var editCoverApp;
document.observe('dom:loaded',function(){
	editCoverApp = new EditCoverApp(EditCoverApp.data);
	delete EditCoverApp.data;
});