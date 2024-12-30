<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentImages;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends Controller
{
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
        $comment = new Comment;
        $comment->project_task_id = $request->project_task_id;
        $comment->comment = $request->comment;
        $comment->user_id = auth()->user()->id;
        $comment->save();

        if ($request->has('image_comment'))
        {
            $files = $request->file('image_comment');
            foreach($files as $file)
            {
                $name = time().'-'.$file->getClientOriginalName();
                $file->move(public_path('comment_attachments'),$name);
                $file_name = '/comment_attachments/'.$name;
    
                $comment_attachment = new CommentImages;
                $comment_attachment->comment_id = $comment->id;
                $comment_attachment->file = $file_name;
                $comment_attachment->save();
            }
        }

        Alert::success('Successfully Commented')->persistent('Dismiss');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        $comment_images = CommentImages::where('comment_id',$id)->get();
        if($comment_images)
        {
            foreach($comment_images as $comment_image)
            {
                $comment_image->delete();
            }
        }

        Alert::success('Successfully Deleted')->persistent('Dismiss');
        return back();
    }
}
