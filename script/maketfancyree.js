var fancytreeitem = 0;
var fancytreespos = 0;
var fancytreesto = 0;
var fancytreesfrom = 0;
var fancytreesel = "";
function subfancytree( res )
{
	var newfancytree="";
	var part = "";
	fancytreeitem++;
	var thisitem = fancytreeitem;
	var foundstuff=false;
	if (res.childNodes)
	{
		var ls = res.childNodes;
		for (var a=0; a < ls.length; a ++ )
		{
			if (ls[a].innerHTML)
			{
				if (!ls[a].href)
				{
					part += subfancytree( ls[a] );
					foundstuff=true;
				}
			}
		}
	}
	if (foundstuff)
	{
		newfancytree+='<div class="fancytree" id="fancytreeitemopen'+thisitem+'" style="display:none;">';
		newfancytree+='<span class="label">';
		newfancytree+='<img src="img/fancyopen.gif" onclick="closefancytree('+thisitem+');" class="fancytreetoggle"> ';
		newfancytree+=res.innerHTML;
		newfancytree+='</span>';
		newfancytree+=part;
		newfancytree+='</div>\n';
		newfancytree+='<div class="fancytree" id="fancytreeitemclose'+thisitem+'" style="display:block;"> ';
		newfancytree+='<span class="label">';
		newfancytree+='<img src="img/fancyclose.gif" onclick="openfancytree('+thisitem+');" class="fancytreetoggle"> ';
		newfancytree+=res.innerHTML
		newfancytree+='</span>';
		newfancytree+='</div>\n';
	}
	else
	{
		newfancytree+='<div class="fancytree" style="display:block;">';
		newfancytree+='<span class="label">'
		newfancytree+='<img src="img/fancyblank.gif" class="fancytreenotoggle"> ';
		newfancytree+=res.innerHTML
		newfancytree+='</span>';	
		newfancytree+='</div>\n';
	}
	if (res.childNodes)
	{
		for (var a=ls.length-1; a>-1; a--)
		{
			res.removeChild(ls[a]);
		}
	}
	return newfancytree;
}
function makefancytree( res )
{
	var newfancytree='';
	var part='';
	if (res.childNodes)
	{
		var ls = res.childNodes;
		for (var a=0; a < ls.length; a ++ )
		{
			if (ls[a].innerHTML)
			{
				part+=subfancytree( ls[a] );
			}
		}
	}
	newfancytree+=res.innerHTML;
	newfancytree+=part;
	newfancytree+='';
	res.innerHTML = newfancytree;
}
function openfancytree( a )
{
	fancytreespos = $('fancytreeitemclose'+a).offsetHeight;
	fancytreesfrom = fancytreespos;
	$('fancytreeitemclose'+a).style.display="none";
	$('fancytreeitemopen'+a).style.display="block";
	fancytreesto = $('fancytreeitemopen'+a).offsetHeight;
	$('fancytreeitemopen'+a).style.height = fancytreespos+"px";
	$('fancytreeitemopen'+a).style.overflow = "hidden";
	fancytreesel = a;
	setTimeout("fancytreescrollout()",16);
}
function fancytreescrollout()
{
	fancytreespos+=(fancytreesto-fancytreesfrom)/10;
	if (fancytreespos < fancytreesto)
	{
		$('fancytreeitemopen'+fancytreesel).style.height = fancytreespos+"px";
		setTimeout("fancytreescrollout()",16);
	}
	else
	{
		$('fancytreeitemopen'+fancytreesel).style.height = "";
	}
}
function closefancytree( a )
{
	$('fancytreeitemclose'+a).style.display="block";
	fancytreesto = $('fancytreeitemclose'+a).offsetHeight;
	$('fancytreeitemclose'+a).style.display="none";
	fancytreespos = $('fancytreeitemopen'+a).offsetHeight;
	fancytreesfrom = fancytreespos;
	fancytreesel = a;
	setTimeout("fancytreescrollin()",16);
}
function fancytreescrollin()
{
	fancytreespos-=(fancytreesfrom-fancytreesto)/10;
	if (fancytreespos > fancytreesto)
	{
		$('fancytreeitemopen'+fancytreesel).style.height = fancytreespos+"px";
		setTimeout("fancytreescrollin()",16);
	}
	else
	{
		$('fancytreeitemclose'+fancytreesel).style.display="block";
		$('fancytreeitemopen'+fancytreesel).style.display="none";
		$('fancytreeitemopen'+fancytreesel).style.height = "";
	}
}