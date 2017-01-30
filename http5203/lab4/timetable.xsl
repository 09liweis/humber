<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <title>Timetable</title>
                <style>
                    .day {
                        text-align: center;
                    }
                    .float-left {
                        float: left;
                        width: 245px;
                        margin-left: 5px
                    }
                    .clear {
                        clear: both;
                    }
                    .course {
                        background: #cccccc;
                        padding: 10px;
                        margin-bottom: 10px
                    }
                </style>
            </head>
            <body>
                <h1>Timetable</h1>

                <div>
                    <xsl:for-each select="//day">
                        <div class="float-left day">
                            <xsl:value-of select="@name" />
                        </div>
                    </xsl:for-each>
                    <div class="clear"></div>
                </div>
                <div>
                    <xsl:for-each select="timetable/day">
                        <div class="float-left">
                            <xsl:for-each select="course">
                                <div class="course">
                                    <h4><xsl:value-of select="name" /></h4>
                                    <p>Location: <xsl:value-of select="location" /></p>
                                </div>
                            </xsl:for-each>
                        </div>
                    </xsl:for-each>
                </div>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>