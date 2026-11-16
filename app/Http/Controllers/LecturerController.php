<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lecturers=Lecturer::with('user')
        ->withcount('courses')
                ->where('status', 'is_active')

        ->get();

        //dd($lecturers);
        return view('lecturers.index',compact('lecturers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lecturers.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' =>'required|string|min:8',
            'employee_number' => 'nullable|integer',
            'department'=>'required|string',
            'office_room'=>'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:is_active,is_inactive',



        ]);

        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();

        $lecturer = new Lecturer();
        $lecturer->employee_number=$request->employee_number;
        $lecturer->department=$request->department;
        $lecturer->office_room =$request->office_room;
        if ($request->hasFile('photo')) {
    $lecturer->photo = $request->file('photo')->store('lecturers', 'public');
}
        $lecturer->status=$request->status;

        $lecturer->user_id = $user->id;
        $lecturer->save();

       return redirect()->route('lecturers.index');



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $lecturer = Lecturer::findOrFail($id);
        return view('lecturers.show',compact('lecturer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $lecturer = Lecturer::findOrFail($id);
        return view('lecturers.edit',compact('lecturer'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lecturer = Lecturer::findOrFail($id);
         $request->validate([
            'name'=> 'required|string',
            'email' => 'required|email|max:255|unique:users,email,' . $lecturer->user_id,   
            'employee_number' => 'nullable|integer',
            'department'=>'required|string',
            'office_room'=>'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:is_active,is_inactive',


        ]);

        $user = $lecturer->user;
 
       $user->name = $request->name;
       $user->email = $request->email;
      $user->save();

      $lecturer->employee_number = $request->employee_number;
      $lecturer->department = $request->department;
      $lecturer->office_room = $request->office_room;
        $lecturer->status = $request->status;
        if ($request->hasFile('photo')) {
    $lecturer->photo = $request->file('photo')->store('lecturers', 'public');
}

    $lecturer->save();
return redirect()->route('lecturers.index');

        



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $lecturer = Lecturer::findOrFail($id);

    if ($lecturer->courses()->exists()) {
return redirect()->route('lecturers.index')
    ->with('error', 'Cannot delete lecturer with courses');    }

    $lecturer->delete();

  return redirect()->route('lecturers.index');
}
}
