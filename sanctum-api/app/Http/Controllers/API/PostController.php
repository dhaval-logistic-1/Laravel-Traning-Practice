<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['posts'] = Post::all();

        // return response()->json([
        //     'status' => true,
        //     'message' => ' All Posts data',
        //     'data' => $data,
        // ], 200);

        return $this->sendResponse($data, 'All Posts data');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateUser = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);

        if ($validateUser->fails()) {
            // return response()->json([
            //     'status' => false,
            //     'message' => 'validation error',
            //     'errors' => $validateUser->errors()
            // ], 401);

            return $this->sendError('validation error', $validateUser->errors());
        }


        $img = $request->image;
        $img_name = time() . '.' . $img->getClientOriginalExtension();
        $img->move(public_path('images'), '/uploads' . $img_name);


        $post = Post::create([

            'title' => $request->title,
            'description' => $request->description,
            'image' => $img_name,
        ]);

        // return response()->json([
        //     'status' => true,
        //     'message' => 'Post created successfully',
        //     'post' => $post,
        // ], 200);
        return $this->sendResponse($post, 'Post created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['post'] = Post::select('id', 'title', 'description', 'image')
            ->where('id', $id)
            ->get();

        // return response()->json([
        //     'status' => true,
        //     'message' => 'your single Post data',
        //     'data' => $data,
        // ], 200);
        return $this->sendResponse($data, 'your single Post data');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateUser = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
        ]);

        if ($validateUser->fails()) {
            // return response()->json([
            //     'status' => false,
            //     'message' => 'validation error',
            //     'errors' => $validateUser->errors()
            // ], 401);
            return $this->sendError('validation error', $validateUser->errors());
        }

        $postimage = Post::where('id', $id)->first();

        if ($request->image != ' ') {

            $path = public_path() . 'images/uploads';

            if ($postimage->image != ' ' && $postimage->image != null) {

                $old_file = $path . $postimage->image;

                if (file_exists($old_file)) {

                    unlink($old_file);
                }
            }

            $img = $request->image;
            $img_name = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('images'), '/uploads' . $img_name);
        } else {
            $img_name = $postimage->image;
        }




        $post = Post::where('id', $id)->update([

            'title' => $request->title,
            'description' => $request->description,
            'image' => $img_name,
        ]);

        // return response()->json([
        //     'status' => true,
        //     'message' => 'Post updated successfully',
        //     'post' => $post,
        // ], 200);

        return $this->sendResponse($post, 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::where('id', $id)->first();

        if ($post->image != ' ' && $post->image != null) {

            $path = public_path() . 'images/uploads';

            $old_file = $path . $post->image;

            if (file_exists($old_file)) {

                unlink($old_file);
            }
        }

        Post::where('id', $id)->delete();

        // return response()->json([
        //     'status' => true,
        //     'message' => 'Post deleted successfully',
        // ], 200);

        return $this->sendResponse($post, 'Post deleted successfully');
    }
}
