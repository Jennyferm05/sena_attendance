<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
       $students =  Student::all();
       return response()->json($students);

    }
    public function store(Request $request)
    {
       $request->validate([
        'first_name' => 'required',
            'last_name' => 'required',
            'document_type' => 'required',
            'document_number' => 'required',
            'ficha' => 'required',
            'absence' => 
            'required|in:none,half,
            justified,unjustified',
       ]);
       return Student::create($request->all());
    }
    public function show(string $id)
    {
        return Student::findOrFail($id);
    }
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'document_type' => 'required',
            'document_number' => 'required',
            'ficha' => 'required',
            'absence' => 'required|in:none,half,justified,unjustified',
        ]);
    
        $student->update($request->all());
    
        return $student;
    }
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
    $student->delete();

    return response()->json([
        'message' => 'El aprendiz ha sido elimando exitosamente'
    ]);
    }
}
