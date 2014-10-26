<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html" encoding="utf-8" indent="yes"/>
	<xsl:template match="/">
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
                <table>
                    <tr bgcolor="#e1e1e1">
                        <th style="text-align:left">Category</th>
                        <th style="text-align:left">Source</th>
                        <th style="text-align:left">Quote</th>
                        <th style="text-align:left">dob - dod</th>
                        <th style="text-align:left">Link</th>
                        <th style="text-align:left">Photo</th>
                    </tr>
                    <xsl:for-each select="quote">
                        <tr>
                            <td><xsl:value-of select="@category"/></td>
                            <td><xsl:value-of select="source"/></td>
                            <td><xsl:value-of select="text"/></td>
                            <td><xsl:value-of select="dobdod"/></td>
                            <td><a href="link"><xsl:value-of select="link"/></a></td>
                            <td><img src="{image}" width="50px"><xsl:value-of select="image"/></img></td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>