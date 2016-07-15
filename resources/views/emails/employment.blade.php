<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Email title or subject</title>

    <style type="text/css">
        /* reset */
        #outlook a {
            padding: 0;
        }

        /* Force Outlook to provide a "view in browser" menu link. */
        .ExternalClass {
            width: 100%;
        }

        /* Force Hotmail to display emails at full width */
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
            line-height: 100%;
        }

        /* Forces Hotmail to display normal line spacing.  More on that: http://www.emailonacid.com/forum/viewthread/43/ */
        p {
            margin: 0;
            padding: 0;
            font-size: 0px;
            line-height: 0px;
        }

        /* squash Exact Target injected paragraphs */
        table td {
            border-collapse: collapse;
        }

        /* Outlook 07, 10 padding issue fix */
        table {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        /* remove spacing around Outlook 07, 10 tables */

        /* bring inline */
        img {
            display: block;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        a img {
            border: none;
        }

        a {
            text-decoration: none;
            color: #000001;
        }

        /* text link */
        a.phone {
            text-decoration: none;
            color: #000001 !important;
            pointer-events: auto;
            cursor: default;
        }

        /* phone link, use as wrapper on phone numbers */
        span {
            font-size: 13px;
            line-height: 17px;
            font-family: monospace;
            color: #000001;
        }
    </style>
</head>
<body style="width:100%; margin:0; padding:0; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;">

<!-- body wrapper -->
<table cellpadding="0" cellspacing="0" border="0" style="margin:0; padding:0; width:100%; line-height: 100% !important;">
    <tr>
        <td valign="top">
            <!-- edge wrapper -->
            <table cellpadding="0" cellspacing="0" border="0" align="center" width="600" style="background: #efefef;">
                <tr>
                    <td valign="top">
                        <!-- content wrapper -->
                        <table cellpadding="0" cellspacing="0" border="0" align="center" width="1000" style="background: #cfcfcf;">
                            <tr>
                                <td valign="top" style="vertical-align: top;">
                                    <!-- ///////////////////////////////////////////////////// -->

                                    <table cellpadding="0" cellspacing="0" border="0" align="center" style="margin-bottom: 20px;">
                                        <tr>
                                            <td valign="top" style="vertical-align: top;">



                                                <span><h3 style="text-align: center;">JVEquipment Employment Application</h3></span>
                                                <table>
                                                @foreach($Keys as $Index => $Field)
                                                <tr>
                                                	<td style="width: 40%;"><span style=""><span class="label" style="font-weight: bold; display:inline-block; margin-left: 20px; font-size: 18px;">{{ $Map[$Field] }}</span></span></td><td style="width: 60%;"><span class="value">{{$Values[$Index]}}                                                                                                                                                                                  </span></td>
												</tr>
                                                @endforeach
												</table>

                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" border="0" align="center">
                                        <tr>
                                            <td valign="top" style="vertical-align: top;">

                                            </td>
                                        </tr>
                                    </table>

                                    <!-- //////////// -->
                                </td>
                            </tr>
                        </table>
                        <!-- / content wrapper -->
                    </td>
                </tr>
            </table>
            <!-- / edge wrapper -->
        </td>
    </tr>
</table>
<!-- / page wrapper -->
</body>
</html>