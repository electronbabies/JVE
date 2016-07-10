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
                        <table cellpadding="0" cellspacing="0" border="0" align="center" width="560" style="background: #cfcfcf;">
                            <tr>
                                <td valign="top" style="vertical-align: top;">
                                    <!-- ///////////////////////////////////////////////////// -->

                                    <table cellpadding="0" cellspacing="0" border="0" align="center" style="margin-bottom: 20px;">
                                        <tr>
                                            <td valign="top" style="vertical-align: top;">
                                                <span style=""><h3>JVEquipment Service Quote</h3></span>
                                                <span style=""><span class="label" style="width: 100px; font-weight: bold; display:inline-block">First Name: </span><span class="value">{{$FirstName}}</span></span><br>
                                                <span style=""><span class="label" style="width: 100px; font-weight: bold; display:inline-block">Last Name: </span><span class="value">{{$LastName}}</span></span><br>
                                                <span style=""><span class="label" style="width: 100px; font-weight: bold; display:inline-block">Phone: </span><span class="value"><a href="tel:{{$PhoneNumber}}">{{$PhoneNumber}}</a></span></span><br>
                                                <span style=""><span class="label" style="width: 100px; font-weight: bold; display:inline-block">Email: </span><span class="value"><a href="mailto:{{$EmailAddress}}">{{$EmailAddress}}</a></span></span><br>
                                                <span style=""><span class="label" style="width: 100px; font-weight: bold; display:inline-block">Company Name: </span><span class="value">{{$CompanyName}}</span></span><br>
                                                <span style=""><span class="label" style="width: 100px; font-weight: bold; display:inline-block">Make: </span><span class="value">{{$Make}}</span></span><br>
                                                <span style=""><span class="label" style="width: 100px; font-weight: bold; display:inline-block">Model: </span><span class="value">{{$Model}}</span></span><br>
                                                <span style=""><span class="label" style="width: 100px; font-weight: bold; display:inline-block">Serial Number: </span><span class="value">{{$SerialNumber}}</span></span><br>
                                                <span style=""><span class="label" style="width: 100px; font-weight: bold; display:inline-block">Comments: </span><span class="value">{{$Comments}}</span></span><br>
                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" border="0" align="center">
                                        <tr>
                                            <td valign="top" style="vertical-align: top;">

                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding="0" cellspacing="0" border="0" align="center">
                                        <tr height="30">
                                            <td valign="top" style="vertical-align: top; background: #efefef;" width="600">
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