<?php

namespace App\Http\Controllers;

use App\Http\Traits\UploadFileTrait;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashBoardController extends Controller
{
    //
    use UploadFileTrait;

    public function __construct()
    {
        $this->middleware(['auth', 'check-admin']);
    }

    public function index()
    {
        $posts = Post::query()->latest()->paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store()
    {
        $data = \request()->validate([
            'title' => 'required',
            'content' => 'min:10|required',
            'image' => 'required|image',
            'status' => 'required'
        ]);
        try {
        $data['slug'] = Str::slug($data['title']);
            $data = Arr::except($data, ['image']);
            $user = auth()->user();
            $post = $user->posts()->create($data);
            $this->updateFile('image', 'post', $user, $post);
            return redirect()->route('dashboard')->with('success', 'Create post successfully');
        } catch (\Throwable $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $data = \request()->validate([
            'title' => 'required',
            'content' => 'min:10|required',
            'status' => 'required',
            'image' => 'image'
        ]);
        try {
            $data['slug'] = Str::slug($data['title']);
            $data = Arr::except($data, ['image']);
            $post->update($data);
            if (\request()->has('image')) {
                $this->updateFile('image', 'post', null, $post);
            }
            return redirect()->route('dashboard')->with('success', 'Update post successfully');
        } catch (\Throwable $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('dashboard')->with('success', 'Delete post successfully');
    }

    public function getTrashPost()
    {
        $trashPosts = Post::onlyTrashed()->paginate(10);
        return view('admin.post.trash', compact('trashPosts'));
    }

    public function forceDeletePost($post)
    {
        $post = Post::onlyTrashed()->where('slug', $post)->first();
        $post->forceDelete();
        if(Storage::exists($post->image)) {
            Storage::delete($post->image);
        }
        return redirect()->back()->with('success', 'Delete post permanent successfully');
    }

    public function restorePost($post)
    {
        $post = Post::onlyTrashed()->where('slug', $post)->first();
        $post->restore();
        return redirect()->back()->with('success', 'Restore post successfully');
    }

    public function toggleStatus(Post $post)
    {
        $post->status = !$post->status;
        $post->save();
        return redirect()->back()->with('success', 'Toggle post successfully');
    }
}
