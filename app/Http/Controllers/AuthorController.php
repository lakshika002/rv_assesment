<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Carbon\Carbon;
use App\AuthorModel;
use Validator;


//insert author
class AuthorController extends Controller {
    
    public function __construct(  AuthorModel $author_model ) {        
        $this->author_model = new $author_model;         
    }
    
    
    public function createAuthor( Request $request ) {    
        $adata  = array(); 
        $adata["name"] = $request->name; 
        $validator     = $this->validateAuthor($adata);
         
        if( $validator->fails() ) {         
            $err = array();               
            $err["name"] = $validator->messages()->get('name');
            $data = array('status'=>401, 'data'=>array("error"=>$err));
        } else {
            $this->author_model->name = $request->name;
            $resp = $this->author_model->save();
            if($resp) {
                $data = array('status'=>200, 'data'=>array("message"=>"Successfull")); 
            } else {
                $data = array('status'=>401, 'data'=>array("message"=>"Failed")); 
            }            
        }
        return response($data, 200)->header('Content-Type', 'application/json');
    }
    
    
       
    protected function validateAuthor(array $data) {         
        $messages = array();
        return Validator::make($data, [
             "name"  => 'required|max:255',               
          ], $messages );
    }
    
     
    
}