<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::query()
            ->latest()
            ->first();
        return view('backend.setting.index', compact('settings'));
    }

    public function uploadSetting(UpdateSettingRequest $request, Setting $setting)
    {

        if ($request->id == null)
        {

            if ($request->hasFile('logo'))
            {

                $fileName = 'img-'.time().'.'.$request->file('logo')->getClientOriginalExtension();
                Setting::create([
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'instagram' => $request->instagram,
                    'linkedin' => $request->linkedin,
                    'google' => $request->google,
                    'whatsapp' => $request->whatsapp,
                    'telephone' => $request->telephone,
                    'email' => $request->email,
                    'quotationtitle' => $request->quotationtitle,
                    'quotationtext' => $request->quotationtext,
                    'logo' =>  $request->file('logo')->storeAs('images', $fileName,'public')
                ]);

                return redirect()->back()->with('success', 'Settings has been updated successfully.');
            }
        }
        else {
            $exactSetting = Setting::find($request->id);

            if ($request->hasFile('logo'))
            {

                Storage::disk('public')->delete($exactSetting->logo);
                $fileName = 'img-'.time().'.'.$request->file('logo')->getClientOriginalExtension();
                $exactSetting->updateOrCreate([
                        'facebook' => $request->facebook,
                        'twitter' => $request->twitter,
                        'instagram' => $request->instagram,
                        'linkedin' => $request->linkedin,
                        'google' => $request->google,
                        'whatsapp' => $request->whatsapp,
                        'telephone' => $request->telephone,
                        'email' => $request->email,
                        'quotationtitle' => $request->quotationtitle,
                        'quotationtext' => $request->quotationtext,
                        'logo' =>  $request->file('logo')->storeAs('images', $fileName,'public')
                    ]);

                    return redirect()->back()->with('success', 'Settings has been updated successfully.');
                }
            else {
                $exactSetting->update($request->input());
                    return redirect()->back()->with('success', 'Settings has been updated successfully.');
                }
        }
    }

    public function destroy(Setting $setting)
    {
        //
    }
}
