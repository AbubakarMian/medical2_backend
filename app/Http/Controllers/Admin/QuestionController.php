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
use App\Model\Question_Course;
use PDF;


class QuestionController extends Controller
{
    public function index()
    {
        return view('admin.question.index');
    }

    public function getQuestion($id = 0)
    {
        $question = Question::orderby('id', 'desc')->select('*')->get();
        $questionData['data'] = $question;
        echo json_encode($questionData);
    }

    public function course_question_list($course_id = 0) // {id}
    {
        $question = Question_Course::with('question');
        if($course_id){
            $question = $question->where('courses_id',$course_id);
        }
        $question = $question->orderby('id', 'desc')->get();

        $questionData['data'] = $question;

        echo json_encode($questionData );
    }

    public function create()
    {
        $control = 'create';
        $question = new Question();
        $courses_list = Courses::orderby('id', 'desc')->get()->toArray();
        $question_course = [];
        $courses_list = array_chunk($courses_list, 4);
        return view('admin.question.create', compact('control', 'question','courses_list','question_course'));
    }

    public function save(Request $request)
    {

        $questions = new Question();
        $this->add_or_update($request, $questions);
        return redirect('admin/question');
    }

    public function edit($id)
    {
        $control = 'edit';
        $question = Question::with('choice')->find($id);
        $question_course = Question_Course::where('question_id',$id)->pluck('courses_id')->toArray();
        $courses_list = Courses::orderby('id', 'desc')->get()->toArray();
        $courses_list = array_chunk($courses_list, 4);

        return view('admin.question.create', compact(
            'control',
            'question',
            'question_course',
            'courses_list',
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
        $courses = explode(',',$request->selected_courses);
        $questions->question = $request->question;
        $questions->save();
        foreach ($request->choices as $key => $ch) {
            $correnct_choice_num = $request->correct_choice  - 1;
            $choice = new Choice();
            $choice->choice = $ch;
            $choice->question_id = $questions->id;
            $choice->is_correct = ($correnct_choice_num == $key) ? 1 : 0;
            $choice->save();
        }

        Question_Course::where('question_id',$questions->id)->delete();
        foreach($courses as $c){
            $question_course = new Question_Course();
            $question_course->question_id = $questions->id;
            $question_course->courses_id = $c;
            $question_course->save();
        }
    }


    public function destroy_undestroy($id)
    {
        $question = Question::find($id);
        if ($question) {
            Question::destroy($id);
            Question_Course::where('question_id',$id)->delete();
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
}
