<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
class AgentController extends Controller
{
    public function index()
    {

        $agentsData = Agent::where('insert_by', 'admin')->latest()->first();

        return view('layouts.homePage.agents', compact('agentsData'));
    }
    public function insert()
    {
        $agenstData= Agent::where('insert_by', 'admin')->latest()->first();

        return view('backend.user.agents', compact('agenstData'));
    }

    public function insertPageData(Request $request)
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
                $pageData = new Agent();

                if ($request->hasFile('background')) {
                    $image = $request->file('background');
                    $newName = time() . '_' . $image->getClientOriginalName();
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
                $updateDate = Agent::find($request->id);
                if ($request->hasFile('background')) {
                    if (Storage::exists($request->file('background')))
                    {
                        Storage::disk('public')->delete($updateDate->background);
                    } else {

                        $background = $request->file('background');
                        $newName = time().'_'.$background->getClientOriginalName();
//                        dd($newName);
                        $request->file('background')->storeAs('images', $newName, 'public');

                        $updateDate->background = $newName;
                        $updateDate->save();
                        $updateDate->createOrUpdate($request->except('background', '_token'));
                        return redirect()->back()->with('success', 'The Message Has Been sending Successfully');
                    }

                } else {
                    $updateDate->update($request->except('background', '_token'));
                    return redirect()->back()->with('success', 'The Message Has Been sending Successfully');
                }
            }
        }
    }

    public function requestAgent(Request $request)
    {
        $data = [
            'name_of_the_company.*' => 'required',
            'office_address.*' => 'required',
            'billing_address.*' => 'required',
            'shipping_address.*' => 'required',
            'business_organiz' => 'required',
            'type_of_buyer' => 'required',
            'payment_method' => 'required',
            'currency' => 'required',
            'bank_details.*' => 'required',
            'key_personnel_contact.*' => 'required',
            'order_info' => 'required',
            'shipment_method' => 'required',
            'port_of_shipment' => 'required',
            'preferred_shipment_pricing' => 'required',
            'attachment' => 'nullable',
        ];

        $valid = $request->validate($data, [
            'name_of_the_company.*.required' => 'This field is required.',
            'office_address.*.required' => 'This field is required.',
            'billing_address.*.required' => 'This field is required.',
            'shipping_address.*.required' => 'This field is required.',
            'bank_details.*.required' => 'This field is required.',
            'key_personnel_contact.*.required' => 'This field is required.',
        ]);

        $nc = json_encode($request->name_of_the_company);
        $oa = json_encode($request->office_address);
        $ba = json_encode($request->billing_address);
        $sa = json_encode($request->shipping_address);
        $bd = json_encode($request->bank_details);
        $kpc = json_encode($request->key_personnel_contact);

        $agent = new Agent();
        $agent->business_organiz = $request->business_organiz;
        $agent->type_of_buyer = $request->type_of_buyer;
        $agent->payment_method = $request->payment_method;
        $agent->currency = $request->currency;
        $agent->order_info = $request->order_info;
        $agent->shipment_method = $request->shipment_method;
        $agent->port_of_shipment = $request->port_of_shipment;
        $agent->preferred_shipment_pricing = $request->preferred_shipment_pricing;
        $agent->name_of_the_company = json_decode($nc, true);
        $agent->office_address = json_decode($oa, true);
        $agent->billing_address = json_decode($ba, true);
        $agent->shipping_address = json_decode($sa, true);
        $agent->bank_details = json_decode($bd, true);
        $agent->key_personnel_contact = json_decode($kpc, true);
        $agent->insert_by = 'user';

        if ($request->hasFile('attachment'))
        {
            $attach = $request->file('attachment');
            $newName = time().'_'.$attach->getClientOriginalName();
            $attach->storeAs('images', $newName, 'public');

            $agent->attachment = $newName;
        }

        if ($agent->save())
        {
            return redirect()->back()->with('success', 'The career application has been sending successfully');
        } else {
            return redirect()->back()->with('error', 'error');
        }

    }

    public function getAllAgents()
    {
        $agents = Agent::where('insert_by', 'user')->get();

        return view('backend.user.allAgents', compact('agents'));
    }

    public function generate_pdf($id)
    {

        $exactData = Agent::find($id);
        $pdf = PDF::loadView('backend.user.agentPdf', array('exactData' => $exactData));
        return $pdf->stream('document.pdf');

    }


}
