<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        // $students = Student->fname;
        // return 
        // dd($students); 
    }
    
    public function index()
    {
        $students = Student::all();  //get all the students
        //var_dump($students);
        //dd($students);  //testing 
        
        //load the view and pass the student info
    return view('students.index')->with('students', $students);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // return view('students.create');
        //repopulate the form with previous values in case of validation error
        $student = $request->old('student');
        return view('students.create', compact('student'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {   
    //     $rules = [
    //     'fname' => 'required|string|max:255',
    //     'lname' => 'required|string|max:255',
    //     'email' => 'bail|required|email|unique:students',
    //     'telnum' => 'required|string|min:10',
    //     'rollno' => 'required|integer|max:999',
    //     'fname.required'=>'Must give a First Name',
    //     'lname.required'=>'Must give a Last Name'
    // ];

        $request->validate([
        'fname' => 'required|string|max:255',
        'fname.required'=>'Must give a First Name',
        'lname' => 'required|string|max:255',
        'lname.required'=>'Must give a Last Name',
        'email' => 'bail|required|email|unique:students',
        'telnum' => 'required|string|min:10',
        'rollno' => 'required|integer|max:999',
        
    ]);


        $data = $request->session()->all();
        // dd($request);
        $student = new Student;
        $student->fname = $request->fname;
        $student->lname = $request->lname;
        $student->email = $request->email;
        $student->telnum = $request->telnum;
        $student->rollno = $request->rollno;
        
        
        $student->save();    
        
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
        return redirect()->back()->withInput(); 
    } 




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, string $id): View
    {
        $value = $request->session()->get('key');
        return view('students.create', [
            'student' => Student::findOrFail($id)
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
   
     */
    public function edit($id)
    {
        $student=Student::find($id);
        return view('students.edit',compact('student'));
        $rules = [
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'telnum' => 'required|integer|min:10',
        'rollno' => 'required|integer|max:3',
        ];

        $validatedData = $request->validate($rules);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $student =  Student::findorfail($id);
        $student->update($request->all());
        
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
        return redirect()->route('students.index')->with('error', 'An error occurred while updating the student.');

   }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request,$id)
    {
         $student = Student::find($id);
         $student->delete($request->all());
        // $student->delete($id);

        // return redirect()->route('students.delete.id')
        // ->withSuccess(__('data deleted successfully.'));

    if ($student) {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'User Deleted successfully.');

    } else {
        return redirect()->route('students.index')->with('fail', 'User Delete unsuccessfull.');


    }
        //
    }
}
