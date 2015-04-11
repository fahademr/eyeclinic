@extends('tokens.layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
Token Details
@stop


<!--========================================================
                          CONTENT
=========================================================-->
@section('content1')
    <section id="content">

		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                        Token Details
            </div>
		</div>
		<br><br><br>
@stop

@section('content2')

	   <center>
            <div id="regForm" style="border: 4px solid #129894; width: 800px; height: 100%; background-color: #EBEBEB">
                <table class="row_border" style=" border-radius: 10px; margin: 5%;" width="621" height="220">
              <tr>
                <td width="272" height="55"><label>Token Number:</label> </td>
                <td width="333"><label>{{{ $token->tok_num }}}</label></td>
              </tr>
              <tr>
                  <td width="272" height="55"><label>Date:</label> </td>
                  <td width="333"><label>{{{ date('j F, Y', strtotime($token->created_at)) }}}</label></td>
              </tr>
              <tr>
                    <td width="272" height="55"><label>Time:</label> </td>
                    <td width="333"><label>{{{ date('g:i A', strtotime($token->created_at)) }}}</label></td>
              </tr>
              <tr>
                  <td width="272" height="55"><label>Doctor Name:</label> </td>
                  <td width="333"><label>{{{ $token->doctor->name }}}</label></td>
              </tr>
              <tr>
                  <td width="272" height="55"><label>Patient Name:</label> </td>
                  <td width="333"><label>{{{ $token->patient->name }}}</label></td>
              </tr>
              <tr>
                    <td width="272" height="55"><label>Patient ID:</label> </td>
                    <td width="333"><label>{{{ $token->patient->patient_id }}}</label></td>
              </tr>
              <tr>
                  <td width="272" height="55"><label>Checkup Fee:</label> </td>
                  <td width="333"><label>{{{ $token->fee }}}</label></td>
              </tr>
              
              <tr>
                <td width="272"><label>Checkup Note</label></td>
                <td width="333"><label><div style="width: 333px; word-wrap: break-word">{{{ $token->note }}}</div></label></td>
              </tr>

            </table>
            <center>
                  <section style="margin-bottom: 10%">
                    <input type="submit" onclick="back()" value="Back" class="submit" />
                    &nbsp;&nbsp;&nbsp;&nbsp;

                      {{ link_to('token_print?id='.$token->id, 'Print', ['class' => 'btn_3'], $secure = null) }}

                  </section>
             </center>
            </div>
        </center>

		<br><br>

     
@stop