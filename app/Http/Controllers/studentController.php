<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentController extends Controller
{
    public function index()
    {
        $students = \App\Models\Student::all();
        return view('student.index', compact('students'));

    }
    public function create()
    {
        return view('student.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'mname' => 'required',
            'address' => 'required',
            'dob' => 'required|date',
        ]);

        \App\Models\Student::create($request->all());

        return redirect()->route('student.index')->with('success', 'Student created successfully.');
    }

    public function show($id)
    {
        $student = \App\Models\Student::findOrFail($id);
        return view('student.show', compact('student'));
    }
        public function edit($id)
        {
            $student = \App\Models\Student::findOrFail($id);
            return view('student.edit', compact('student'));
        }

        public function update(Request $request, $id)
        {
            $request->validate([
                'fname' => 'required',
                'lname' => 'required',
                'mname' => 'required',
                'address' => 'required',
                'dob' => 'required|date',
            ]);

            $student = \App\Models\Student::findOrFail($id);
            $student->update($request->all());

            return redirect()->route('student.index')->with('success', 'Student updated successfully.');
        }

        public function destroy($id)
        {
            $student = \App\Models\Student::findOrFail($id);
            $student->delete();

            return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
        }
}
