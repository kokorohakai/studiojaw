var lid;
function makecombobox( eid )
{
	var theSelects = $(eid).options;
	var theParent = $(eid).parentNode;
	theParent.removeChild($(eid));
	var newid = document.createElement('div')
	theParent.appendChild(newid);
	thedata = 	'<input type="text" value="" class="combobox" id="'+eid+'" onKeyPress="hidecb(\''+eid+'\')" onclick="showcb(\''+eid+'\');"><br>' +
				'<div id="'+eid+'_popup" class="combobox">' +
					'<table>';
					for ( a = 0; a < theSelects.length; a++ ) 
					{
						var t = "even";
						if ( parseInt(a/2.0) == a / 2.0 )
						{
							t = "odd"
						}
						thedata += '<tr class="' + t + '"><td onmouseover="highlightcb(this)" onclick="selectcb(this,\''+eid+'\')">' + theSelects[a].value + '</td></tr>';
					}
	thedata +=		'</table>'+
				'</div>';
	newid.innerHTML = thedata;
}
function hidecb( eid )
{
	$(eid + '_popup').style.display="none";
}
function showcb( eid ) 
{
	$(eid + '_popup').style.display="inline";
}
function highlightcb( statid )
{
	if (lid)
	{
		lid.className = "";
	}
	statid.className = "highlight";
	lid = statid
}
function selectcb( statid, eid )
{
	$(eid).value = statid.innerHTML;
	hidecb( eid );
}