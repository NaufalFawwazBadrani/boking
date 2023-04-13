<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $title = 'Data Departments';
        $departements = Department::orderBy('id','Asc')->paginate(5);
        $managers = User::where('position','1')->get();
        return view('departements.index', compact('departements','managers', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Data Departments';
        $managers = User::where('position','1')->get();
        return view('departements.create', compact('managers','title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'manager_id' => 'required',
        ]);
        
        Department::create($request->post());

        return redirect()->route('departements.index')->with('success','Department has been created successfully.');
    }

    public function show(Department $departements)
    {
        $title = 'Show';
        return view('departements.show',compact('departements', compact('title')));
    }

    /**
    * Show the form for editing the specified resource.
    */
        public function edit(Department $departement)
    {
        $title = 'Edit Departments';
        $managers = User::where('position','1')->get();
        return view('departements.edit',compact('departement' ,'managers', 'title'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Department $departement)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'manager_id' => 'required',
        ]);
        
        $departement->fill($request->post())->save();

        return redirect()->route('departements.index')->with('success','Department Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(Department $departement)
    {
        $departement->delete();
        return redirect()->route('departements.index')->with('success','Department has been deleted successfully');
    }
}