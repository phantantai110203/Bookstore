<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($prod)
    {
        $comment = request()->all('comment');
        $comment['book_id']=$prod;
        $comment['user_id']= auth()->id();


        if (Comment::create($comment)) {
            return redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        // Lấy dữ liệu mới từ request
        $newContent = $request->input('comment');

        // Tìm comment cần sửa
        $comment = Comment::findOrFail($id);

        // Cập nhật nội dung của comment
        $comment->comment = $newContent;
        $comment->save();

        // Phản hồi thành công hoặc chuyển hướng đến trang khác
        return redirect()->back()->with('success', 'Sửa comment thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         // Tìm comment cần xóa
         $comment = Comment::findOrFail($id);

         // Xóa comment
         $comment->delete();

         // Phản hồi thành công hoặc chuyển hướng đến trang khác
         return redirect()->back()->with('success', 'Xóa comment thành công');
    }
}
