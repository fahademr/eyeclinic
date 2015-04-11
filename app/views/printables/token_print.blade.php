<html>
    <body onload="window.print()">
        <img src='./images/logo_new1.jpg'/>
        <center>
           <h1><u> Patient Token </u></h1>
        </center>
        <table style='border-collapse: collapse; width: 70%; margin-left:auto; margin-right:auto' cellpadding='7' border='1'>
            <tr>
                <td height='20'><label>Token Number:</label></td>
                <td><label> {{ $token->tok_num }}</label></td>
            </tr>
            <tr>
                <td height='20'><label>Date:</label></td>
                <td><label> {{ date('j F, Y', strtotime($token->created_at)) }}</label></td>
            </tr>
            <tr>
                <td height='20'><label>Time:</label></td>
                <td><label> {{ date('g:i A', strtotime($token->created_at))}}</label></td>
            </tr>
            <tr>
                <td height='20'><label>Doctor Name:</label></td>
                <td><label>{{ $token->doctor->name }}</label></td>
            </tr>
            <tr>
                <td height='20'><label>Patient Name:</label></td>
                <td><label>{{ $token->patient->name }}</label></td>
            </tr>
            <tr>
                <td height='20'><label>Patient ID:</label></td>
                <td><label>{{ $token->patient->patient_id }}</label></td>
            </tr>
            <tr>
                <td height='20'><label>Checkup Fee:</label></td>
                <td><label>{{ $token->fee }}-/Rs</label></td>
            </tr>
            <tr>
                <td height='20'><label>Checkup Note:</label></td>
                <td><label>{{ $token->note }}</label></td>
            </tr>
        </table>
    </body>
</html>