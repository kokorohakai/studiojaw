<?
$arr="var logoimages=new Array(";
for ( $a=0; $a<sizeof($logoimages); $a++)
{
	$arr.='"'.$logoimages[$a].'",';
}
$arr=substr($arr,0,-1);
$arr.=");";
echo $arr."\n";
echo "var nslides = ".sizeof($logoimages).";\n";
?>
var ctimer;
var cslide = 0;
var step = 0;
var timestep = 3000;

function changeover()
{
	step+=1;
	if (step > 100) step = 100;
	$('nextimg').setOpacity( step/100.0 );
	$('currimg').setOpacity( 1.0-(step/100.0) );
	clearTimeout(ctimer);
	if ( step == 100 )
	{
		cslide++;
		if (cslide == nslides) cslide=0;
		$('currimg').src=$('nextimg').src;
		$('currimg').setOpacity( 1.0 );
		$('nextimg').setOpacity( 0.0 );
		$('nextimg').src="logoimg/"+logoimages[cslide];
		step=0;
		ctimer = setTimeout("changeover()",timestep);
	}
	else
	{
		ctimer = setTimeout("changeover()",16);
	}
}

ctimer = setTimeout("changeover()",timestep);

Object.defineProperty(Object.prototype,"extendAsClass",{
	configurable: false,
	enumerable: false,
	value: function( obj, args ){ //arguments must be passed in as an object.
		var temp = new obj(args);
		for ( i in temp){
			this[i] = temp[i];
		}
		return this;
	},
	writable: false
});