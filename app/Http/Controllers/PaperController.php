<?php
namespace App\Http\Controllers;
use App\Paper;
use App\User;
use Auth;
use Illuminate\Http\Request;

class PaperController extends Controller
{       
    public function getAllUsers(){
        return User::all();
        }
        public function getAllPapers(){
            return Paper::all();
            }
        public function getPapersByColumnAndId($coulmnName,$id){
            return Paper::where($coulmnName,$id)->get();
        }
        public function getAuthUser(){
           return Auth::user();
        }
        public function getAuthId(){
            return Auth::id();
        }
        public function getUserById($id){
            return User::find($id);
        }
        public function getPaperByID($id){
            return paper::find($id);
        }
//.................................***......................................//
    public function index()
    {
        $user = $this->getAuthUser();
        $papers =$this->getAllPapers();       
        return view('paper.index')->with('papers',$papers)->with('user',$user);
    }

//.................................***......................................//
    public function create()
    {
        $users = $this->getAllUsers();
        return view('paper.create')->with('users',$users);
    }

//.................................***......................................//
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category'=>'required',
            'description'=>'required',
            'file' =>'required|mimes:pdf,xlx,csv',
            'users' => 'required'
        ]);
         $file = $request->file;
         $newpaper = time().$file->getClientOriginalName();
         $file->move('uploads',$newpaper);
         $paper = Paper::create([
            'user_id' =>  $this->getAuthId(),
            'title' =>  $request->title,
            'category' =>   $request->category,
            'description' =>   $request->description,
            'likeNumber'=> 0,
            'dislikeNumber'=> 0,
            'file' =>  'uploads/'.$newpaper,
        ]);
        $paper->user()->attach($request->users);
        return redirect()->route('paper');
    }

//.................................***......................................//
    public function edit($id)
    {
        $users = $this->getAllUsers();
        $paper = $this->getPapersByColumnAndId('id' , $id )->where('user_id',$this->getAuthId())->first(); 
        //paper::where('id' , $id )->where('user_id', Auth::id())->first();  
        return view('paper.edit')->with('paper',$paper)
        ->with('users',$users);
    }

//.................................***......................................//
    public function update(Request $request, $id)
    {
        $paper = $this->getPaperByID($id);
        $request->validate([
            'title' => 'required',
            'category'=>'required',
            'description'=>'required',
            'file' =>'required|mimes:pdf,xlx,csv',
            'users' => 'required'
        ]);
        $paper->update($request->all());
        return redirect()->route('paper');
        $paper->user()->attach($request->users);
    }
//.................................***......................................//
    public function destroy($id)
    {
        $paper = $this->getPapersByColumnAndId('id' , $id )->where('user_id',$this->getAuthId())->first();
        //Paper::where('id' , $id )->where('user_id', Auth::id())->first();
        $paper->delete($id);
        return redirect()->back();
    }
}
