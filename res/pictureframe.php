<?
class pictureframe
{
	private $frameid = "";
	private $r = 0;
	private $g = 0;
	private $b = 0;
	
	function __construct()
	{
		$this->frameid = uniqid();		
		$this->r = $_SESSION['color'][0].$_SESSION['color'][1];
		$this->g = $_SESSION['color'][2].$_SESSION['color'][3];
		$this->b = $_SESSION['color'][4].$_SESSION['color'][5];
	}
	
	public function top()
	{
		$wtf =	'<table class="pictureframe" style="background:#F6F6F6" id="'.$this->frameid.'">'.
								'<tr class="rowa">'.
									'<td class="cella"></td>'.
									'<td class="cellb"></td>'.
									'<td class="cellc"></td>'.
								'</tr>'.
								'<tr class="rowb">'.
									'<td class="celld"></td>'.
									'<td class="celle">';
		echo $wtf;
	}
	public function bottom()
	{
		$wtf =						'</td>'.
									'<td class="cellf"></td>'.
								'</tr>'.
								'<tr class="rowc">'.
									'<td class="cellg"></td>'.
									'<td class="cellh"></td>'.
									'<td class="celli"></td>'.
								'</tr>'.
							'</table><script language="javascript" type="text/javascript">highlight(\''.$this->frameid.'\',0x'.$this->r.',0x'.$this->g.',0x'.$this->b.',0xF6)</script>';
		echo $wtf;
	}
}
?>