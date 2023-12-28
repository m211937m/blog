<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticaleRequest;
use App\Models\Categore;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Article_adminController extends Controller
{
    public function index(){
        $articals = DB::table('articles')
            ->select(['articles.id', 'articles.title', 'publishers.name as publishers_name', 'categores.name', DB::raw('COUNT(interactions.id) as countt_count')])
            ->where('articles.type', '=', 3)
            ->join('categores', 'articles.categore_id', '=', 'categores.id')
            ->join('publishers', 'articles.publisher_id', '=', 'publishers.id')
            ->leftJoin('interactions', 'articles.id', '=', 'interactions.article_id')
            ->groupBy('articles.id')
            ->get();

        return view('admin.article',['articals'=> $articals ]);
    }

    public function control(){
        return view('admin.control');
    }

    //المقالات المقيدة
    public function show_restrict(){

        $articals = Article::where('articles.type', '=', 4)->join('categores','articles.categore_id','=','categores.id')
        ->join('publishers','articles.publisher_id','=','publishers.id')
        ->select(['articles.id','articles.title','publishers.name as publishers_name','categores.name'])->get();
        return view('admin.articl_restical',compact('articals'));
    }
    public function restrict($id){
        $article = Article::FindOrFail($id);
        $article->type = 4 ;
        $article->save();
        return redirect()->route('admin_article');
    }
    public function Lifting_a_restriction($id){
        $article = Article::FindOrFail($id);
        $article->type = 3 ;
        $article->save();
        return redirect()->route('admin_show_restrict');
    }

    //عرض طلبات المقالة

    public function show_request_artical(){

        $articals = ArticaleRequest::whereIn('articale_requests.type' ,[0 , 3 , 6]  )->join('categores','categores.id','=','articale_requests.categore_id')
        ->join('publishers','publishers.id','=','articale_requests.publisher_id')
        ->select('articale_requests.id','articale_requests.title','articale_requests.type','publishers.name as publisher_name','categores.name')->get();
        return view('admin.request_artical',compact('articals'));
    }
    public function show_artical($id){

        $article = ArticaleRequest::FindOrFail($id);
        return view('admin.article_show');

    }
    //الموافقة على أضافة مقالة
    public function approve_on_artical($id){

        $artical = ArticaleRequest::FindOrFail($id);

        $array = $artical->toArray();
        $array['type'] = 3;

        Article::create($array);

        $artical->type = 1;
        $artical->refuse_reason = "تمت الموافقة على أضافة المقالة ";
        $artical->save();

        return redirect()->route('show_request');
    }
    //رفض أضافة مقالة جديد
    public function reject_artical($id){
        // echo $id;
        $artical = ArticaleRequest::FindOrFail($id);
        $path = storage_path($artical->img);
        if(file_exists($path)){
            unlink($path);
        }
        $path1 = storage_path($artical->img_1);
        if(file_exists($path1)){
            unlink($path1);
        }
        $path2 = storage_path($artical->img_2);
        if(file_exists($path2)){
            unlink($path2);
        }
        $artical->type = 2;
        $artical->refuse_reason = "تم  رفض انشاء مقالة " ;
        $artical->save();
        return redirect()->route('show_request');
    }
    //الموافقة على عملية الحذف
    public function approve_deletion($id){

        $artical = ArticaleRequest::FindOrFail($id);
        Article::where('id', $artical->article_id)->delete();
        $path = storage_path($artical->img);
        if(file_exists($path)){
            unlink($path);
        }
        $path1 = storage_path($artical->img_1);
        if(file_exists($path1)){
            unlink($path1);
        }
        $path2 = storage_path($artical->img_2);
        if(file_exists($path2)){
            unlink($path2);
        }

        $artical->type = 7;
        $artical->refuse_reason = "تمت الموافقة على عملية الحذف" ;
        $artical->save();
        return redirect()->route('show_request');
    }
    //رفض  عملية الحذف
    public function refusal_to_delete($id){

        $artical = ArticaleRequest::FindOrFail($id);
        $artical1 = Article::where('id' , $artical->article_id)->first();
        $artical1->type = 3 ;
        $artical1->save() ;
        $artical->type = 8;
        $artical->refuse_reason = "تم رفض عملية الحذف" ;
        $artical->save();
        return redirect()->route('show_request');
    }
    //الموافقة على عملية التعديل
    public function approval_of_an_amendment($id){

        $artical = ArticaleRequest::FindOrFail($id);
        $artical1 = Article::where('id' ,$artical->article_id)->first();
        if($artical1->img != $artical->img){
            $path = storage_path($artical->img);
            if(file_exists($path)){
                unlink($path);
            }
        }
        if($artical1->img_1 != $artical->img_1){
            $path = storage_path($artical->img_1);
            if(file_exists($path)){
                unlink($path);
            }
        }
        if($artical1->img_2 != $artical->img_2){
            $path = storage_path($artical->img_2);
            if(file_exists($path)){
                unlink($path);
            }
        }
        $artical1->title = $artical->title ;
        $artical1->img = $artical->img ;
        $artical1->paragraph_1 = $artical->paragraph_1 ;
        $artical1->paragraph_2 = $artical->paragraph_2 ;
        $artical1->paragraph_3 = $artical->paragraph_3 ;
        $artical1->img_1= $artical->img_1 ;
        $artical1->img_2= $artical->img_2 ;
        $artical1->categore_id= $artical->categore_id ;
        $artical1->type = 3 ;
        $artical1->publisher_id = $artical->publisher_id ;
        $artical1->save();
        $artical->refuse_reason ="تمت الموافقة على عملية تعديل ";
        $artical->type = 4 ;
        $artical->save();
        return redirect()->route('show_request');
    }
    //رفض عملية تعديل
    public function Refusal_Amendment($id){

        $artical = ArticaleRequest::FindOrFail($id);
        $artical1 = Article::where('id' ,$artical->article_id)->first();
        if($artical1->img != $artical->img){
            $path = storage_path($artical->img);
            if(file_exists($path)){
                unlink($path);
            }
        }
        if($artical1->img_1 != $artical->img_1){
            $path = storage_path($artical->img_1);
            if(file_exists($path)){
                unlink($path);
            }
        }
        if($artical1->img_2 != $artical->img_2){
            $path = storage_path($artical->img_2);
            if(file_exists($path)){
                unlink($path);
            }
        }
        $artical->refuse_reason = "تم رفض عملية تعديل ";
        $artical->type = 5;
        $artical->save();
        $artical1->type = 3;
        $artical->save();
        return redirect()->route('show_request');
        }
        public function article_show($id){

        $article = Article::FindOrFail($id);
        return view('admin.article_show',['article' => $article]);
        }
        public function article_delete($id){

        $article = Article::FindOrFail($id)->delete();
        return redirect()->back();
        }
}
