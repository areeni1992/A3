<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
class CareerController extends Controller
{

    public function index()
    {

        $careerData = Career::where('insert_by', 'admin')->latest()->first();

        return view('layouts.homePage.career', compact('careerData'));
    }

    public function insert()
    {
        $careerData = Career::where('insert_by', 'admin')->latest()->first();

        return view('backend.user.career', compact('careerData'));
    }

    public function insertPageDate(Request $request)
    {
        $data = [
            'background' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ];
        foreach (config('app.languages') as $key => $lang) {
            $data[$key.'*.page_title'] = 'required';
            $data[$key.'*.short_desc'] = 'nullable';
            $data[$key.'*.desc'] = 'nullable';
        }
        $validated = $request->validate($data);
        if ($validated) {
            if ($request->method() == 'POST') {
                $pageData = new Career();

                if ($request->hasFile('background')) {
                    $image = $request->file('background');
                    $newName = time().'_'.$image->getClientOriginalName();
                    $request->file('background')->storeAs('images', $newName, 'public');

                    $pageData->background = $newName;
                    $pageData->save();
                    $pageData->update($request->except('background', '_token'));
                    return redirect()->back()->with('success', 'The Message Has Been sending Successfully');
                } else {
                    $pageData->update($request->except('background', '_token'));
                    return redirect()->back()->with('success', 'The Message Has Been sending Successfully');
                }
            }

            if ($request->method() == 'PUT') {
                $updateDate = Career::find($request->id);
                if ($request->hasFile('background')) {
                    Storage::disk('public')->delete($updateDate->background);

                    $background = $request->file('background');
                    $newName = time() . '_' . $background->getClientOriginalName();
                    $request->file('background')->storeAs('images', $newName, 'public');

                    $updateDate->background = $newName;
                    $updateDate->save();
                    $updateDate->update($request->except('background', '_token'));
                    return redirect()->back()->with('success', 'The Message Has Been sending Successfully');
                } else {
                    $updateDate->update($request->except('background', '_token'));
                    return redirect()->back()->with('success', 'The Message Has Been sending Successfully');
                }
            }
        }
    }

    public function requestCareer(Request $request)
    {
        $data = [
            'start_date' => 'required',
            'end_date' => 'required',
            'desired_position' => 'required',
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'educational_background' => 'required',
            'general_questions.*' => 'sometimes|required',
            'employment_questions.*' => 'sometimes|required',
            'date_of_barth' => 'required',
            'visa_status' => 'required',
            'attachment' => 'nullable',
            'ok' => 'nullable'
        ];

        $valid = $request->validate($data, [
            'general_questions.*.required' => 'This field is required.',
            'employment_questions.*.required' => 'This field is required.'
        ]);

            $gq = json_encode($request->general_questions);
            $dq = json_encode($request->employment_questions);

            $career = new Career();
            $career->start_date = $request->start_date;
            $career->end_date = $request->end_date;
            $career->desired_position = $request->desired_position;
            $career->name = $request->name;
            $career->age = $request->age;
            $career->gender = $request->gender;
            $career->nationality = $request->nationality;
            $career->educational_background = $request->educational_background;
            $career->date_of_barth = $request->date_of_barth;
            $career->visa_status = $request->visa_status;
            $career->general_questions = json_decode($gq, true);
            $career->employment_questions = json_decode($dq, true);

            $career->ok = isset($request->ok) ? 'true' : 'false';
            $career->insert_by = 'user';
            if ($request->hasFile('attachment'))
            {
               $attach = $request->file('attachment');
               $newName = time().'_'.$attach->getClientOriginalName();
                $attach->storeAs('images', $newName, 'public');

                $career->attachment = $newName;
            }

            if ($career->save())
            {
                return redirect()->back()->with('success', 'The career application has been sending successfully');
            } else {
                return redirect()->back()->with('error', 'error');
            }
    }

    public function getAllCareers()
    {
        $agents = Career::where('insert_by', 'user')->get();

        return view('backend.user.allCareers', compact('agents'));
    }

    public function generate_pdf($id)
    {

        $exactData = Career::find($id);
        $pdf = PDF::loadView('backend.user.careerPdf', array('exactData' => $exactData));
        return $pdf->stream('document.pdf');

    }
}
