<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Libraries\ExportToExcel;
use App\Model\Quiz;
use App\Model\Question;
use App\Model\Quiz_Question;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToArray;
// Quiz;

class QuizController extends Controller
{
    public function index(Request $request)
    {
        // $name = $request->name ?? '';

        $quiz = Quiz::orderBy('created_at', 'DESC')->paginate(10);
        // dd($quiz);
        return view('admin.quiz.index', compact('quiz'));
    }

//     public function create()
//     {
//         $control = 'create';

//         // dd($course);
//         return view('admin.quiz.create', compact('control'));
//     }


//     public function save(Request $request)
//     {
// // dd($request->all());
//         $quiz = new Quiz();

//         $this->add_or_update($request, $quiz);

//         return redirect('admin/quiz');

//     }
    // public function edit($id)
    // {

    //     $control = 'edit';
    //     $quiz = Quiz::find($id);


    //     return view('admin.quiz.create', compact(
    //         'control',
    //         'quiz',


    //     ));
    // }

    // public function update(Request $request, $id)
    // {
    //     $quiz = Quiz::find($id);
    //     // $quiz = Quiz::find($id);

    //     $this->add_or_update($request, $quiz);
    //     return Redirect('admin/quiz');
    // }


    // public function add_or_update(Request $request, $quiz)
    // {
    //     // dd($request->all());

    //     // $current_format_date =  $request->start_date->format('m/d/Y');    //24/02/22



    //     $quiz->full_name = $request->full_name;
    //     $quiz->short_name = $request->short_name;
    //     $quiz->category = $request->category;
    //     $quiz->description = $request->description;




    //     $quiz->save();


    //     return redirect()->back();
    // }

    // public function destroy_undestroy($id)
    // {

    //     $quiz = Quiz::find($id);
    //     if ($quiz) {
    //         Quiz::destroy($id);
    //         $new_value = 'Activate';
    //     } else {
    //         Quiz::withTrashed()->find($id)->restore();
    //         $new_value = 'Delete';
    //     }
    //     $response = Response::json([
    //         "status" => true,
    //         'action' => Config::get('constants.ajax_action.delete'),
    //         'new_value' => $new_value
    //     ]);
    //     return $response;
    // }


    public function question_list($id)
    {
        $quiz_question_id = $id;
        $question = Question::get();
        $quiz_question = Quiz_Question::where('quiz_id',$id)->pluck('question_id')->toArray();
        $quiz = Quiz::where('id',$id)->first();
        return view('admin.question_list_open.index', compact('question','quiz_question','quiz'));

    }

    public function quiz_question_list_update(Request $request){

        $res = new \stdClass();
        $quiz_id = $request->quiz_id;
        $question_id = $request->question_id;
        $quiz_question = Quiz_Question::where('quiz_id',$quiz_id)->where('question_id',$question_id)->first();

        if($quiz_question){
            $quiz_question->delete();
            $res->message = 'Removed Successfully';
        }
        else{
            $quiz_question = new Quiz_Question();
            $quiz_question->quiz_id = $quiz_id;
            $quiz_question->question_id = $question_id;
            $quiz_question->save();
            $res->message = 'Added Successfully';
        }

        $res->status = true;

        return json_encode($res);
    }



}
