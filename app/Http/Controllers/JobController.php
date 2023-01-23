<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//import your model
use App\Models\Job;
//import Reirect
use Illuminate\Support\Facades\Redirect;
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
    //adminview
            function dashboardshow (){
                $all_jobs= Job::all();


            return view('dashboard', ["all"=>$all_jobs]);
        }

    //upload here
            function UploadJobs(Request $request){
                //connect to the table needed
                $submission=new job;

                //Upload image
                $image =$request->avatar;
                $imagename="works".time().".".$image->getClientoriginalExtension();

                //Move image to a folder
                $request->avatar->move("jobs",$imagename);

                //save the image path to a database
                $submission->avatar=$imagename;

                //save other form data
                $submission->name=$request->name;
                $submission->job_type=$request->job_type;
                $submission->job_date=$request->job_date;
                $submission->description=$request->description;
                $submission->status=$request->status;

                //save all
                $submission->save();


                //go back
                return redirect()->back()->with('message','Job Added Successfully');


            }
        function requestview($id){
                //fetch form database
                $selectedJob= Job::where("id","=", "$id")->first();
                if ($selectedJob === null) {
                    //if data doesnt exit redirect home
                    return Redirect::to('/dashboard')->with("message","Job does not exist");
                }
                else{
                //Send Data to View
                return view('EditJob', ["selectedJob"=>$selectedJob]);


                }


        }
        function EditJob(Request $request){


            $affected = Job::where('id', $request->id)
              ->update([
              'name' => $request->name,
              'job_type' => $request->job_type,
              'job_date' => $request->job_date,
              'description' => $request->description,
              'status' => $request->status

              ]);
              //Check if data was Updated or not
              if ($affected){
                //redirect home with success message
                    return Redirect::to('/dashboard')->with("message","Job edited successfully");

              }
              else
              {
                //redirect home with failed message
                    return Redirect::to('/dashboard')->with("message","Job not edited");

              }
        }

}
