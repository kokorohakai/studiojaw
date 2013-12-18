<%
if session("Name") = "Joe Wall" then
	set fs=Server.CreateObject("Scripting.FileSystemObject")
	dim folder, path
	if request.QueryString("path") <> "" then
		path = request.QueryString("path")
		set folder = fs.GetFolder(request.QueryString("path"))
	else
		path = "D:\Inetpub"
		set folder = fs.GetFolder("D:\Inetpub")
	end if
	response.write("<a href='filebrowser.asp?path=" & path & "/..'>..</a><br>")
	for each subfolder in folder.SubFolders
		response.write("<a href='filebrowser.asp?path=" & subfolder.Path & "'>" & subfolder.Path & "</a><br>")
	next 
	for each afile in folder.Files
		response.write(afile.path & "<br>")
	next
else
	response.write("Joe, you need to log into the product support system first.<br>")
	response.write("<a href='/newprod'>newprod</a><br>")
end if
%>