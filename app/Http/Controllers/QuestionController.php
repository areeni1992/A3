<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index()
    {
       $faqs = Faq::where('publish_for', 'user')->get();
       $questions = Question::all();

       return view('backend.question.index', compact('questions', 'faqs'));
    }

    public function createQuestion()
    {
        $faqs = Faq::where('publish_for', 'user')->get();

        return view('backend.question.create', compact('faqs'));
    }

    public function insertQuestin(Request $request)
    {
        $data = ['parent_id' => 'required'];
        foreach (config('app.languages') as $key => $lang) {
            $data[$key.'*.question'] = 'required|string';
            $data[$key.'*.answer'] = 'required|string';
        }

        $validated = $request->validate($data);
        Question::create($validated);

        return redirect()->back()->with('success', 'Faq Category Name Successfully Created!');
    }

    public function editQuestion($id)
    {
        $question = Question::find($id);
        $faqs = Faq::where('publish_for', 'user')->get();

        return view('backend.question.edit', compact('question', 'faqs'));

    }

    public function updateQuestion(Request $request)
    {
        $data = ['parent_id' => 'required'];
        foreach (config('app.languages') as $key => $lang) {
            $data[$key.'*.question'] = 'required|string';
            $data[$key.'*.answer'] = 'required|string';
        }

        $validator = $request->validate($data);

        $question= Question::find($request->id);
        $question->update($validator);

        return redirect()->back()->with('success', 'Faq Category Name Successfully Created!');
    }

    public function deleteQuestion(Request $request)
    {
        DB::table('questions')->where('id', $request->id)->delete();

        return redirect()->back()->with('success', 'Faq Category Name Successfully Deleted!');
    }
}
