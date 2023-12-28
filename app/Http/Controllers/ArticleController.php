<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleAddRequest;
use App\Models\ArticaleRequest;
use App\Models\Article;
use App\Models\Categore;
use App\Models\Publisher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{

    public function add($id){

        $categores = Categore::get();
        return view('publisher.article_add',['categores'=> $categores,'id'=> $id]);
    }
    public function index($id){
        $articals = DB::table('articles')
            ->select(['articles.id', 'articles.type', 'articles.title', 'categores.name', DB::raw('COUNT(interactions.id) as countt_count')])
            ->where('articles.publisher_id', '=', $id)
            ->join('categores', 'articles.categore_id', '=', 'categores.id')
            ->leftJoin('interactions', 'articles.id', '=', 'interactions.article_id')
            ->groupBy('articles.id')
            ->get();

        return view('publisher.article',['articals'=> $articals ,'id'=> $id]);
    }
    public function delete($id){
        $artical = Article::where('type','=', 3 )->FindOrFail($id);
        ArticaleRequest::create([
            'title' => $artical->title ,
            'img'=> $artical->img ,
            'paragraph_1'=> $artical->paragraph_1 ,
            'paragraph_2'=> $artical->paragraph_2 ,
            'paragraph_3'=> $artical->paragraph_3 ,
            'img_1'=> $artical->img_1 ,
            'img_2'=> $artical->img_2 ,
            'categore_id'=> $artical->categore_id ,
            'publisher_id'=> $artical->publisher_id ,
            'type'=> 6 ,
            'article_id' => $artical->id
        ]);
        $artical->type = 2 ;
        $artical->save();
        return redirect()->route('article',$artical->publisher_id);

    }
    public function show($id){

        $article = Article::FindOrFail($id);
        return view('publisher.article_show',['article'=> $article]);
    }
    public function edit($id){
        $article = Article::where('type','=',3)->FindOrFail($id);
        $categores = Categore::get();
        return view('publisher.article_edit',['article'=> $article , 'categores'=> $categores,'id'=>$id]);
    }
    public function update(Request $request){
        Categore::FindOrFail($request->categore_id);
        $request->validate([
            'title'=>['required','max:50','min:20','string'],
            'img_main'=>['image','mimes:png,jpg','max:2024'],
            'Image_secondary_1'=>['image','mimes:png,jpg','max:2024'],
            'Image_secondary_2'=>['image','mimes:png,jpg','max:2024'],
            'paragraph_1'=>['min:20','string'],
            'paragraph_2'=>['required','min:20','string'],
            'paragraph_3'=>['required','min:20','string'],
            ]);
        $article=Article::FindOrFail($request->id);
        if($request->img_main == null){

            $lam1 = $article->img ;
        }
        else
        {
            $fileName1 = time() . $request->file('img_main')->getClientOriginalName();
            $path1 = $request->file('img_main')->storeAS('images',$fileName1,'public');
            $lam1 ='/storage/'.$path1;
        }
        if($request->Image_secondary_1 == null){

            $lam2 = $article->img_1 ;
        }
        else
        {
            $fileName2 = time() . $request->file('Image_secondary_1')->getClientOriginalName();
            $path2 = $request->file('Image_secondary_1')->storeAS('images',$fileName2,'public');
            $lam2 = '/storage/'.$path2;
        }
        if($request->Image_secondary_2 == null){

            $lam3 = $article->img_2 ;
        }
        else
        {
            $fileName3 = time() . $request->file('Image_secondary_2')->getClientOriginalName();
            $path3 = $request->file('Image_secondary_2')->storeAS('images',$fileName3,'public');
            $lam3 = '/storage/'.$path3;
        }
        ArticaleRequest::create([

            'title' => $request->title ,
            'img' => $lam1 ,
            'paragraph_1' => $request->paragraph_1 ,
            'paragraph_2' => $request->paragraph_2 ,
            'paragraph_3' => $request->paragraph_3 ,
            'img_1' => $lam2 ,
            'img_2' => $lam3 ,
            'type'=> 3 ,
            'categore_id' => $request->categore_id ,
            'publisher_id'=>$article->publisher_id  ,
            'article_id' => $article->id

        ]);
        $article->type = 1 ;
        $article->save();
        return redirect()->route('article');

    }
    public function create(ArticleAddRequest $request){
        Categore::FindOrFail($request->categore_id);
        $request->validate([

        ]);
        $fileName1 = time() . $request->file('img_main')->getClientOriginalName();
        $path1 = $request->file('img_main')->storeAS('images',$fileName1,'public');
        $lam1 ='/storage/'.$path1;
        $fileName2 = time() . $request->file('Image_secondary_1')->getClientOriginalName();
        $path2 = $request->file('Image_secondary_1')->storeAs('images',$fileName2,'public');
        $lam2 ='/storage/'.$path2;
        $fileName3 = time().$request->file('Image_secondary_2')->getClientOriginalName();
        $path3 = $request->file('Image_secondary_2')->storeAs('images',$fileName3,'public');
        $lam3 ='/storage/'.$path3;

        ArticaleRequest::create([

            'title'=>$request->title ,
            'img'=>$lam1 ,
            'paragraph_1'=>$request->paragraph_1 ,
            'paragraph_2'=>$request->paragraph_2 ,
            'paragraph_3'=>$request->paragraph_3 ,
            'img_1'=>$lam2 ,
            'img_2'=>$lam3 ,
            'categore_id'=>$request->categore_id ,
            'type' => 0  ,
            'publisher_id'=>$request->publisher_id  ,
        ]);
        return redirect()->route('article',$request->publisher_id);
    }
    public function request($id){
        $articals = ArticaleRequest:: where('articale_requests.publisher_id', '=' ,$id)
        ->whereNotIn('articale_requests.type',[ 3 ,6])->join('categores','categores.id','=','articale_requests.categore_id')
        ->select('articale_requests.*','categores.name')->get();
        return view('publisher.requset',['articals'=>$articals ,'id'=>$id]);
    }
    public function request_delete($id){
        ArticaleRequest::FindOrFail($id)->delete();
        // $id2 =/
        // $articals = ArticaleRequest::FindOrFail($id)->delete();
        return redirect()->back();
    }
}
