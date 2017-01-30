<?xml version="1.0" encoding="utf-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <title>People</title>
            </head>
            <body>
                <h1>People</h1>
                <!--<xsl:apply-templates select="people/person/name/first" />-->
                <!--<xsl:for-each select="people/person/name">-->
                <!--    <xsl:value-of select="first" />-->
                <!--</xsl:for-each>-->
                <table>
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Position</th>
                        </tr>
                    </thead>
                    <tbody>
                        <xsl:for-each select="people/person">
                            <tr>
                                <td><xsl:value-of select="name/first" /></td>
                                <td><xsl:value-of select="name/last" /></td>
                                <td><xsl:value-of select="@position" /></td>
                            </tr>
                        </xsl:for-each>
                    </tbody>
                </table>
            </body>
        </html>
    </xsl:template>
    <xsl:template match="people/person/name">
        <xsl:value-of select="first" />
    </xsl:template>
</xsl:stylesheet>