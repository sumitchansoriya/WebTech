<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="Sports.xml" -->
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
table {
  border-collapse: collapse;
  width: 80%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #FFFFFF}

th {
  background-color: #4BF9C2;
  color: white;
}
h1 {
  font-family: Trattatello, fantasy;
  
}
.header {
  background-color: #4BF9C2;
  text-align: center;
  padding:2px;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title>Order</title>
</head>
<div class="header">
  <h1><font color="#FFFFFF" size="+4">Ordered Product Inventory</font></h1>
</div>
 <center><img src="sp.jpg" /></center>
<body>
 <h2 align="center"><font><u><b>Ordered Product Inventory</b></u></font></h2>
   <table align="center" border="1" bordercolor="#000099">
   <tr>
    <th >Name</th>
    <th >Product</th>
    <th >City</th>
   </tr>
    <xsl:for-each select="participants/details">
   <tr>
    <td ><xsl:value-of select="name"/></td>
    <td ><xsl:value-of select="event"/></td>
    <td ><xsl:value-of select="city"/></td>
   </tr>
    </xsl:for-each>
    </table><br />
<center>

<h2>Sale held at:</h2><p id="demo"></p>

<script>
var parser, xmlDoc;
var text = "<EventDetails><ed>" +
"<state>Gujarat</state>" +
"<location>Sec 8 SAI</location>" +
"<date>10 November 2021</date>" +
"<start_time>2005</start_time>" +
"</ed></EventDetails>";

if (window.DOMParser) {
  parser = new DOMParser();
  xmlDoc = parser.parseFromString(text,"text/xml");
} else {
  xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
  xmlDoc.async = false;
  xmlDoc.loadXML(text); 
} 

document.getElementById("demo").innerHTML =
xmlDoc.getElementsByTagName("state")[0].childNodes[0].nodeValue;
</script>
</center>
</body>
</html>

</xsl:template>
</xsl:stylesheet>