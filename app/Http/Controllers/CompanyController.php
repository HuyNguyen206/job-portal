<?php

namespace App\Http\Controllers;

use App\Http\Traits\UploadFileTrait;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    use UploadFileTrait;

    public function __construct()
    {
        $this->middleware(['auth', 'check-permission:employer'])->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
        return view('companies.show', compact('company'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDetail(Company $company)
    {
        //
        return view('companies.show-detail', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
        $data = $request->validate([
           'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'website' => 'required',
            'slogan' => '',
            'description' => ''

        ]);
        try {
            $company->update($data);
        }catch (\Throwable $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
        return redirect()->back()->with('success', 'Update company successfully');
    }

    public function updateLogo(){
        \request()->validate([
           'logo' => 'image'
        ]);
        try {
            $this->updateFile('logo', 'company');
        }catch (\Throwable $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
        return redirect()->back()->with('success', 'Update logo company successfully');
    }

    public function updateCoverPhoto(){
        \request()->validate([
            'cover_photo' => 'image'
        ]);
        try {
            $this->updateFile('cover_photo', 'company');
        }catch (\Throwable $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
        return redirect()->back()->with('success', 'Update logo company successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
