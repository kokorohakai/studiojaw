/*
	(C) 2013 Jo-Anna Wall
*/
function UploadApp(inData){
	if (this==window){
		console.log("Please instantiate this class properly with new.");
		return;
	}
	/*****************
	* Public Methods
	*****************/
	this.stopUpload = function( newid ){
		$('upload_file').replace('<input type="file" name="uploadfile" id="upload_file">');
		E['upload_button'].enable();
		hideStatusBar();
		E['upload_id'].value = newid;
		E['hiddenFrame'].src = "/blank.html";
		if (options['completeScript']){
			try{
				eval(options['completeScript']);
			} catch(e){
				console.log(e);
			}
		}
	}
	/********************
	* Private Variables 
	********************/
	var E={},
		uploading=false,
		perc=0,
		timer=false,
		freq=250,
		options={};
	/*****************
	* Private Methods
	*****************/
	//events
	function startUpload(e){
		if ($("upload_file").value){
			uploading = true;
			E['upload_form'].submit();
			$('upload_file').disable();
			E['upload_button'].disable();
			showStatusBar();
		}else{
			alert("No file selected!");
		}
		e.stop();
		return false;
	}
	//status bar
	function showStatusBar(){
		E['statusBar'].show();
		uploading = true;
		perc = 0;
		timer = false;
		timer = setTimeout(function(){
			updateStatusBar();
		},freq)
	}
	function hideStatusBar(){
		E['statusBarProgress'].setStyle({
			width: "0px"
		});	
		E['statusBar'].hide();
		uploading = false;
		perc = 0;
		clearTimeout(timer);
		timer = false;
	}
	function updateStatusBar(){
		var id = E['upload_id'].value;
		new Ajax.Request('/ajax.php?a=uploadstatus&id='+id,{
			onComplete: function(rsp){
				var data = false;
				try{
					data = JSON.parse(rsp.responseText);
				} catch(e){}
				if (data){
					data = data['status'];
					perc = parseFloat(data['current']) / parseFloat(data['total']) * 100.0;

					//console.log(data,perc);
					E['statusBarText'].innerHTML = parseInt(perc) + "%";
					E['statusBarProgress'].setStyle({
						width: parseInt(perc*2)+"px"
					});
				}
				clearTimeout(timer);
				if (uploading){
					timer = setTimeout(function(){
						updateStatusBar();
					},freq);
				}
			}
		});
	};
	//system
	function getElements(){
		E['upload_form'] = $("upload_form");
		E['upload_button'] = $("upload_button");
		E['upload_id'] = $("upload_id");
		E['hiddenFrame'] = $("hiddenFrame");
		E['statusBar'] = $("statusBar");
		E['statusBarText'] = $("statusBarText");
		E['statusBarProgress'] = $("statusBarProgress");
	}
	function setEvents(){
		E['upload_button'].observe('click',function(e){
			return startUpload(e);
		});
	}
	function initialize(inData){
		getElements();
		setEvents();
		options = inData;
	}
	initialize(inData);
}

var uploadApp; //public exposure for upload child page.
document.observe('dom:loaded',function(){
	uploadApp = new UploadApp(UploadApp.data);
	delete UploadApp.data;
});
//