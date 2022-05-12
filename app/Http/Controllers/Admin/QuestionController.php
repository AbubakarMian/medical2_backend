<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use App\Model\Courses;
use App\Model\Question;
use App\Model\Choice;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\libraries\ExportToExcel;

use PDF;


class QuestionController extends Controller
{

    // Question

    public function index()
    {
        $question = Question::orderBy('id', 'DESC')->paginate(10);
        return view('admin.question.index', compact('question'));
    }

    public function create()
    {
        $control = 'create';
        $question = new Question();

        return view('admin.question.create', compact('control', 'question'));
    }

    public function save(Request $request)
    {
        // dd($request->all());
        $questions = new Question();
        $this->add_or_update($request, $questions);

        return redirect('admin/question');
    }

    public function edit($id)
    {
        // dd('hyyy');
        $control = 'edit';

        $question = Question::with('choice')->find($id);
        return view('admin.question.create', compact(
            'control',
            'question',


        ));
    }

    public function update(Request $request, $id)
    {

        $questions = Question::with('choice')->find($id);

        foreach ($questions->choice as $key => $ch) {
            $choices =  Choice::destroy($ch->id);
        }
        $this->add_or_update($request, $questions);
        return redirect('admin/question');
    }


    public function add_or_update(Request $request, $questions)
    {


        $questions->question = $request->question;
        $questions->save();


        foreach ($request->choices as $key => $ch) {
            $correnct_choice_num = $request->correct_choice  - 1;
            $choice = new Choice();
            $choice->choice = $ch;
            $choice->question_id = $questions->id;
            $choice->is_correct = ($correnct_choice_num == $key) ? 1 : 0;
            // dd($key);
            // dd( (int)$ch[$request->correct_choice - 1]);
            // dd($choice->is_correct);
            $choice->save();
        }

    }


    public function destroy_undestroy($id)
    {

        $question = Question::find($id);
        if ($question) {
            Question::destroy($id);
            $new_value = 'Activate';
        } else {
            Question::withTrashed()->find($id)->restore();
            $new_value = 'Delete';
        }
        $response = Response::json([
            "status" => true,
            'action' => Config::get('constants.ajax_action.delete'),
            'new_value' => $new_value
        ]);
        return $response;
    }
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





    // public function index_excel(Request $request ,$id)
    // {
    //     $quiz = Quiz::where('course_id', $id)->orderBy('id', 'DESC')->get();
    //     // dd( $quiz);
    //     $view =  view('admin.listofquiz.export', compact('quiz'));
    //     //  dd( $view);

    //     $export_data = new ExportToExcel($view);

    //     $excel = Excel::download($export_data, 'course.xlsx');

    //     return $excel;
    // }
    // public function index_csv(Request $request ,$id)
    // {
    //     $quiz = Quiz::where('course_id', $id)->orderBy('id', 'DESC')->get();
    //     $view =  view('admin.listofquiz.export', compact('quiz'));

    //     $export_data = new ExportToExcel($view);

    //     $excel = Excel::download($export_data, 'course.csv');

    //     return $excel;
    // }

    // public function generatePDF()
    // {
    //     $type = 'pdf';
    //     $quiz = Quiz::orderBy('id', 'DESC')->get();
    //     $pdf = PDF::loadView('admin.listofquiz.export', compact('quiz', 'type'));

    //     return $pdf->download('HRS-course-list.pdf');
    // }
}
