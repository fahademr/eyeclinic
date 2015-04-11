@extends('tokens.layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
    Patient Tokens
@stop


<!--========================================================
                          CONTENT
=========================================================-->
@section('content2')
    <section id="content">
        
		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                       Patient Tokens
            </div>
		</div>


		<!--========================================================
                                     Data Table
            =========================================================-->
            <center style="margin-top: 7%;">
                <center>{{ link_to_route('tokens.create', 'Create Token', [], ['class' => 'btn_1'])}}</center>
                <table id="example" style=" border: 1px solid black" class="display" cellspacing="0" width="80%">
                <thead>
                    <tr>
                        <th>Token #</th>
                        <th style="width: 15%">Patient Name</th>
                        <th>Patient ID</th>
                        <th style="width: 15%">Doctor Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th style="width: 25%">Manage</th>
                    </tr>
                </thead>

                <tbody>


                    @foreach($tokens as $token)
                        <tr>
                            <td>{{ $token->tok_num }}</td>
                            <td> {{ $token->patient->name }} </td>
                            <td>{{ $token->patient->patient_id }}</td>
                            <td>{{ $token->doctor->name }}</td>
                            <td>{{ date('j F, Y', strtotime($token->created_at)) }}</td>
                            <td>{{ date('g:i A', strtotime($token->created_at)) }}</td>
                            
                            <td>
                            {{ link_to_route('tokens.show', 'View', [$token->id], ['class' => 'data_table_btn', 'style' => 'margin-bottom: 2px'])}}
                        
                            {{ link_to_route('tokens.edit', 'Edit', [$token->id], ['class' => 'data_table_btn'])}}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            </center>

    
@stop

