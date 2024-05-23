<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class MemberController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Member/Index', [
            'members' => Member::latest()->get()
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Member/Create');
    }

    public function store(Request $request): RedirectResponse
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
            $member->image =  $this->fileUpload($request->file('image'), 'image');
        }
        if ($request->hasFile('resume')) {
            $member->resume =  $this->fileUpload($request->file('resume'), 'resume');
        }
        
        $member->language_skill = json_encode($request->language_skill);
        $member->update();
        return redirect(route('members.index'));
    }

    public function edit(Member $member)
    {
        return Inertia::render('Member/Edit', [
            'member' => $member
        ]);
    }

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
            'experience_in_year'  => 'required|max:255',
        ]);

        $member->fill($validated);
        if ($request->hasFile('image')) {
            $member->image =  $this->fileUpload($request->file('image'), 'image');
        }
        if ($request->hasFile('resume')) {
            $member->resume =  $this->fileUpload($request->file('resume'), 'resume');
        }
        
        $member->language_skill = json_encode($request->language_skill);
        $member->update();

        return redirect(route('members.index'));
    }

    public function destroy(Member $member): RedirectResponse
    {
        $member->delete();
        return redirect(route('members.index'));
    }

    private function fileUpload($requestFile, $folder){
        $file = $requestFile;
        $fileName = $file->getClientOriginalName();
        $path = Storage::putFileAs($folder, $file, $fileName);
        return $path;
    }
}
