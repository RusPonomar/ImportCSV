<?php

namespace App\Http\Controllers;
use Excel;
use App\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class CandidateController extends Controller
{
    public function list(){
        $candidates = Candidate::with(['jobs' => function($query) {
            $query->orderBy('end_at', 'desc');
        }])->get();
        //dd($candidates[0]->jobs);
        return view('candidates', compact('candidates'));
    }
    public function candidatesImport(Request $request){
        if($request->hasFile('candidates')){
            $path = $request->file('candidates')->getRealPath();
            $data = \Excel::load($path)->get();
            //dd($data);
            if($data->count()){

                foreach ($data as $key => $value){
                    $candidate_list[] = ['first' => $value->first, 'last' => $value->last, 'email' => $value->email];
                }
                //dd($candidate_list);

                if(!empty($candidate_list)){
                    Candidate::insert($candidate_list);
                    \Session::flash('success','File imported successfully.');
                }

            }
        }else{
            \Session::flash('warnning','There is no file to import.');
        }
        return Redirect::back()->withSuccess('File Downloaded!');
    }
    public function candidatesExport($type){
        $candidates = Candidate::get()->toArray();

        //get('first', 'last','email')->
        return \Excel::create('Candidates', function($excel) use($candidates){
            $excel->sheet('Candidate Details', function($sheet) use ($candidates)
            {
                $sheet->fromArray($candidates);
            });
        })->download($type);
    }

    public function getJobs()
    {
        $candidateJobs = App\Candidate::find(1);


//        $candidateJobs->jobs()->where('active', 1)->get();}
//        $data= App\Candidate::with ()
    }
}
