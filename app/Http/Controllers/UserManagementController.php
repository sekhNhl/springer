<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserManagementController extends Controller
{
    public function index(){
        $details=UserDetail::all();
        return view('index',compact('details'));
    }
    public function save_user_info(Request $request){
        $request->validate([
            'file'=>'required|file|mimes:jpeg,jpg,png',
            'name' => 'required',
            'email'=>'required|email|unique:user_details',
            'experience'=>"required"
            
        ]);
   
            $img_name=$request->file->getClientOriginalName();
            $post=$request->file->move(public_path('images/'),$img_name);
            $data=array('file'=>$img_name,'name'=>$request->name,'email'=>$request->email,'experience'=>$request->experience);
            $check_reslt=UserDetail::create($data);
            if($check_reslt){
                return redirect('user_management')->with('message','Data Inserted Successfully!! Thank You');
            }
        else
        {
            echo "error";
        }
          
        }
        public function add_user(){
            return view('add_user');
        }
        public function delete_entry($id){
            $res=UserDetail::find($id)->delete();
            if($res){
                return back()->with('delete_message','Recorde deleted succcessfully!!');
            }

        }
        public function edit_user_entry($id){
            $edit_res=UserDetail::find($id);
            return view('edit_user_info')->with(['edit_vl'=>$edit_res]);
        }
        public function update_user_info(Request $request,$id){
            $record=UserDetail::find($id);
            $request->validate([
                'name' => 'required',
                'email'=>'required|email',
                'experience'=>"required"
                
            ]);
            if($request->has('file')){
            if($request->file != ''){        
                $path = public_path().'/images/';
      
                //code for remove old file
                if($record->file != ''  &&  $record->file != null){
                     $file_old = $path.$record->file;
                     unlink($file_old);
                }
            }
                    $files=$request->file('file'); 
                $img_name=$files->getClientOriginalName();  
                $files->move('images',$img_name);  
            $edit_res=UserDetail::where('id',$id)->update(['file'=>$img_name,'name'=>$request->name,'email'=>$request->email,'experience'=>$request->experience,]);
            
            if($edit_res){
                return redirect('/user_management')->with('update_message','Recorde Updated Succcessfully!!');
            }
        }
        else{
            $edit_res=UserDetail::where('id',$id)->update(['name'=>$request->name,'email'=>$request->email,'experience'=>$request->experience,]);
            
            if($edit_res){
                return redirect('/user_management')->with('update_message','Recorde Updated Succcessfully!!');
            }
        }
        }
         
}
