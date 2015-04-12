@extends('prescriptions.layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
    Manage Prescriptions
@stop


<!--========================================================
                          CONTENT
=========================================================-->
@section('content2')
    <section id="content">
        
		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                        Manage Prescriptions
            </div>
		</div>


		<!--========================================================
                                     Data Table
            =========================================================-->
            <center style="margin-top: 7%;">

                <table id="example" style=" border: 1px solid black" class="display" cellspacing="0" width="80%">
                <thead>
                    <tr>
                        <th style="width: 20%">Patient Name</th>
                        <th>Doctor Name</th>
                        <th>Checkup Date</th>
                        <th>Checkup Time</th>
                        <th style="width: 25%">Action</th>
                    </tr>
                </thead>

                <tbody>

                
                    @foreach($tokens as $token)
                        <tr>
                            <td>{{{ $token->patient->name }}}</td>
                            <td>{{{ $token->doctor->name }}}</td>
                            <td>{{{ date('j F, Y', strtotime($token->created_at)) }}}</td>
                            <td>{{{ date('g:i A', strtotime($token->created_at)) }}}</td>
                            <td>
                            {{ link_to_route('prescriptions.show', 'View', [$token->id], ['class' => 'data_table_btn', 'style' => 'margin-bottom: 2px'])}}
                        @if(Auth::user()->role != 'Doctor') 
                            {{ link_to_route('prescriptions.edit', 'Edit', [$token->id], ['class' => 'data_table_btn'])}}
                        @endif
                            </td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>
            </center>

    
@stop

