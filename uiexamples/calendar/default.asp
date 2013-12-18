<!-- #include file="../../Joeheader.asp"-->
<!-- #include file="classes/dateobj.asp"-->
<!-- #include file="classes/eventobj.asp"-->
<%
dim fs,f
set fs=Server.CreateObject("Scripting.FileSystemObject")
set f=fs.OpenTextFile(Server.MapPath("calendar.ics"),1,true)

isevent = false
theevent = ""
en = 0
events = array

set startdate = new dateobj
set enddate = new dateobj

while f.AtEndOfStream = false
	'get and clean the data
	text = f.readline()
	text = trim(text)
	'parsings off.
	if text = "END:VEVENT" then
		set anevent = new eventobj
		anevent.setevent theevent, en
		'anevent.report
		ReDim PRESERVE events(en+1)
		set events(en)=anevent
		en = en + 1
		isevent = false
	end if
	'do the parse.
	if isevent then
		if mid(text,1,1) <> vbtab then
			theevent = theevent & trim(text) & vbcrlf
		else
			ltext = replace(trim(text),vbtab,"")
			theevent = left(theevent,len(theevent)-2) & ltext & vbcrlf
		end if
	end if
	'parsings on.
	if left(text,11) = "X-CALSTART:" then
		if len(text) > 11 then
			startdate.setdate( mid(text,12) )
		end if
	end if
	if left(text,9) = "X-CALEND:" then
		if len(text) > 9 then
			enddate.setdate( mid(text,10) )
		end if
	end if
	if text = "BEGIN:VEVENT" then
		theevent = ""
		isevent = true
	end if
wend
if session("month") = "" then
	'tdate = startdate.month & "/" & startdate.day & "/" & startdate.year
	'if not isdate(tdate) then
'		tdate = date
'	end if
'	session("month") = month(tdate)
'	session("year") = year(tdate)
'	session("day") = day(tdate)
	session("month") = month(date)
	session("year") = year(date)
	session("day") = day(date)
end if
if request.QueryString("step") = "next" then
	session("month")=session("month") + 1
	if session("month") > 12 then 
		session("year") = session("year") + 1
		session("month") = 1
	end if
elseif request.QueryString("step") = "prev" then
	session("month")=session("month") - 1
	if session("month") < 1 then 
		session("year") = session("year") - 1
		session("month") = 12
	end if
elseif isdate(request.QueryString("date")) then
	session("month") = month(request.QueryString("date"))
	session("year") = year(request.QueryString("date"))
	session("day") = day(request.QueryString("date"))
elseif request.QueryString("step") = "today" then
	session("month") = month(date)
	session("year") = year(date)
	session("day") = day(date)
end if
'ssdate = startdate(1) & "/" & startdate(2) & "/" & startdate(0)

set t = new eventobj
for a = 0 to en - 1
	for b = a + 1 to en - 1
		if events(a).startdate.timestamp > events(b).startdate.timestamp then
			set t = events(a)
			set events(a) = events(b)
			set events(b) = t
		end if
	next
next
%>


<style>
	table.body
	{
		width:1000px;
		table-layout:fixed;
		padding:0px;
		margin:0px;
		border:0px;
		border-collapse:collapse;
	}
	table.calendar
	{
		width:700px;
		height:650px;
		table-layout:fixed;
		padding:0px;
		margin:0px;
		border:0px;
		border-collapse:collapse;
	}
	table.calendar td
	{
		padding:0px;
		margin:0px;
		border:0px;
		vertical-align:top;
		font-family:'Arial',sans-serif;
	}
	tr.header
	{
		background:#0067c6;
		color:white;
		height:25px;
	}
	tr.dow
	{
		height:16px;		
		background:#3097F6;
	}
	tr.dow td
	{
		vertical-align:middle;
		color:white;
		text-align:center;
	}
	tr.week td
	{
		border:1px solid #AAA;
		height:100px;
	}
	td.odd
	{
		background:#EEF7FF;	
	}
	td.even
	{
		background:#EEF;	
	}
	td.oom
	{
		background:#CCC;
	}
	tr.header a:active, tr.header a, tr.header a:visited, tr.header a:hover
	{
		color:white;
	}
	div.evtlist
	{
		padding:10px;
		color:#0067c6;
	}
	div.eventdesc
	{
		padding:10px;
		color:black;
	}
	div.calevt, div.hcalevt
	{
		width:95px;
		height:14px;
		white-space:pre;
		overflow:hidden;
		background:white;
		border:1px solid gray;
		-moz-border-radius: 5px;
		border-radius: 5px;
		cursor:pointer;
	}
	div.hcalevt
	{
		background:#FFFF77;
	}
	div.calevtb
	{
		width:95px;
		height:14px;
		white-space:pre;
		overflow:hidden;
		border:1px dotted white;	
	}
	div.selisting
	{
		width:300px;
		position:absolute;
		z-index:100;
		background:#FFFFFF;
		padding:10px;
		border:5px solid #999;
	}
	div.elisting, div.helisting
	{
		width:300px;
		border:0px;
		border:1px solid white;
		padding:2px;
	}
	div.helisting
	{
		background:#FFFFCC;
		border:1px solid yellow;
		padding:2px;
	}
	div.mask
	{
		position:absolute;
		background:black;
		z-index:50;
		height:100px;
		width:100px;
		top:0px;
		left:0px;
	}
</style>
<script language="JavaScript" type="text/javascript">
	var openevt = -1;
	function highlightevt( n )
	{
		$("event_"+n).className="helisting";
	}
	function unhighlightevt( n )
	{
		$("event_"+n).className="elisting";
	}
	function highlightcal( n )
	{
		els = $$('div.calevt_'+n);
		for ( a=0; a < els.length; a++ )
		{
			
			els[a].className="hcalevt calevt_"+n;
		}
	}
	function unhighlightcal( n )
	{
		els = $$('div.calevt_'+n);
		for ( a=0; a < els.length; a++ )
		{
			els[a].className="calevt calevt_"+n;
		}
	}
	function showevt( n )
	{
		openevt = n;
		el = 'event_' + n + 's';
		$( el ).style.position="absolute";
		$( el ).style.display="inline";
		sy = $( el ).getTop();
		sx = $( el ).getLeft();
		$('mask').setOpacity(0);
		$('mask').effect('opacity').start(0,.75);
		$( el ).effect('top', {transition: Fx.Transitions.Quad.easeOut } ).start(sy,100);
		$( el ).effect('left', {transition: Fx.Transitions.Quad.easeOut } ).start(sx,450);
		$('mask').style.display="inline";
		$('mask').style.width=getWidth()+"px";
		$('mask').style.height=getHeight()+"px";
		//$('mask').opacity("10");
	}
	function closeevt( )
	{
		el = 'event_' + openevt + 's';
		$('mask').style.display="none";
		$( el ).style.display="none";
		$( el ).style.top="";
		$( el ).style.left="";		
		$( el ).style.position="static";
	}
</script>
<div id="mask" class="mask" style="display:none;" onclick="closeevt()">&nbsp;</div>
<table class="body">
	<tr>
		<td style="width:700px;vertical-align:top;">
			<table class="calendar">
				<tr style="color:white;background:black;height:15px;">
					<td colspan=5 style="text-align:left;padding-left:10px;">
						Viewing calendar from <i><%=startdate.dowstr%>, <a href="?date=<%=startdate.basic%>" style="color:#CDE;"><%=startdate.basic%></a></i> to <i><%=enddate.dowstr%>, <a href="?date=<%=enddate.basic%>" style="color:#CDE;"><%=enddate.basic%></a></i>
					</td>
					<td colspan=2>
						<span style="font-size:10px;line-height:10px;">(<a href="?step=today" style="line-height:10px;color:#CDE;">Go to today</a>)</span><br>
					</td>
				</tr>
				<tr class="header">
					<td colspan=7 style="text-align:center;font-size:16px;font-weight:bold;">
						<% if cint(session("month")) > cint(startdate.month) or cint(session("year")) > cint(startdate.year) then %>
							<a href="?step=prev"><img src="img/prev.png"></a>
						<% else %>
							<img src="img/offprev.png">
						<% end if %>
						<%=monthname(session("month"))%>, <%=session("year")%>
						<% if cint(session("month")) < cint(enddate.month) or cint(session("year")) < cint(enddate.year) then %>
							<a href="?step=next"><img src="img/next.png"></a>
						<% else %>
							<img src="img/offnext.png">
						<% end if %>
					</td>
				</tr>
				<tr class="dow">
					<td>Sunday</td>
					<td>Monday</td>
					<td>Tuesday</td>
					<td>Wednesday</td>
					<td>Thursday</td>
					<td>Friday</td>
					<td>Saturday</td>
				</tr>
				<% 
				tdate = session("month")&"/01/"&session("year")
				edate = tdate
				tdate = DateAdd("d",1-weekday(tdate),tdate)
				'while month(tdate) <= session("month") and year(tdate) <=session("year")
				while dateDiff("m",tdate,edate) > -1
					%>
					<tr class="week">
					<% 
					for c = 1 to 7 
						o = cint(day(tdate))
						daytype="odd"
						if session("month") <> month(tdate) then
							daytype="oom"
						elseif int(o/2.0) = o/2.0 then
							daytype="even"
						end if
						%>
						<td class="<%=daytype%>" id="day_<%=month(tdate) & "_" & day(tdate)%>"><%=day(tdate)%><br></td>
						<% 
						n = n + 1
						tdate = DateAdd("d",1,tdate)
					next 
					%>
					</tr>
				<% wend	%>
			</table>
		</td>
		<td style="vertical-align:top;width:300px" id="eventbox">
			<div class="header">Events:</div><br>
			<% 
			tdate = session("month") & "/" & "01" & "/" & session("year")
			hadevent = false
			while month(tdate) = session("month")
				n = 0
				for each evt in events
					if IsObject(evt) then
						if evt.starttoday( tdate ) then 
							if hadevent = false then
								response.write("<b style=""font-size:12px"">=="&WeekdayName(weekday(tdate))&", "&MonthName(month(tdate))&" "& day(tdate)&", "&year(tdate)&"==</b><div class=""evtlist"">")
								hadevent = true
							end if
							evt.sublist
							evt.list
						end if
						if evt.istoday( tdate ) then
							if evt.slot = -1 then evt.slot = n
							while n < evt.slot
								%>
								<script language="JavaScript" type="text/javascript">
									var i = $("day_<%=month(tdate)%>_<%=day(tdate)%>")
									var d = i.innerHTML
									i.innerHTML = d+'<div class="calevtb"></div>'
								</script>
								<%
								n = n + 1
							wend
							%>
							<script language="JavaScript" type="text/javascript">
								var i = $("day_<%=month(tdate)%>_<%=day(tdate)%>")
								var d = i.innerHTML
								i.innerHTML = d+'<div class="calevt calevt_<%=evt.id%>" id="calevt_<%=evt.id%>" onclick="showevt(\'<%=evt.id%>\')" onmouseover="highlightevt('+"'<%=evt.id%>'"+')" onmouseout="unhighlightevt('+"'<%=evt.id%>'"+')"><%=replace(evt.title,"'","\'")%></div>'
							</script>
							<%
							n = n + 1
						end if
					end if
				next
				if hadevent then
					response.write("</div>")
					hadevent = false
				end if
				tdate = DateAdd("d",1,tdate)
			wend
			%>
		</td>
	</tr>
</table>
<div id="mask" class="mask" style="display:none;" onclick="closeevt()">&nbsp;</div>
<!-- #include file="../../footer.asp"-->