<html>
<head>
<style type="text/css">
	td
	{
		font-size:10px;
		padding:3px;
		border:1px dotted gray;
		vertical-align:top;
		font-family:sans-serif;
	}
	td.big
	{
		border:1px solid black;
		width:50%;
	}
	table
	{
		table-layout:fixed;
	}
</style>
</head>
<body>
<%
	set con=Server.CreateObject("ADODB.Connection")
	dbName = "D:\Inetpub\IntraRanger\TreeExample\database.mdb"
	con.open "Provider=Microsoft.Jet.OLEDB.4.0;Data Source='"&dbName&"';Jet OLEDB:Database Password=;"
	
	set rs = Server.CreateObject("ADODB.Recordset")
	rs.Open "select DISTINCT a.dealercode from Spread1 as a, spread2 as b where a.dealercode=b.dealercode", con
	theheader=true
	while not rs.eof
		b= rs.fields("dealercode")
		set rt = Server.CreateObject("ADODB.Recordset")
		rt.Open "select * from Spread1 where dealercode = '" & b & "' order by address", con
		if theheader=true then
			response.write(" ")
			for each i in rt.fields
				if i.name <> "ID" AND i.name <> "dealercode" then 
					response.write(",""" & i.name & """")
				end if
			next
		else
			response.write(""""&b&"""")
			for each i in rt.fields
				if i.name <>"ID" AND i.name <> "dealercode" then
					response.write(",""" & i & "&nbsp;""")
				end if
			next
			rt.movenext
		end if
		rt.close
		
		rt.Open "select * from Spread2 where dealercode = '" & b & "' order by ADDRESS1", con
		if theheader=true then
			response.write(" ")
			for each i in rt.fields
				if i.name <> "ID" AND i.name <> "dealercode" then 
					response.write(",""" & i.name & """")
				end if
			next
		else
			for each i in rt.fields
				if i.name <> "ID" AND i.name <> "dealercode"  then 
					response.write(",""" & i & "&nbsp;""")
				end if
			next
			rt.movenext
		end if
		rt.close
		response.write("<br>")
		if theheader=false then
			rs.movenext
		end if
		theheader=false
	wend
%>
</body>
</html>