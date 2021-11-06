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

tr:nth-child(even){background-color: #a8c0e3}

th {
  background-color: #2da315;
  color: #f0ec0c;
}
h1 {
  font-family: Lato;

}
.header {
  background-color: #c40e1d;
  text-align: center;
  padding:inherit;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title>Rental Management system</title>
</head>
<div class="header">
  <h1><font color="#FFFFFF" size="+4">Movie Rental Management System</font></h1>
</div>
 <center><img src="movie.png" /></center>
<body>
 <h2 align="center"><font><u><b>Movies available for rentals:</b></u></font></h2>
   <table align="center" border="1" bordercolor="#000099">
   <tr>
    <th >Name</th>
    <th >Director</th>
    <th >Year of Release</th>
    <th >Language</th>
   </tr>
    <xsl:for-each select="participants/details">
   <tr>
    <td ><xsl:value-of select="name"/></td>
    <td ><xsl:value-of select="director"/></td>
    <td ><xsl:value-of select="yor"/></td>
    <td ><xsl:value-of select="lang"/></td>
   </tr>
    </xsl:for-each>
    </table>
</body>
</html>

</xsl:template>
</xsl:stylesheet>
