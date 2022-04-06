<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{	

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    

	public function add(){

		return view("home");
	}
	public function store(Request $request)
	{
		$input = $request->all();
		$task = new Task();
		$task->task = request("task");


		$dateTime = request("deadline"); 
		$tz_from = request("tz_from"); 
		$newDateTime = new \DateTime($dateTime, new \DateTimeZone($tz_from)); 
		$newDateTime->setTimezone(new \DateTimeZone("UTC")); 
		$dateTimeUTC = $newDateTime->format("Y-m-d H:i:s");
		$task->deadline = $dateTimeUTC;	
		$current =  date("Y-m-d H:i:s");
		$d1 = new \DateTime($current);
		$d2 = new \DateTime(request("deadline"));
		$interval = $d1->diff($d2);
		$task->minutes = $interval->i;
		$task->save();
		return \Redirect::back()->with("message", "Task has been added");
	}

}
