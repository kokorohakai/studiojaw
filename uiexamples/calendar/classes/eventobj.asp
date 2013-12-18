<%
Class eventobj
	dim startdate
	dim enddate
	dim title
	dim desc
	dim location
	'to be played with later
	dim rules
	dim slot
	dim id
	
	Private Sub Class_Initialize()
		set startdate = new dateobj
		set enddate = new dateobj
		title = ""
		desc = ""
		location = ""
		rules = ""
		slot = -1
		id = 0
	End Sub
	
	public function setevent( str, en ) 
		id = en
		ldata = split(str, vbcrlf)
		for each n in ldata
			if instr(n,"DTSTART;") = 1 then
				p = instr(n,":") + 1
				d = mid(n,p)
				startdate.setdate(d)
			end if
			if instr(n,"DTEND;") = 1 then
				p = instr(n,":") + 1
				d = mid(n,p)
				enddate.setdate(d)
			end if
			if instr(n,"DESCRIPTION:") = 1 then
				p = instr(n,":") + 1
				desc = convert(mid(n,p))
			end if
			if instr(n,"LOCATION:") = 1 then
				p = instr(n,":") + 1
				location = convert(mid(n,p))
			end if
			if instr(n,"RRULE:") = 1 then
				p = instr(n,":") + 1
				rules = convert(mid(n,p))
			end if
			if instr(n,"SUMMARY;") = 1 then
				p = instr(n,":") + 1
				title = convert(mid(n,p))
			end if
		next
	end function
	
	public function thismonth( dt )
		m = cint(month(dt))
		y = cint(year(dt))
		if cint(month(dt)) >= cint(startdate.month) and cint(year(dt)) >= cint(startdate.year) and _
		cint(month(dt)) <= cint(enddate.month) and cint(year(dt)) <= cint(enddate.year) then
			thismonth = true
		else
			thismonth = false
		end if
	end function
	
	public function istoday( dt )
		m = cint(month(dt))
		y = cint(year(dt))
		if cint(day(dt)) >= cint(startdate.day) and cint(month(dt)) >= cint(startdate.month) and cint(year(dt)) >= cint(startdate.year) and _
		cint(day(dt)) <= cint(enddate.day) and cint(month(dt)) <= cint(enddate.month) and cint(year(dt)) <= cint(enddate.year) then
			istoday = true
		else
			istoday = false
		end if
	end function
	
	public function starttoday( dt )
		m = cint(month(dt))
		y = cint(year(dt))
		if cint(day(dt)) = cint(startdate.day) and cint(month(dt)) = cint(startdate.month) and cint(year(dt)) = cint(startdate.year) then
			starttoday = true
		else
			starttoday = false
		end if
	end function

	public function sublist()
		response.write( "<div class=""selisting"" id=""event_"&id&"s"" style=""display:none;""><b style=""font-size:11px;"">" )
		response.write( title & "</b><br>" )
		if startdate.hour <> "" and startdate.notime = false then 
			h = cint(startdate.hour)
			p = "AM"
			if h > 12 then
				h = h - 12
				p = "PM"
			end if
			t = h & ":" & startdate.minute & " " & p
			response.write( "<b style=""color:black;"">" & t )
			if enddate.hour <> "" then
				response.write(" - ")
				h = cint(enddate.hour)
				p = "AM"
				if h > 12 then
					h = h - 12
					p = "PM"
				end if
				t = h & ":" & enddate.minute & " " & p
				response.write( t )
			end if
			response.write( "</b><br>" )
		else
			response.write( "<b style=""color:black;"">All day event</b><br>")
		end if
		
		response.write( "<div class=""eventdesc"">" )
		if startdate.day <> enddate.day then
			response.write( "<i>From: " & startdate.month & "/" & startdate.day & " to " & enddate.month & "/" & enddate.day & "</i><br>" )
		else
			response.write( "<i>Date: " & startdate.month & "/" & startdate.day & " to " & enddate.month )
		end if
		if location <> "" then
			response.write( "<i>Location: " & location & "</i><br>")
		end if
		if desc <> "" then
			response.write( "<br>" & desc & "<br>")
		end if
		if rules <> "" then
			response.write( "<br>Other Event Details:<br>" & rules )
		end if
		response.write( "</div></div>" )
	end function
	
	public function list()
		response.write( "<div class=""elisting"" id=""event_"&id&""" onmouseover=""highlightcal('"&id&"')"" onmouseout=""unhighlightcal('"&id&"')""><b style=""font-size:11px;"">" )
		if startdate.hour <> "" and startdate.notime = false then 
			h = cint(startdate.hour)
			p = "AM"
			if h > 12 then
				h = h - 12
				p = "PM"
			end if
			t = h & ":" & startdate.minute & " " & p
			response.write(  "<span style=""color:black;"">" & t & "</span> " )
		end if
		response.write( title & "</b><br>" )
		response.write( "<div class=""eventdesc"">" )
		if startdate.day <> enddate.day then
			response.write( "<i>From: " & startdate.month & "/" & startdate.day & " to " & enddate.month & "/" & enddate.day & "</i><br>" )
		end if
		if location <> "" then
			response.write( "<i>Location: " & location & "</i><br>")
		end if
		if desc <> "" then
			response.write( desc )
		end if
		response.write( "</div></div>" )
	end function
	public function report()
		response.write("<b>This event object has:</b><br>")
		response.write("Start Date: " & startdate.month & "/" & startdate.day & "/" & startdate.year & "<br>")
		response.write("End Date: " & enddate.month & "/" & enddate.day & "/" & enddate.year & "<br>")
		response.write("Event Title: " & title & "<br>")
		response.write("Event Description: " & desc & "<br>")
		response.write("Location:" & location & "<br>")
		response.write("<br>")
	end function
	
	private function convert( str )
		str = replace(str,"\n",vbcrlf)
		str = replace(str,"\t",vbtab)
		str = replace(str,"\;",";")
		str = replace(str,"\,",",")		
		convert = str
	end function
	
	Private Sub Class_Terminate()
	
	End Sub
End Class
%>