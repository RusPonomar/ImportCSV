<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Job;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\Redirect;


class JobController extends Controller

{
    public function list(){
        return view('candidates');
    }
    public function jobsImport(Request $request){
        if($request->hasFile('jobs')){
            $path = $request->file('jobs')->getRealPath();
            $data = \Excel::load($path)->get();
            //dd($data);
            if($data->count()){

                foreach ($data as $key => $value){
                    $job_list[] = ['candidate_id' => $value->candidate_id,
                        'position' => $value->position, 'company' => $value->company,
                        'start_at' => Carbon::parse($value->start_at),
                        'end_at' => Carbon::parse($value->end_at)];
                }
                //dd($candidate_list);

                if(!empty($job_list)){
                    Job::insert($job_list);
                    \Session::flash('success','File imported successfully.');
                }

            }
        }else{
            \Session::flash('warnning','There is no file to import.');
        }
        return Redirect::back()->withSuccess('File imported successfully!');;
    }

    Public function Show(){
        // $List = App\Job::where('active', 1)
        //            ->orderBy('end_date', 'desc')
        //            ->take(10)
        //            ->get();

        $employee = Job::table('jobs')
            ->orderBy('end_at', 'desc')
            ->get();

        return $this->belongsTo(Candidate::class);

    }

}
