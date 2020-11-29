
<html>

<head>
    <title>Invoice - Court Case Management</title>
</head>

<body onload="window.print();">
<!--<body>-->

        <div id="invoiceDiv">
            <table border="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                <tr>
                    <td width="100%" align="center"><h1>INVOICE &amp; CO</h1></td>
                </tr>
                <tr>
                    <td width="100%" align="center" >WEB SITE:- www.casemanagementsystem.com</td>
                </tr>
                <tr>
                    <td width="100%" align="center" >COMPANY NAME</td>
                </tr>
                <tr>
                    <td width="100%" align="center" >ADDRESS</td>
                </tr>
                <tr>
                    <td width="100%" align="center" >TEL NO.:</td>
                </tr>
            </table>
            <table border="1" style="border-collapse: collapse" width="100%">
                <tr>
                    <td width="50%" align="center" rowspan="4" style="text-align:left">To,<br><b></b><br>
                            CLIENT NAME<br>
                            <br>
                            <b>Pincode:</b> <br>
                            <b>Phone: </b>
                        </td>
                    <td width="50%" align="center" colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td width="50%" align="center" colspan="3">
                        <p align="left"><b>Invoice No.:</b>
                            <td>
                </tr>
                <tr>
                    <td width="50%" align="center" colspan="3">
                        <p align="left"><b>Date:</b>
                                        </td>
                </tr>
                <tr>
                    <td width="50%" align="center" colspan="3">&nbsp;</td>
                </tr>
            </table>
            <table border="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
                <tr>
                    <td width="6%" align="center" ><b>Sr. No.</b></td>
                    <td width="44%" align="center" ><b>Particulars</b></td>
                    <td width="17%" align="center" ><b>Period From</b></td>
                    <td width="17%" align="center" ><b>Valid Till</b></td>
                    <td width="16%" align="center" ><b>Amount</b></td>
                </tr>
                <tr>
                    <td width="6%" align="center" class="h159" rowspan="2" valign="top"></td>
                    <td width="44%" align="center" class="h159" rowspan="2" valign="top"></td>
                    <td width="17%" align="center" class="h159" rowspan="2" valign="top"></td>
                    <td width="17%" align="center" class="h159" valign="top"><br><br><br><br><br><br><br><br></td>
                    <td width="17%" align="center" class="h159" valign="top"><br><br><br><br><br><br><br></td>
                </tr>
                <tr>
                    <td width="17%" align="center" valign="top"><b>Total</b></td>
                    <td width="16%" align="center" valign="top"><b>Rs. /-</b></td>
                </tr>
                <tr>
                    <td width="100%" align="center" colspan="5">&nbsp;</td>
                </tr>
                <tr>
                    <td width="100%" align="center" colspan="5">
                        <p align="left"><b>RUPEES IN WORDS<br>
                                </b></p>
                    </td>
                </tr>
            </table>
            <table border="1" style="border-collapse: collapse; text-align:left" width="100%">
                <tr>
                    <td>
                       <br><br>
                        <table border="1" style="border-collapse: collapse" width="66%">
                            <tr>
                                <td>
                                    <b>ACCOUNT DETAILS FOR PAYMENT</b></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>BENEFICIARY NAME:-  &amp; CO.</b></td>
                            </tr>
                        </table>
                        <br><br>
                            <div style="position:absolute; right:40px; text-align:center; line-height:1.25em">
                                FOR Court Case &amp; CO<br>
                                www.courtcasemanagement.com
                            </div>
                        </table>
                        <br>
                    </td>
                </tr>
            </table>
        </div>
        <script src="js/lib/jquery/jquery.min.js"></script>
        
        <!-- Generate PDF -->
        <script>
            $(document).ready(function() {
                var content = $('#invoiceDiv').html();
                $.post("generate-pdf.php", {
                        content: "content",
                        email: "webuilder23@gmali.com",
                        name: "test",
                        invoice_number: "asd",
                        invoice_id: 11                    },
                    function(data, status) {
                        // alert("Data: " + data);
                    });
            });
        </script>
        
        
        </body>

</html>