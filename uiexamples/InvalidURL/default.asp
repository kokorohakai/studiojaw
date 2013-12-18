<%
'fill this in with the correct URL.
newsite = "http://ecm-prod-cs.etn.com/Vehicle/index.htm"


Set Mail = CreateObject("CDO.Message")
Mail.Configuration.Fields.Item("http://schemas.microsoft.com/cdo/configuration/sendusing") = 2
Mail.Configuration.Fields.Item("http://schemas.microsoft.com/cdo/configuration/smtpserver") = "mail.etn.com" 
Mail.Configuration.Fields.Item("http://schemas.microsoft.com/cdo/configuration/smtpserverport") = 25
Mail.Configuration.Fields.Update

theref = ""
theref = request.servervariables("http_referer")
cururl = "http://" & Request.ServerVariables("SERVER_NAME") & Request.ServerVariables("SCRIPT_NAME") 
if theref <> "" then
	thebody = "Hello, this e-mail is just to tell you someone tried visiting a no longer existing webpage and needs to be fixed.<br>" & vbCrLf &_
	"Please change the link at:<br>" & vbCrLf &_
	theref & "<br>" & vbCrLf &_
	"from:<br>" & vbCrLf &_
	cururl &"<br>"& vbCrLf &_
	"to:<br>" & vbCrLf &_
	newsite & "<br>" & vbCrLf &_
	"Please do not try to reply to this e-mail.<br>" & vbCrLf & _
	"Thanks,<br>" & vbCrLf &_
	"~Joe"

		
	Mail.Subject = "A bad link was found"
	Mail.From = "noreply@eaton.com"
	Mail.To = "JoeWall@eaton.com"
	Mail.HTMLBody = thebody
	Mail.Send
end if
Set Mail = nothing
Response.Redirect( newsite )
%>