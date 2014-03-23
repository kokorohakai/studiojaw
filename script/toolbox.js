Element.addMethods({
	toolbox: function(element){
		var opened = false;

		//setup icon.
		var icon = new Element("img",{
			src: "/img/toolbox.png"
		});
		icon.observe("click",function(e){
			$$(".toolbox_popup").each(function(el){
				el.fire("toolbox:close");
			});
			if (!opened){
				opened=true;
				popup.show();
			} else {
				opened=false;
				popup.hide();
			}
			e.stop();
			return false;
		});
		icon.setStyle({
			cursor:"pointer",
			margin:"3px"
		})
		//setup popup
		var popup = new Element("div",{
			className:"toolbox_popup"
		});
		popup.update(element.innerHTML);
		popup.hide();
		popup.setStyle({
			position:"absolute",
			borderRadius:"5px",
			padding:"5px",
			border:"2px solid rgba(128,128,128,.75)",
			left:"26px",
			top:"0px",
			background:"rgba(255,255,255,.5)"
		});
		popup.childElements().each(function(el){
			el.setStyle({
				lineHeight:"18px",
				fontSize:"14px",
				whiteSpace:"nowrap",
				borderBottom:"1px solid black",
				fontFamily:"'Arial',sans-serif"
			})
		});
		popup.observe("toolbox:close",function(e){
			opened=false;
			popup.hide();			
		});

		//setup container.
		var container = new Element("div");
		container.setStyle({
			position:"relative"
		});
		element.replace(container);
		container.insert(icon);
		container.insert(popup);

		$$("body")[0].observe("click",function(e){
			if (opened){
				opened=false;
				popup.hide();
			}
		});
	}
})

document.observe('dom:loaded',function(){
	$$('div.toolbox').each(function(element){
		element.toolbox();
	})
});