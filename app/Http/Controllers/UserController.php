<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categore;
use App\Models\Interaction;
use App\Models\Publisher;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){

        return view('login');
    }
    public function rejecter(){

        return view('rejecter');
    }
    public function index(){
        $users = User::get();
        return view('admin.user',compact('users'));
    }
    public function delete($id){
        $users = User::FindOrFail($id)->delete();
        return redirect()->route('users');
    }
    public function credit($id){
        $user = User::FindOrFail($id);
        $user->type = 2 ;
        $user->save();
        return redirect()->route('users');
    }
    public function check_email(Request $request){
        $request->validate([
            'email'=>['required','email','max:50','min:10'],
            'password'=>['required','string','min:8','max:25'],
            'type_user'=>['required' ,'in:1,2'],
        ]);
        if($request->type_user == 1){
        $user = User::where('email',$request->email)->first();

        if($user){
            if($user->type == 0){
                echo "<script>alert('هذا الحساب لم يتم تأكد من الحساب بعد ')</script>";
                return view('login');
            }
            elseif($user->type == 2){
                if($user->password == $request->password){

                    return redirect()->route('home',$user->id);
                }
                else{
                    echo "<script>alert('كلمة المرور خطأ الرجاء أعادة المحاولة')</script>";
                    return view('login');
                }
            }
        }
        else{
            echo "<script>alert('هذا الأيميل غير موجود الرجاء تاكد من المعلومات المدخلة .....')</script>";
            return view('login');
        }
    }
    elseif($request->type_user == 2) {
            $user = Publisher::where('email',$request->email)->first();
        if($user){
            if($user->type == 1){
                if($user->password == $request->password){
                    echo "<script>alert('تم عملية تسجل الدخول')</script>";
                    return redirect()->route('article',$user->id);
                }
                else{
                    echo "<script>alert('كلمة المرور خطأ الرجاء أعادة المحاولة')</script>";
                    return view('login');
                }
            }
            elseif($user->type == 3){
                if($user->password == $request->password){
                    echo "<script>alert('تم عملية تسجل الدخول')</script>";
                    return view('admin.control');
                }
                else{
                    echo "<script>alert('كلمة المرور خطأ الرجاء أعادة المحاولة')</script>";
                    return redirect()->route('login');
                }
            }
        }
        elseif(empty($user)){
            echo "<script>alert('هذا الأيميل غير موجود الرجاء تاكد من المعلومات المدخلة ')</script>";
            return redirect()->route('admin_control');
        }
    }
}
    public function create(Request $request){

        $request->validate([
            'name'=>['required','string','min:3','max:25'],
            'email'=>['required','email','unique:users','max:50','min:10'],
            'password'=>['required','string','min:8','max:25']
        ]);
        User::create
        ([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=>$request->password,
        ]);
        return redirect()->route('login');
    }

    public function home($id){

        $articals = DB::table('articles')
            ->select(['articles.id', 'articles.title','articles.img','articles.created_at', 'publishers.name as publishers_name', 'categores.name', DB::raw('COUNT(interactions.id) as countt_count')])
            ->where('articles.type', '=', 3)
            ->join('categores', 'articles.categore_id', '=', 'categores.id')
            ->join('publishers', 'articles.publisher_id', '=', 'publishers.id')
            ->leftJoin('interactions','articles.id', '=', 'interactions.article_id')
            ->groupBy('articles.id')
            ->get();
        $flows = Interaction::where('user_id', '=', $id)->get();
        $categores = Categore::get();
        return view('home',['articals'=> $articals ,'flows'=> $flows,'categores'=> $categores ,'id'=> $id]);
    }
    public function categoress($id ,$categore_id){

        $articals = DB::table('articles')
            ->select(['articles.id', 'articles.title','articles.img','articles.created_at', 'publishers.name as publishers_name','categores.id', 'categores.name', DB::raw('COUNT(interactions.id) as countt_count')])
            ->where('articles.type', '=', 3)
            ->join('categores', 'articles.categore_id', '=', 'categores.id')->where('categores.id','=',$categore_id)
            ->join('publishers', 'articles.publisher_id', '=', 'publishers.id')
            ->leftJoin('interactions','articles.id', '=', 'interactions.article_id')
            ->groupBy('articles.id')
            ->get();
        $flows = Interaction::where('user_id', '=', $id)->get();
        $categores = Categore::get();
        return view('home_categore',['articals'=> $articals ,'flows'=> $flows,'categores'=> $categores ,'id'=> $id]);
    }
    public function unflow($id ,$id_artical){

        Interaction::where('user_id', '=', $id)->where('article_id','=',$id_artical)->delete();
        return redirect()->back();
    }
    public function create_flow($id ,$id_artical){
        Interaction::create([
            'article_id'=> $id_artical,
            'user_id'=> $id,
            'flow'=> 1,
        ]);
        return redirect()->back();
    }
    public function artical_show($id,$id_artical){
        $article = Article::FindOrFail($id_artical);
        return view('article_show',['article'=>$article,'id'=>$id]);
    }

}

