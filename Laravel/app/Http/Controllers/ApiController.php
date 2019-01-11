<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Game;
Use File;
use Illuminate\Support\Facades\Auth;
use Validator;


class ApiController extends Controller
{


    public $successStatus = 200;


    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */


     public function login(Request $request){

       if(['email' => request('email'), 'password' => request('password')]){

         //dd($request->all());

         $username=request('email');
         $password=request('password');
         $user = User::where('email' , $username)->where( 'password' , $password)->first();
         $success['token'] =  $user->createToken('MyApp')->accessToken;
         return response()->json(['success' => $success], $this->successStatus);

       }
       else{
         return response()->json(['error'=>'Unauthorised'], 401);
       }

    }

    public function search(Request $request){
      if (['filter' => request('filter'), 'argument' => request('argument')]){


        $filter = request('filter');
        $arg = request('argument');

        if ($filter == 'title') {

          $games = Game::where('title', 'LIKE', '%'.$arg.'%')->where('status', 'Visible')->get()->toArray(); //->paginate(20);
          return response()->json($games);

        }

        if ($filter == 'tag'){
          $games = Game::whereHas('tags', function ($q) {
            $arg = request('argument');
            $q->where('name', 'like', $arg)->where('status', 'Visible');
            })->get()->toArray();

          return response()->json($games);


        }
      }
      else{
        return response()->json(['error'=>'Not valid arguments'], 401);
      }
    }

    public function catalogue(){


      $games = Game::all()->where('status', 'Visible')->toArray();

      return response()->json($games);
      /*
        '1' => 'hello',
        '2' => 'my image',
        '3' => base64_encode(File::get('/path/to/image.jpg'
      )); */



    }


    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        dd($request->all());

        /*
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'last_name' => 'required',
            'description' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
            'hidden' => 'required',
            'c_password' => 'required|same:password',
        ]);


        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }


        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;


        return response()->json(['success'=>$success], $this->successStatus);

        */

    }


    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}
