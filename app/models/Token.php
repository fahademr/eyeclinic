<?php

class Token extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'doctor_id' => 'required',
        'patient_id' => 'required',
        'fee' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['tok_num', 'doctor_id', 'patient_id', 'note', 'fee', 'date'];

    // Relationships
    public function patient()
    {
        return $this->belongsTo('Patient');
    }

    public function doctor()
    {
        return $this->belongsTo('Employee', 'doctor_id', 'id');
    }

}