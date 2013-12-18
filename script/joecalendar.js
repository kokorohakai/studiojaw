var calImgDir = "../img/calendar/";

var monthname = new Array(12)
monthname[0] = "January"
monthname[1] = "February"
monthname[2] = "March"
monthname[3] = "April"
monthname[4] = "May"
monthname[5] = "June"
monthname[6] = "July"
monthname[7] = "August"
monthname[8] = "September"
monthname[9] = "October"
monthname[10] = "November"
monthname[11] = "December"

var weekday = new Array(7)
weekday[0] = "Sunday"
weekday[1] = "Monday"
weekday[2] = "Tuesday"
weekday[3] = "Wednesday"
weekday[4] = "Thursday"
weekday[5] = "Friday"
weekday[6] = "Saturday"

function makecalendar( id, objoptions )
{
	var hleft = new Image();
	var hright = new Image();
	var ileft = new Image();
	var iright = new Image();
	ileft.src = calImgDir + "left.png";
	iright.src = calImgDir + "right.png";
	hleft.src = calImgDir + "hleft.png";
	hright.src = calImgDir + "hright.png";
	
	var iseditable = false;
	var navbyyear = false;
	var myFx;
	
	if (id)
	{
		function togglecalendar()
		{
			if ( $(id+'_cal').style.display != "inline" )
			{
				$(id+'_cal').style.display="inline";
				myFx = new Fx.Style( id+'_cal', 'opacity').start(0,1);
				updatemonth(true);
			}
			else
			{
				myFx = new Fx.Style( id+'_cal', 'opacity',
				{
					onComplete:function(e)
					{
						$(id+'_cal').style.display="none";
						updatemonth(true);
					}
				}).start(1,0);
			}
			thedate = new Date($(id).value);
			curmonth = thedate.getMonth();
			curyear = thedate.getFullYear();
			
		}
		
		function monthleft()
		{
			curmonth--;
			if ( curmonth < 0 )
			{
				curyear--;
				curmonth = 11;
			}
			updatemonth();
		}
		function monthright()
		{
			curmonth++;
			if ( curmonth > 11 )
			{
				curyear++;
				curmonth = 0;
			}
			updatemonth();
		}
		function yearleft()
		{
			curyear--;
			updatemonth();
		}
		function yearright()
		{
			curyear++;
			updatemonth();
		}
		function updatemonth( noAni )
		{
			thedate = new Date($(id).value);
			if (!noAni)
			{
				var myFx = new Fx.Style(id+'_calmonth','opacity').set(0);
				if (navbyyear)
				{
					var myFx = new Fx.Style(id+'_calyear','opacity').set(0);
				}
			}
			if (navbyyear)
			{
				$(id+'_calmonth').innerHTML = monthname[curmonth];
				$(id+'_calyear').innerHTML = curyear;
			}
			else
			{
				$(id+'_calmonth').innerHTML = monthname[curmonth] + ", " + curyear;
			}
			if (!noAni)
			{
				var myFx = new Fx.Style(id+'_calmonth','opacity').start(0,1);
				if (navbyyear)
				{
					var myFx = new Fx.Style(id+'_calyear','opacity').start(0,1);
				}
			}
			var wd = new Date( (curmonth+1) + "/1/" + curyear );
			wd = wd.getDay();
			var inmonth = false;
			var isdead = false;
			var td = 0;
			var calbody = '<table class="calbody">';
			calbody += "<tr>";
			calbody += '<td class="day">Sun</td>'
			calbody += '<td class="day">Mon</td>'
			calbody += '<td class="day">Tue</td>'
			calbody += '<td class="day">Wed</td>'
			calbody += '<td class="day">Thu</td>'
			calbody += '<td class="day">Fri</td>'
			calbody += '<td class="day">Sat</td>'
			calbody += "</tr>";
			for ( r = 0; r < 6; r++ )
			{
				calbody += "<tr>";
				for ( c = 0; c < 7; c++ )
				{
					if (!inmonth && c == wd)
					{
						inmonth=true;
					}
					if (inmonth)
					{
						td++;
						var testdate = new Date( (curmonth + 1) + "/" + td + "/" + curyear);
						if ( curmonth != testdate.getMonth() ) isdead = true;				
					}
					if (!inmonth || isdead )
					{
						calbody += '<td class="blank"></td>';
					}
					else
					{
						var color = "odd";
						if ( td / 2.0 == parseInt(td/2.0) ) color = "even";
						if ( td == thedate.getDate() && 
							curmonth == thedate.getMonth() && 
							curyear == thedate.getFullYear() ) color = "today";
							
						calbody += 	'<td class="' + color + '" ' +
									'onclick="';
						if (iseditable)
						{
							calbody +='$(\''+id+'\').value=\''+(curmonth+1)+'/'+td+'/'+curyear+'\';"';
						}
						else
						{
							calbody +='$(\''+id+'\').value=\''+(curmonth+1)+'/'+td+'/'+curyear+'\';' +
									'$(\''+id+'_text\').innerHTML=\''+(curmonth+1)+'/'+td+'/'+curyear+'\';"';
						}
						calbody +=	'>' + td + '</td>';
					}
				}
				calbody += '</tr>'
			}
			
			if ( !noAni )
			{
				myFx = new Fx.Style( id+'_calendarfield','opacity').set(0)
			}
			$(id + '_calendarfield').innerHTML = calbody;
			if ( !noAni )
			{
				myFx = new Fx.Style( id+'_calendarfield','opacity').start(0,1)
			}
		}
		
		/////////////////////
		/*begin initializer*/
		/////////////////////
		if (typeof(objoptions) == "object")
		{
			if (objoptions['editable'])
			{
				iseditable = true;
			}
			if (objoptions['navbyyear'])
			{
				navbyyear = true;
			}
		}
		
		var calid = id + '_calcon';
		var newEl = new Element('div', {'id':calid});
	
		inpname = $(id).name;
		inpval = $(id).value;
		newEl.innerHTML = "test";
		$$('body').adopt(newEl);
	
		var thedate;
		if (inpval != "")
		{
			thedate = new Date(inpval);
		}
		else
		{
			thedate = new Date();
		}
	
		var curmonth = thedate.getMonth();
		var curyear = thedate.getFullYear();
		
		var output = 	'<table id="'+id+'_switch"><tr>';
		if (iseditable)
		{
			output +=		'<td class="calinp">'+
							'<input class="calinp" type="text" name="'+inpname+'" id="'+id+'" value="'+inpval+'"></td>'+
							'<td>';
		}
		else
		{
			output +=		'<td id="'+id+'_text" class="calinp">'+
							'</td>'+
							'<td><input type="hidden" name="'+inpname+'" id="'+id+'" value="'+inpval+'">';
		}
		output +=			'<img src="'+calImgDir+'icon.png" class="calicon"></td>' +
						'</tr></table>' +
						'<div class="caldiv" id="'+id+'_cal">' +
							'<table class="calendar">' +
								'<tr>' +
									'<td class="cala"></td>' +
									'<td class="calb"></td>' +
									'<td class="calc"></td>' +
								'</tr>' +
								'<tr>' +
									'<td class="cald"></td>' +
									'<td class="cale">'+
										'<table style="width:186px;padding:0px;margin:0px;table-layout:fixed;border:0px;border-collapse:collapse;"><tr>' +
										'<td style="width:27px;margin:0px;padding:0px;border:0px;"><img class="nav" src="'+calImgDir+'left.png" id="' + id + '_monthleft"></td>' +
										'<td style="width:100%;text-align:center;margin:0px;padding:0px;border:0px;"><span id="'+id+'_calmonth" class="calmonth">January</span></td>' +
										'<td style="width:27px;margin:0px;padding:0px;border:0px;"><img class="nav" src="'+calImgDir+'right.png" id="' + id + '_monthright"></td>' +
										'</tr></table>';
		if (navbyyear)
		{
			output+=					'<table style="width:186px;padding:0px;margin:0px;table-layout:fixed;border:0px;border-collapse:collapse;"><tr>' +
										'<td style="width:27px;margin:0px;padding:0px;border:0px;"><img class="nav" src="'+calImgDir+'left.png" id="' + id + '_yearleft"></td>' +
										'<td style="width:100%;text-align:center;margin:0px;padding:0px;border:0px;"><span id="'+id+'_calyear" class="calmonth">1901</span></td>' +
										'<td style="width:27px;margin:0px;padding:0px;border:0px;"><img class="nav" src="'+calImgDir+'right.png" id="' + id + '_yearright"></td>' +
										'</tr></table>';
		}
		output+=						'<div id="' + id + '_calendarfield" style="display:inline;"></div>' +
									'</td>' +
									'<td class="calf"></td>' +
								'</tr>' +
								'<tr>' +
									'<td class="calg"></td>' +
									'<td class="calh"></td>' +
									'<td class="cali"></td>' +
								'</tr>' +
							'</table>' +
						'</div>';
	
		$(calid).innerHTML = output;

		//The swap and settling of the DOM
		$(id).replaceWith( calid );
		
		myFx = new Fx.Style( id+'_cal', 'opacity').set(0);
		$(id).value = (thedate.getMonth()+1) + "/" + thedate.getDate() + "/" + thedate.getFullYear();
		if ($(id+'_text'))
		{
			$(id+'_text').innerHTML = (thedate.getMonth()+1) + "/" + thedate.getDate() + "/" + thedate.getFullYear();
		}
		
		//set clickables
		$(id+"_switch" ).addEvent('click', function(e){ togglecalendar(); });
		$(id+"_monthleft").addEvent('click', function(e){ monthleft(); });
		$(id+"_monthright").addEvent('click', function(e){ monthright(); });
		$(id+"_monthleft").addEvent('mouseover', function(e){ $(id+"_monthleft").src = hleft.src; });
		$(id+"_monthright").addEvent('mouseover', function(e){ $(id+"_monthright").src = hright.src; });
		$(id+"_monthleft").addEvent('mouseout', function(e){ $(id+"_monthleft").src = ileft.src; });
		$(id+"_monthright").addEvent('mouseout', function(e){ $(id+"_monthright").src = iright.src;	});
		if (navbyyear)
		{
			$(id+"_yearleft").addEvent('click', function(e){ yearleft(); });
			$(id+"_yearright").addEvent('click', function(e){ yearright(); });
			$(id+"_yearleft").addEvent('mouseover', function(e){ $(id+"_yearleft").src = hleft.src; });
			$(id+"_yearright").addEvent('mouseover', function(e){ $(id+"_yearright").src = hright.src; });
			$(id+"_yearleft").addEvent('mouseout', function(e){ $(id+"_yearleft").src = ileft.src; });
			$(id+"_yearright").addEvent('mouseout', function(e){ $(id+"_yearright").src = iright.src;	});
		}
		$(id+"_calendarfield").addEvent('click',function(e)
		{
			updatemonth(true);
			togglecalendar();
		});
		updatemonth(true);
	}
}