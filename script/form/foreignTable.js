/*
	(C) 2014 Jo-Anna Wall
*/
function ForeignTable(inData){
	if (this==window){
		console.log("Please instantiate this class properly with new.");
		return;
	}
	var options = {},
		clean = true,
		altered = {},
		E={};

	/*****************
	* Public Methods
	*****************/
	this.undo = function(x){
		//x is not id. x is the rendered order, rather than the id of the row. which defaultData should have.
		var data = options.defaultData[x];
		var y = 0;
		for ( i in data ){
			var p = x+"_"+y;
			var el = $(p);
			if (el){
				el.value = data[i];
				delete altered[p];
				el.removeClassName("changed");
			}
			y++;
		}
		checkClean();
	}
	this.deleteRow = function(id){
		if (!clean){
			alert("You must save your changes before adding rows.");
		} else {
			new Ajax.Request(
				"/ajax.php?a=deleteRow&id="+id+"&table="+options["table"],{
				onComplete: function(rsp){
					var data = {};
					try{
						data = JSON.parse(rsp.responseText);
					}catch(e){};
					if (data["error"]){
						alert(data["error"]);
					} else {
						alert("Deleted row, reloading.");
						$("hiddenFrame").src="/blank.html";
						location.reload();
					}
				}
			});
		}
	}
	this.addRow = function(){
		if (!clean){
			alert("You must save your changes before adding rows.");
		} else {
			new Ajax.Request(
				"/ajax.php?a=foreignKeyNewRow&fid="+options["fid"]+"&table="+options["table"]+"&fkey="+options['fkey'],{
				onComplete: function(rsp){
					var data = {};
					try{
						data = JSON.parse(rsp.responseText);
					}catch(e){};
					if (data["error"]){
						alert(data["error"]);
					} else {
						alert("Added new row, reloading.");
						$("hiddenFrame").src="/blank.html";
						location.reload();
					}
				}
			});
		}
	}

	/*****************
	* Private Methods
	*****************/
	//state manager
	function checkClean(){
		var n = 0;
		for ( i in altered ) n++;
		if (!n) clean = true;
		else clean = false;
		updateStatus();
	}
	function updateStatus(){
		if (clean){
			E['foreignTable_status'].update("Unchanged");
			E['foreignTable_status'].setStyle({
				color:"green"
			})
		}else{
			E['foreignTable_status'].update("Altered");
			E['foreignTable_status'].setStyle({
				color:"red"
			})
		}
	}

	//status	
	function getElements(){
		E['foreignTable_status'] = $("foreignTable_status");
	}
	function setEvents(){
		$$(".foreignTable_formData").each(function(el){
			el.observe("change",function(e){
				el.addClassName("changed");
				altered[el.id] = true;
				checkClean();
			});
		});
	}
	function initialize(inData){
		options = inData;
		getElements();
		setEvents();
		console.log(options);
	}
	initialize(inData);

}
var foreignTableApp;
document.observe('dom:loaded',function(){
	foreignTableApp = new ForeignTable(ForeignTable.data);
	delete ForeignTable.data;
});