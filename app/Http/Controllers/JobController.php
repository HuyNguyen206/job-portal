<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\SendJobToFriendRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Http\Resources\JobSearchResource;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use App\Notifications\SendJobToFriendNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isInstanceOf;

class JobController extends Controller
{

    public function __construct()
    {
        $this->middleware([ 'auth', 'verified', 'check-permission:employer'])->except('show', 'getAllJob', 'searchJob', 'sendToFriend');
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

    public function searchJob()
    {
        try {
            $keyword = \request()->keyword;
            $jobs = collect([]);
            if ($keyword) {
                $jobs = Job::query()->where('title', 'like',  "%$keyword%")->get();
            }
        }catch (\Throwable $ex) {
         return  response()->error($ex->getMessage());
        }
        return response()->success(['jobs' => JobSearchResource::collection($jobs)]);
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
//        $jobBaseOnCategory = Job::query()->where('category_id', $job->category_id)
//            ->whereDate('last_date', '>', date('Y-m-d'))
//            ->where('status', 1)
//            ->take(2)
//            ->get();
        $jobBaseOnCategory = Category::query()->find($job->category_id)->jobs()
            ->whereDate('last_date', '>', date('Y-m-d'))
            ->where('id', '<>', $job->id)
            ->where('status', 1)
            ->take(2)
            ->get();

//        $jobBaseOnCompany = Job::query()->where('company_id', $job->company_id)
//            ->whereDate('last_date', '>', date('Y-m-d'))
//            ->where('status', 1)
//            ->take(2)
//            ->get();

        $jobBaseOnCompany = Company::query()->find($job->company_id)->jobs()
            ->whereDate('last_date', '>', date('Y-m-d'))
            ->where('id', '<>', $job->id)
            ->where('status', 1)
            ->take(2)
            ->get();

        $jobBaseOnPosition = Job::query()->where('position', "like", "%$job->position%")
            ->whereDate('last_date', '>', date('Y-m-d'))
            ->where('id', '<>', $job->id)
            ->where('status', 1)
            ->take(2)
            ->get();
        $jobsRecommend = $jobBaseOnCategory->merge($jobBaseOnCompany)->merge($jobBaseOnPosition)->unique('id');
        return view('jobs.show', compact('job', 'isSave', 'jobsRecommend'));
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

    public function sendToFriend(SendJobToFriendRequest $request)
    {
        try {
            $data = $request->validationData();
            $sender = auth()->user() ?? (new User())->fill(['name' => $data['name'], 'email' => $data['email']]);
            $job = Job::query()->findOrFail($request->jobId);
            $jobUrl = route('jobs.show', $job->slug);
            Notification::route('mail', $request->emailPerson)->notify(new SendJobToFriendNotification($sender, $jobUrl, $job->position, $request->namePerson));
            return response()->success([], 'Sent job successfully');
        }catch (\Throwable $ex) {
            return response()->error($ex->getMessage());
        }
    }


}
