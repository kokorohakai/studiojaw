<%
Class dateobj
	dim year
	dim month
	dim day
	dim hour
	dim minute
	dim dow
	dim dowstr
	dim basic
	dim longstr
	dim timestamp
	dim notime
	
	Private Sub Class_Initialize()
		hour = "00"
		minute = "00"
		day = "01"
		month = "01"
		year = "2000"
		basic = "01/01/1901"
		longstr = "01/01/1901 00:00"
		dowstr = "Sunday"
		dow = 1
		timestamp = 0
		notime = false
	End Sub
	public function setdate( str ) 
		year = mid(str,1,4)
		if year = "" then year = "1901"
		month = mid(str,5,2)
		if month = "" then month = "01"
		day = mid(str,7,2)
		if day = "" then day = "01"
		hour = mid(str,10,2)
		if hour = "" then 
			hour = "00"
			notime=true
		end if
		minute = mid(str,12,2)
		if minute = "" then minute = "00"
		basic = month&"/"&day&"/"&year
		longstr = month&"/"&day&"/"&year&" "&hour&":"&minute
		dow = weekday(basic)
		dowstr = WeekdayName(dow)
		timestamp = datediff("s", epoch, longstr )
	end function
	
	Private Sub Class_Terminate()
	
	End Sub
End Class
%>