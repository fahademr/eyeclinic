<?php

class TokensController extends \BaseController {

	/**
	 * Display a listing of tokens
	 *
	 * @return Response
	 */
	public function index()
	{
		$tokens = Token::orderBy('created_at', 'desc')->get();

		return View::make('tokens.index', compact('tokens'));
	}

	/**
	 * Show the form for creating a new token
	 *
	 * @return Response
	 */
	public function create()
	{
        $token_count = TokenCount::first();
        if($token_count->date == date('Y-m-d')){
            $num = $token_count->count;
            $num++;
        }else{
            $tokenCount = TokenCount::first();
            $tokenCount->count = 0;
            $tokenCount->date = date('Y-m-d');
            $tokenCount->update();
            $num = ++$tokenCount->count;
        }

        $doctors = Employee::where('role', 'Doctor')->where('status', 'active')->get();
        $patients = Patient::all();
		return View::make('tokens.create',  compact('doctors', 'patients', 'num'));
	}

	/**
	 * Store a newly created token in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Token::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Token::create($data);

        $tokenCount = TokenCount::first();
        $tokenCount->count += 1;
        $tokenCount->update();

		return Redirect::route('tokens.index');
	}

	/**
	 * Display the specified token.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$token = Token::findOrFail($id);

		return View::make('tokens.show', compact('token'));
	}

	/**
	 * Show the form for editing the specified token.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$token = Token::find($id);

        $doctors = Employee::where('role', 'Doctor')->where('status', 'active')->get();
        $patients = Patient::all();

		return View::make('tokens.edit', compact('token', 'doctors', 'patients'));
	}

	/**
	 * Update the specified token in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$token = Token::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Token::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$token->update($data);

		return Redirect::route('tokens.index');
	}

	/**
	 * Remove the specified token from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Token::destroy($id);

		return Redirect::route('tokens.index');
	}

}
