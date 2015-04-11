@extends('tokens.layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
Create Token
@stop


<!--========================================================
                          CONTENT
=========================================================-->
@section('content1')
    <section id="content">
        
		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                        Create Token
            </div>
		</div>
		<br><br><br>
@stop


@section('content2')

        @foreach($errors->all("<p class='error'>:message</p>") as $message)
	         {{ $message }}
		    @endforeach

		<br/>
		<center>
		<center><button value="Save" onclick="resetToken()" class="submit"> Reset Token</button></center>
        <br/>
            <div style="border: 4px solid #129894; width: 800px; border-radius: 10px; background-color: #EBEBEB">

            {{ Form::open(array('action' => 'TokensController@store', 'style' => 'padding: 40px', 'id' => 'regForm')) }}

            @include('tokens.form')

            {{ Form::close() }}

            </div>
        </center>

		<br><br>
      
@stop