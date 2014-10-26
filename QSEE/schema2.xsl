<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html" encoding="utf-8" indent="yes"/>
	<xsl:template match="/">
		<xsl:text disable-output-escaping="yes">&lt;!DOCTYPE html>&#10;</xsl:text>
		<html>
			<head>
				<title>Quotes XML -> HTML using XSLT example</title>
				<style>
					tr:nth-child(odd){
					    background-color:#eeeeee;
					}
					table {
					    width:80%;
					    text-align:left;
					    margin: auto;
					}
					td {
						vertical-align:top;
					}
				</style>
			</head>
			<body>
				<table>
					<xsl:apply-templates select="/quotes" mode="header"/>
					<xsl:for-each select="/quotes/quote">
						<tr>
							<xsl:call-template name="tableBody"/>
						</tr>
					</xsl:for-each>
				</table>
			</body>
		</html>
	</xsl:template>
	<xsl:template match="quotes" mode="header">
		<tr>
			<th>category</th>
			<xsl:for-each select="quote[1]/*">
				<th>
					<xsl:value-of select="local-name()"/>
				</th>
			</xsl:for-each>
		</tr>
	</xsl:template>
	<xsl:template name="tableBody">
		<xsl:for-each select="./*">
			<xsl:choose>
				<xsl:when test="local-name()='text'">
					<td>
						<xsl:value-of select="./@category"/>
					</td>
					<td>
						<xsl:value-of select="."/>
					</td>
				</xsl:when>
				<xsl:when test="local-name()='dobdod'">
					<td>
							<xsl:value-of select="."/>
					</td>
				</xsl:when>
				<xsl:when test="local-name()='link'">
					<td>
						<a>
							<xsl:attribute name="href">
								<xsl:value-of select="."/>
							</xsl:attribute>
							<xsl:value-of select="."/>
						</a>
					</td>
				</xsl:when>
				<xsl:when test="local-name()='image'">
					<td>
						<img width="110">
							<xsl:attribute name="src">
								<xsl:value-of select="."/>
							</xsl:attribute>
						</img>
					</td>
				</xsl:when>
				<xsl:otherwise>
					<td>
						<xsl:value-of select="."/>
					</td>
				</xsl:otherwise>
			</xsl:choose>
		</xsl:for-each>
	</xsl:template>
</xsl:stylesheet>