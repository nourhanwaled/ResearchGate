<?php
namespace App\Http\Controllers;
use App\Profile;
use App\Paper;
use App\User;
use Illuminate\Http\Request;
use Auth;
class ProfileController extends Controller
{    
    public function getAllUsers(){
    return User::all();
    }
    public function getPapersById($coulmnName,$id){
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
//.................................***......................................//
    public function index()
    {
         $users = $this->getAllUsers();
         $papers = $this->getPapersById('user_id',Auth::id());
         $user = $this->getAuthUser();
         $id= $this->getAuthId();
        if($user->profile == null){
            $profile = Profile::create([
            'user_id'=>$id,
            'country' => 'Egypt',
            'university' => 'Helwan University',
            'department' => 'Information System',
            'facebook' => 'https://www.facebook.com',
            'photo'=>'/images/signin-image.jpg',
            'info'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
            Lorem Ipsum has been the industrys standard dummy text ever since the 1500s,
            when an unknown printer took a galley of type and scrambled it to make a type specimen
            book. It has survived not only five centuries.'
            ]);
        }
        return view('profile.index')->with('user',$user)->with('papers',$papers)->with('users',$users);
    }
//.................................***......................................//
    public function show($id)
    {
        $user = $this->getUserById($id);
        $papers = $this->getPapersById('user_id',$id); 
        return view('profile.show')->with('papers',$papers)->with('user',$user);
    }
    public function edit()
    {
        $user=$this->getAuthUser();
        return view('profile.edit')->with('user',$user);
    }
//.................................***......................................//
    public function update(Request $request)
    {
        $request->validate([
            'country' => 'required',
            'university' => 'required',
            'department' => 'required',
            'facebook' => 'required',
            'photo' =>  'required|image',
            'info'=>'required'
        ]);
        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('images',$newPhoto);
        $user = $this->getAuthUser();
        $user->profile->country = $request->country ;
        $user->profile->university = $request->university ;
        $user->profile->department = $request->department ;
        $user->profile->photo =  'images/'.$newPhoto;
        $user->profile->info = $request->info ;
        $user->save();
        $user->profile->save();
        return redirect()->route('profile.index');
    }
}
