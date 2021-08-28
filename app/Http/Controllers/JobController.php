<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isInstanceOf;

class JobController extends Controller
{

    public function __construct()
    {
        $this->middleware([ 'auth', 'verified', 'check-permission:employer'])->except('show', 'getAllJob');
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

    public function getAllJob()
    {
        $jobQuery = Job::query();
        if ($keyword = \request()->keyword) {
            $jobQuery->where('title', 'like', "%$keyword%")
                    ->orWhere('description', 'like', "%$keyword%")
                    ->orWhere('position', 'like', "%$keyword%");
        }

        if ($address = \request()->address) {
            $jobQuery->where('address','like', "%$address%");
        }

        if ($type = \request()->type) {
            if ($type !== 'all') {
                $jobQuery->where('type', $type);
            }
        }

        if ($categoryId = \request()->category_id) {
            if ($type !== 'all') {
                $jobQuery->where('category_id', $categoryId);
            }
        }
        $jobs = $jobQuery->latest()->paginate(10);
        $categories = Category::all();
        return view('jobs.all-job', compact('jobs', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jobs.create')->withCategories(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateJobRequest $request)
    {
        //
        try {
            $data = $request->validationData();
            $data['slug'] = Str::slug($data['title']);
            $user =  auth()->user();
            $user->jobs()->create(array_merge($data, ['company_id' => $user->company->id]));
        }catch (\Throwable $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
        return redirect()->back()->with('success', 'Create job successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
        $isSave = $job->isSaveByUserAlready();
        return view('jobs.show', compact('job', 'isSave'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
        $categories = Category::all();
        return view('jobs.edit', compact('categories', 'job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
        try {
            $data = $request->validationData();
            $data['slug'] = Str::slug($data['title']);
            $job->update($data);
        }catch (\Throwable $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
        return redirect()->route('jobs.my-job')->with('success', 'Update job successfully');


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

    public function getMyJob(){
        return view('jobs.my-job')->with('jobs', auth()->user()->jobs);
    }


}
