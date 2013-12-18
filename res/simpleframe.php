<?
class simpleframe
{
	private $frameid = "";
	private $r = 0;
	private $g = 0;
	private $b = 0;
	private $htext = false;
	
	//can also use __contruct here. However, this appears to have been deprecated.
	function simpleframe( $hastext=false )
	{
		$this->htext=$hastext;
		$this->frameid = uniqid();		
		$this->r = $_SESSION['color'][0].$_SESSION['color'][1];
		$this->g = $_SESSION['color'][2].$_SESSION['color'][3];
		$this->b = $_SESSION['color'][4].$_SESSION['color'][5];
		
	}
	
	public function top()
	{
		$wtf =	'<table class="simpleframe" style="background:#DDDDDD" id="'.$this->frameid.'">'.
								'<tr class="rowa">'.
									'<td class="cella"></td>'.
									'<td class="cellb"></td>'.
									'<td class="cellc"></td>'.
								'</tr>'.
								'<tr class="rowb">'.
									'<td class="celld"></td>'.
									'<td class="celle">';
		if ($this->htext)
		{
			$wtf.='<div class="celltext"><br>';
		}
		echo $wtf;
	}
	public function bottom()
	{
		if ($this->htext)
		{
			$wtf.='<br></div>';
		}
		$wtf .=						'</td>'.
									'<td class="cellf"></td>'.
								'</tr>'.
								'<tr class="rowc">'.
									'<td class="cellg"></td>'.
									'<td class="cellh"></td>'.
									'<td class="celli"></td>'.
								'</tr>'.
							'</table><script language="javascript" type="text/javascript">highlight(\''.$this->frameid.'\',0x'.$this->r.',0x'.$this->g.',0x'.$this->b.',0xDD)</script>';
		echo $wtf;
	}
}
?>