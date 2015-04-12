@extends('appointments.layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
    @if($flag == 'prescription' || $flag == 'pres_print')
        Select Token
    @else
        Select Operation Booking
    @endif

@stop


<!--========================================================
                          CONTENT
=========================================================-->
@section('content2')
    <section id="content">

		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                      @if($flag == 'prescription' || $flag == 'pres_print')
                          Select Token
                      @else
                          Select Operation Booking
                      @endif
            </div>
		</div>


		<!--========================================================
                                     Data Table
            =========================================================-->
            <center style="margin-top: 7%;">

            		<br>
                <table id="example" style=" border: 1px solid black" class="display" cellspacing="0" width="80%">
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Doctor Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Checkup Fee</th>
                        <th style="width: 25%">Action</th>
                    </tr>
                </thead>

                <tbody>
                @if($flag == 'prescription' || $flag == 'pdf_record' || $flag == 'pres_print')
                    @foreach($tokens as $token)
                        <tr>
                            <td>{{{ $token->patient->name }}}</td>
                            <td>{{{ $token->doctor->name }}}</td>
                            <td>{{{ date('j F, Y', strtotime($token->created_at)) }}}</td>
                            <td>{{{ date('g:i A', strtotime($token->created_at)) }}} </td>

                            <td>
                                @if(($token->fee) != null)
                                    {{ $token->fee . '-/Rs'}}
                                @else
                                    Unpaid
                                @endif
                            </td>
                            <td>
                            @if($flag == 'pdf_record')
                                {{ link_to('pdf?id='.$token->id, 'Save PDF', ['class' => 'data_table_btn'])}}
                            @elseif($flag == 'pres_print')
                                {{ link_to_route('prescriptions.show', 'Select', ['id' => $token->id, 'flag' => 'print'], ['class' => 'data_table_btn'])}}
                            @else
                                {{ link_to_route('prescriptions.create', 'Add', ['id' => $token->id], ['class' => 'data_table_btn'])}}
                            @endif
                            </td>
                    @endforeach
                    @elseif(isset($appointments))
                        @foreach($appointments as $appointment)
                            <tr>
                                <td>{{{ $appointment->patient->name }}}</td>
                                <td>{{{ $appointment->employee->name }}}</td>
                                <td>{{{ date('j F, Y', strtotime($appointment->date)) }}}</td>
                                <td>{{{ $appointment->timeslot->slot }}} </td>

                                <td>
                                    @if(($appointment->checkupfee) != null)
                                        {{ $appointment->checkupfee->checkup_fee . '-/Rs'}}
                                    @else
                                        Unpaid
                                    @endif
                                </td>
                                <td>
                                @if($flag == 'vitals')
                                    @if(Auth::user()->role == 'Administrator' || Auth::user()->role == 'Receptionist')
                                        {{ link_to_route('vitalsigns.create', 'Add', ['id' => $appointment->id], ['class' => 'data_table_btn'])}}
                                    @elseif(Auth::user()->role == 'Doctor')
                                        {{ link_to_route('vitalsigns.show', 'View', ['id' => $appointment->id], ['class' => 'data_table_btn'])}}
                                    @endif
                                @elseif($flag == 'test')
                                        {{ link_to_route('labtests.index', 'Select', ['id' => $appointment->id], ['class' => 'data_table_btn'])}}
                                @elseif($flag == 'proc')
                                     {{ link_to_route('diagonosticprocedures.create', 'Add', ['id' => $appointment->id], ['class' => 'data_table_btn'])}}
                                @elseif($flag == 'check_fee')
                                    @if(Auth::user()->role == "Accountant")
                                        @if(($appointment->checkupfee) != null)
                                            {{ link_to_route('checkupfees.show', 'View', ['id' => $appointment->id], ['class' => 'data_table_btn'])}}
                                            {{ link_to_route('checkupfees.edit', 'Edit', ['id' => $appointment->id], ['class' => 'data_table_btn'])}}
                                        @else
                                            {{ link_to_route('checkupfees.create', 'Add', ['id' => $appointment->id], ['class' => 'data_table_btn'])}}
                                        @endif
                                    @else
                                     {{ link_to_route('checkupfees.create', 'Add', ['id' => $appointment->id], ['class' => 'data_table_btn'])}}
                                    @endif
                                @elseif($flag == 'test_fee')
                                     {{ link_to_route('labtests.index', 'Select', ['id' => $appointment->id, 'flag' => 'test_fee'], ['class' => 'data_table_btn'])}}
                                @elseif($flag == 'test_print')
                                    {{ link_to_route('labtests.index', 'Select', ['id' => $appointment->id, 'flag' => 'print'], ['class' => 'data_table_btn'])}}
                                @elseif($flag == 'checkup_invoice')
                                    {{ link_to_route('checkupfees.show', 'View', ['id' => $appointment->id, 'flag' => 'checkup_invoice'], ['class' => 'data_table_btn'])}}
                                @elseif($flag == 'test_invoice')
                                    {{ link_to('test_invoice_print?id='.$appointment->id, 'Print', ['class' => 'data_table_btn'])}}
                                @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
            </center>

@stop

