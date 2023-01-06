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
           // $graphics= Job::where("job_type","like", "%graphics%")->get();
           $graphics =  Job::where('job_type', 'Like', 'graphics')->orderByDesc('id')->limit(6)->get();
            $graphics_count= count(Job::where("job_type","Like","graphics")->get());
            $web_count= count(Job::where("job_type","Like","web design")->get());
            $web= Job::where("job_type","like", "web design")->orderByDesc('id')->limit(6)->get();

            return view('welcome', ["all"=>$all_jobs,"graphics"=>$graphics,"web"=>$web, "total_graphic"=>$graphics_count,"total_web"=>$web_count]);
        }
}
