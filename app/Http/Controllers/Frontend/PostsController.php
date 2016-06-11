<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Post\Request as PostRequest;

use App\Post as Post;
use Carbon\Carbon;
use League\Csv\Writer;

/**
 * Class PostsController
 * @package App\Http\Controllers
 */
class PostsController extends Controller
{
    public static $postsPath = '/posts/';

    /**
     * @return \Illuminate\View\View
     */
    public function store(PostRequest $request, $id = null)
    {
        if($request->title) {
            $data = ['title' => $request->title];
        }

        if($request->file('image')) {
            $current_time = Carbon::now()->toDayDateTimeString();
            $newFilename = base64_encode($current_time).'.'.$request->file('image')->getClientOriginalExtension();
            $data['image'] = self::$postsPath.$newFilename;

            if($request->file('image')->move(public_path().self::$postsPath, $newFilename)) {
                if(isset($data)){
                    if(empty($id)){
                        $post = Post::create($data); 
                    }
                    else {
                        $post = Post::find($id);
                        $post->fill($data);
                        $post->save();
                    }
                }
            }
        }

        return redirect()->to('/');
    }

    public function export(){
        $posts = Post::all();
        if(!empty($posts)) {
            $filename = "posts_export_" . date("Y-m-d_His") . ".csv";
            $csv = Writer::createFromFileObject(new \SplTempFileObject());
            $headers = ['id','title','image name','created at','modified at'];
            $csv->insertOne($headers);
            
            foreach ($posts as $post) {
                $csv->insertOne($post->toArray());
            }

            $csv->output($filename);
            die;
        }
    }
}
