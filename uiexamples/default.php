<!--#include file="../JOEheader.asp"-->
<div class="header">Joe's Sandbox Area</div>
<br>
<div style="width:600px;">
	This is a sandbox area for testing new technologies. Below is a list of examples of those new technologies I have written.
	These technologies can be used for any newly designed applications for the intranet. Any questions about using these
	technologies in your application, feel free to e-mail me at <a href="mailto:joewall@eaton.com">joewall@eaton.com</a>.
</div>
<br>
<% 
section = request.QueryString("example")
if section <> "" then %>
(<a href="?example=">Back to browsing examples</a>)<br>
<% end if %><br>
<%
if section = "tree1" then
%>
<!--#include file="tree1.asp"-->
<% elseif section = "tree2" then%>
<!--#include file="tree2.asp"-->
<% elseif section = "swapper" then%>
<!--#include file="Swapper.asp"-->
<% elseif section = "scroller" then%>
<!--#include file="Scroller.asp"-->
<% elseif section = "popup1" then%>
<!--#include file="popup1.asp"-->
<% elseif section = "neat" then%>
<!--#include file="bgexample.asp"-->
<% elseif section = "popupwindow" then%>
<!--#include file="popupwindow.asp"-->
<% elseif section = "combobox" then%>
<!--#include file="combobox.asp"-->
<% elseif section = "calendar" then%>
<!--#include file="calendar.asp"-->
<% else %>
<table>
	<tr class="head">
		<td>
			Example
		</td>
		<td>
			Requirements
		</td>
	</tr>
	<tr class="odd">
		<td>
			<a href="?example=tree1">Automatic Tree Generation 1</a><br>
		</td>
		<td>
			<a href="/javascript/mootools.v1.11.js">MooTools</a>
		</td>
	</tr>
	<tr class="even">
		<td>
			<a href="?example=tree2">Automatic Tree Generation 2 (possible to replace intrarangers to tree)</a><br>
		</td>
		<td>
			<a href="/javascript/mootools.v1.11.js">MooTools</a>
		</td>
	</tr>
	<tr class="odd">
		<td>
			<a href="?example=swapper">Image Swapper</a><br>
		</td>
		<td>
			<a href="/javascript/mootools.v1.11.js">MooTools</a>
		</td>
	</tr>
	<tr class="even">
		<td>
			<a href="?example=scroller">Text Scroller</a><br>
		</td>
		<td>
			<a href="/javascript/mootools.v1.11.js">MooTools</a>
		</td>
	</tr>
	<tr class="odd">
		<td>
			<a href="?example=neat">An example interactive table (could used be used for images or other popout displays)</a><br>
		</td>
		<td>
			<a href="/javascript/mootools.v1.11.js">MooTools</a>
		</td>
	</tr>
	<tr class="even">
		<td>
			<a href="?example=popup1">An example of content with a popup image</a>
		</td>
		<td>
			None
		</td>
	</tr>
	<tr class="odd">
		<td>
			<a href="?example=popupwindow">An example of data that can be edited with a popup window</a>
		</td>
		<td>
			<a href="/javascript/mootools.v1.11.js">MooTools</a>
		</td>
	</tr>
	<tr class="even">
		<td>
			<a href="/TreeExample/calendar">Calendar Reader</a>
		</td>
		<td>
			<a href="/javascript/mootools.v1.11.js">MooTools</a>
		</td>
	</tr>
	<tr class="odd">
		<td>
			<a href="?example=combobox">Combo Box</a>
		</td>
		<td>
			<a href="/javascript/mootools.v1.11.js">MooTools</a>
		</td>
	</tr>
	<tr class="even">
		<td>
			<a href="?example=calendar">Calendar Select</a>
		</td>
		<td>
			<a href="/javascript/mootools.v1.11.js">MooTools</a>
		</td>
	</tr>
</table>

<% end if %>
<!--#include file="../footer.asp"-->