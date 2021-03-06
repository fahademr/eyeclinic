@extends('receptionist.layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
Receptionist Home
@stop

<!--========================================================
                          CURRENT MENU
=========================================================-->
@section("current_rec_home")
class="current"
@stop

<!--========================================================
                          CONTENT
=========================================================-->
@section('content')
    <section id="content">
        
		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                        Receptionist Home
            </div>
		</div>
		<br>
			<div>
				<div class="menu" style="margin-left: 10%; margin-right: 10%">
				    <a class="orange" href="patients" >Manage Patients </a>
					<a class="pink" href="appointments">Operation Bookings</a>
					<a class="purple" href="app_proc"> Operation Procedures	</a>
					<a class="pink" href="tokens">Manage Tokens</a>
					<a class="blue" href="dutydays">Doctor Schedules</a>
					<a class="pink" href="patients">Manage Patients</a>
					<a class="purple" href="search_pmr">Manage Medical Record</a>
					<a class="ferozi" href="app_vitals">Add Vital Signs</a>
					<a class="blue" href="app_prescription">Prepare Prescription</a>
					<a class="pink" href="app_pres_print">Print Prescription</a>
					{{--<a class="purple" href="app_tests">Manage Test Reports</a>--}}
				</div>
			</div>
		
       
@stop