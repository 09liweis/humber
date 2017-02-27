<?xml version="1.0" encoding="utf-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <title>Orders</title>
                <style>
                    main {
                        width: 60%;
                        margin: auto;
                    }
                    table, th, td {
                        border: 1px solid black;
                    }
                    table {
                        width: 100%;
                        margin: auto;
                    }
                    td {
                        padding-left: 10px;
                        padding-right: 10px;
                    }
                    .pending {
                        font-weight: bold;
                    }
                    .item {
                        display: block;
                    }
                    .item.out-of-stock {
                        font-weight: bold;
                        color: red;
                        font-style: italic;
                    }
                </style>
            </head>
            <body>
                <main>
                    <h1>Orders</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Status</th>
                                <th>Items</th>
                            </tr>
                        </thead>
                        <tbody>
                            <xsl:for-each select="orders/order">
                                <tr>
                                    <td><xsl:value-of select="customerid" /></td>
                                    <td>
                                        <xsl:choose>
                                            <xsl:when test="status = 'pending'">
                                                <span class="pending"><xsl:value-of select="status" /></span>
                                            </xsl:when>
                                            <xsl:otherwise>
                                                <span><xsl:value-of select="status" /></span>
                                            </xsl:otherwise>
                                        </xsl:choose>
                                    </td>
                                    <td>
                                        <xsl:for-each select="item">
                                            <xsl:choose>
                                            <xsl:when test="@instock = 'N'">
                                                <span class="item out-of-stock"><xsl:value-of select="name" /></span>
                                            </xsl:when>
                                            <xsl:otherwise>
                                                <span class="item"><xsl:value-of select="name" /></span>
                                            </xsl:otherwise>
                                        </xsl:choose>
                                        </xsl:for-each>
                                    </td>
                                </tr>
                            </xsl:for-each>
                        </tbody>
                    </table>
                </main>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>