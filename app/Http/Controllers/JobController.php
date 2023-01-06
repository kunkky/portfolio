<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//import your model
use App\Models\Job;
class JobController extends Controller
{
    //
        function indexshow (){
            $all_jobs= Job::all();
            $graphics= Job::where("job_type","like", "%graphics%")->get();
            $web= Job::where("job_type","like", "%web design%")->get();

            return view('welcome', ["all"=>$all_jobs,"graphics"=>$graphics,"web"=>$web]);
        }
}
