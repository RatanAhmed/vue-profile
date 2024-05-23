<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Gate;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(): Response
    public function index()
    {
        return Inertia::render('Member/Index', [
            'members' => Member::latest()->get()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Member/Create', [
            //
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request): RedirectResponse
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|max:11',
            'date_of_birth'  => 'required|string|max:255',
            'gender'  => 'required|string|max:255',
            'address'  => 'required|string|max:255',
            'linkedin_url'  => 'required|url|max:255',
            // 'image'  => 'required|file',
            // 'resume'  => 'required|string|max:255',
            'education_level'  => 'required|max:255',
            'subject'  => 'required|max:255',
            'institution'  => 'required|max:255',
            'result'  => 'required',
            'result_type'  => 'required',
            // 'language_skill'  => 'required',
            'experience_in_year'  => 'required|max:255',
        ]);

        $member = Member::create($validated);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $member->image =  Storage::putFileAs('image', $image, $imageName);
        }

        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $resumeName = $resume->getClientOriginalName();
            $member->resume =  Storage::putFileAs('resume', $resume, $resumeName);
        }
        
        $member->language_skill = json_encode($request->language_skill);
        $member->update();
        return redirect(route('members.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $Member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return Inertia::render('Member/Edit', [
            'member' => $member
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|max:11',
            'date_of_birth'  => 'required|string|max:255',
            'gender'  => 'required|string|max:255',
            'address'  => 'required|string|max:255',
            'linkedin_url'  => 'required|url|max:255',
            'education_level'  => 'required|max:255',
            'subject'  => 'required|max:255',
            'institution'  => 'required|max:255',
            'result'  => 'required',
            'result_type'  => 'required',
            // 'language_skill'  => 'required',
            'experience_in_year'  => 'required|max:255',
        ]);
        $member->fill($validated);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $member->image =  Storage::putFileAs('image', $image, $imageName);
        }
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $resumeName = $resume->getClientOriginalName();
            $member->resume =  Storage::putFileAs('resume', $resume, $resumeName);
        }
        
        $member->language_skill = json_encode($request->language_skill);
        $member->update();

        return redirect(route('members.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member): RedirectResponse
    {
        $member->delete();
        return redirect(route('members.index'));
    }
}
