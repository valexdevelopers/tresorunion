<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\UserPassbook;

class UserController extends Controller
{
    //

    public function index(){
        $users = User::with('passbooks')->paginate(20);
        $debit = [];
        $credits = [];
        $totalCredit = 0;
        $totalDedit = 0;
        foreach($users as $user ){
            foreach($user->passbooks as $passbook){
                if($passbook->trans_type == 'credit'){
                    $totalCredit+= $passbook->amount;
                }elseif($passbook->trans_type == 'dedit'){
                    $totalCredit+= $passbook->amount;
                }
            }
            
            $credits[$user->id] = $totalCredit ;
            $debit[$user->id] = $totalDedit;
        }
        return view('admin.all')->with('users', $users)
                                ->with('credits', $credits)
                                ->with('debits', $debit);
    }

    public function create(){
        return view('admin.register');
    }

    public function store(Request $request){
        $request->validate([
            'firstname' => ['bail', 'required', 'string'],
            'lastname' => ['bail', 'required', 'string'],
            'gender' => ['bail', 'required', 'string'],
            'dob' => ['bail', 'required', 'date'],
            'email' => ['bail', 'required', 'string', 'email', 'unique:'.User::class],
            'phone' => ['bail', 'required', 'string'],
            'country' => ['bail', 'required', 'string'],
            'state' => ['bail', 'required', 'string'],
            'address' => ['bail', 'required', 'string'],
            'accountnumber' => ['bail', 'required', 'numeric'],
            'pin' => ['bail', 'required', 'numeric'],
            'password' => ['bail', 'required', 'string', 'confirmed', Password::min(8)->symbols()->numbers()->mixedCase()],
            'status' => ['bail', 'required', 'string'],
            'question' => ['bail', 'required', 'string'],
            'answer' => ['bail', 'required', 'string'],
        ]);



        $user = User::create([
            'firstname' => strtolower($request->firstname),
            'lastname' => strtolower($request->lastname),
            'gender' => strtolower($request->gender),
            'dob' => strtolower($request->dob),
            'email' => strtolower($request->email),
            'phone' => strtolower($request->phone),
            'country' => strtolower($request->country),
            'state' => strtolower($request->state),
            'address' => strtolower($request->address),
            'accountnumber' => $request->accountnumber,
            'pin' => $request->pin,
            'password' => Hash::make($request->password),
            'status' => strtolower($request->status),
            'question' => strtolower($request->question),
            'answer' => $request->answer,
        ]);

        return back()->with('message', 'User account created, add transactions to the created account')->with('message-color', 'alert-success');
    }


    public function freeze(String $id){
        $user = User::find($id);
        $user->status = 'freeze';
        $user->save();
        return back()->with('message', 'you froze a user account')->with('message-color', 'alert-success');
    }

    public function activate(String $id){
        $user = User::find($id);
        $user->status = 'active';
        $user->save();
        return back()->with('message', 'you activated a user account')->with('message-color', 'alert-success');
    }

    public function destroy(String $id){
        $user = User::find($id);
        $user->delete();
        return back()->with('message', 'you deleted a user account')->with('message-color', 'alert-success');
    }


    public function passport(String $id){
        $user = User::find($id);
        return view('admin.passport')->with('user', $user);
    }

    public function updatepassport(Request $request){

        $request->validate([

            'user_id' => ['bail', 'required', 'string' ],
            'passport' => ['bail', 'required', 'file', 'image'],
        ]);

        $user = User::find($request->user_id);

        // save user iamge
        if($request->file('passport')->isValid()){
            $imagename = $request->user_id.time().'.'.$request->file('passport')->extension();
            $userFullname = $user->firstname.'_'.$user->lastname;
            $userPassport = $request->file('passport')->storeAS('users/passport/'.$userFullname, $imagename, 'public');    
            
            // persist user passport by updating
            $user->passport = $userPassport;
            $user->save();
            return back()->with('message', 'you updated an account passport')->with('message-color', 'alert-success');
        }else{
            return back()->with('message', 'invalid passport image')->with('message-color', 'alert-danger');
        }
        
        
    }

    public function transaction(String $id){
        $user = User::find($id);
        return view('admin.transactions')->with('user', $user);
    }

    public function updatetransaction(Request $request){

        $request->validate([

            'date' => ['bail', 'required', 'date' ],
            'user_id' => ['bail', 'required', 'string' ],
            'trans_type' => ['bail', 'required', 'string'],
            'amount' => ['bail', 'required', 'numeric', 'min:50' ],
            'description' => ['bail', 'required', 'string'],
        ]);

        $user = User::find($request->user_id);
    
        $userbalance =  UserPassbook::where('user_id', $request->user_id)->sum('amount');
        if($request->trans_type == 'debit' && $request->amount >= $userbalance){
            return back()->with('message', 'insufficient balance to debit this amount')->with('message-color', 'alert-danger');
        }else{
            $newtransaction = UserPassbook::create([
                'user_id' => $request->user_id,
                'trans_id' => bin2hex(random_bytes(10)),
                'trans_date' => $request->date,
                'reference' => bin2hex(random_bytes(4)),
                'description' => $request->description,
                'trans_type' => $request->trans_type,
                'amount' => $request->amount,
                'status' => 'completed',
            ]);
            return back()->with('message', 'you added a new transaction')->with('message-color', 'alert-success');
        }
        
        
    }


    public function password(String $id){
        $user = User::find($id);
        return view('admin.userpassword')->with('user', $user);
    }

    public function updatepassword(Request $request){
    
        $request->validate([
            'user_id' => ['bail', 'required', 'string'],
            'password' => ['bail', 'required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);

        $user = User::find($request->user_id);
        $user->password =  Hash::make($request->password);
        $user->save();
        return redirect()->route('admin.password.create')->with('message', 'You updated an account password')->with('message-color', 'alert-success');
    
   }


   public function securityquestion(String $id){
    $user = User::find($id);
    return view('admin.securityquestion')->with('user', $user);
    }

    public function updatesecurityquestion(Request $request){

        $request->validate([
            'user_id' => ['bail', 'required', 'string'],
            'question' => ['bail', 'required', 'string'],
            'answer' => ['bail', 'required', 'string'],
        ]);

        $user = User::find($request->user_id);
        $user->question =  $request->question;
        $user->answer =  $request-> answer;
        $user->save();
        return back()->with('message', 'You updated an account security question and answer')->with('message-color', 'alert-success');

    }


    public function sendmail(String $id){
        $user = User::find($id);
        return view('admin.securityquestion')->with('user', $user);
    }

    public function sendmailtouser(Request $request){

        $request->validate([
            'user_id' => ['bail', 'required', 'string'],
            'question' => ['bail', 'required', 'string'],
            'answer' => ['bail', 'required', 'string'],
        ]);

        $user = User::find($request->user_id);
        $user->question =  $request->question;
        $user->answer =  $request-> answer;
        $user->save();
        return back()->with('message', 'You updated an account security question and answer')->with('message-color', 'alert-success');

    }
   
}
