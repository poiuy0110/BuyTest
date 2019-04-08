<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Orders;
use App\Jobs\SendEmailJob;
use App\Jobs\SendPassEmail;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Auth;
use DB;

class MemberController extends Controller
{
    public function index()
    {    
        $cat_lists = $this->getFrontendCatLists();
        return view('frontend.index', compact(['cat_lists','index_photo_lists']));
    }


    public function login()
    {    
        $cat_lists = $this->getFrontendCatLists();
        return view('frontend.member.login', compact('cat_lists'));
    }

    public function loginConfirm(Request $request)
    {   
        DB::connection()->enableQueryLog();
        $rules = ['login_id'=>'required|',
              'password'=>'required'
              ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {

            $cr = ['login_id' => $request->input("login_id"), 'password' => $request->input("password"), 'active' => "1"];

            $attempt = Auth::guard("frontend")->attempt($cr);



            if($attempt){   
                return redirect()->intended('index');
            } else {
               
                return  redirect()->back();
            }
        }

        //print_r($request->all());
          return Redirect::to('member/login')->withErrors($validator);
        
    }



    function sendConfirmEmail($id){


        $oMember = Member::find($id);

        dispatch(new SendEmailJob($oMember))->delay(now()->addMinutes(1));

        //echo 'email sent';

    }

    public function logout() {
        Auth::guard('frontend')->logout();
        return redirect()->intended('member/login');
    }


    public function register()
    {    
        $cat_lists = $this->getFrontendCatLists();
        return view('frontend.member.register', compact('cat_lists'));
    }


    public function registerSave(Request $request)
    {    
        $rules = [
            'name' => 'required|min:3|max:50',
            'login_id' => 'required|min:4|max:50',
            'email' => 'required|email',
            'password' => 'min:6|required_with:password2|same:password2',
            'password2' => 'min:6'
            ];
        
        $messages = [
            'name.required' => "請輸入姓名!",
            'login_id.required' => "請輸入帳號!",
            'login_id.min' => "帳號必須大於4字元!",
            'login_id.max' => "帳號必須小於50字元!",
            'email.required' => "請輸入Email!",
            'email.email' => "輸入Email格式不正確!",
            'password.min' => "密碼必須大於6字元!",
            'password.required' => "請輸入密碼!",
            'password.same' => "前後密碼輸入不一致!"
        ];


        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            
            $oMember = Member::where('login_id', '=', $request->input("login_id"))->first();

            if($oMember != null){
                $validator->errors()->add('login_id', '此帳號已經存在!');
                return Redirect::to('register')->withErrors($validator);
            } else{

                $oMember = Member::where('email', '=', $request->input("email"))->first();
                if($oMember != null){
                    $validator->errors()->add('email', '此Email已經存在!');
                    return Redirect::to('register')->withErrors($validator);
                } else {
                    
                    $oMember = new Member();
                    $oMember->login_id = $request->input("login_id");
                    $oMember->password = bcrypt($request->input("password"));
                    $oMember->name = $request->input("name");
                    $oMember->email = $request->input("email");
                    $oMember->mobile = $request->input("mobile");
                    $oMember->active_token = bcrypt(date("YmdHis"). $request->input("login_id").rand());
                    $oMember->save();
                    $this->sendConfirmEmail($oMember->id);

                    return Redirect::to('member/login')->with('success_message', '會員啟用通知信已寄出!');

                }
                

            }
        } else {


            return Redirect::to('register')->withErrors($validator);

        }
    }

    public function forgetPass()
    {    
        $cat_lists = $this->getFrontendCatLists();
        return view('frontend.member.forgetPass', compact('cat_lists'));
    }


    public function sendForgetPass(Request $request)
    {    
        $rules = [
            'email' => 'required|email',
            ];
        
        $messages = [
            'email.required' => "請輸入Email!",
            'email.email' => "輸入Email格式不正確!",
        ];


        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            
            $oMember = Member::where('email', '=', $request->input("email"))->first();

            //print_r($oMember);

            if($oMember != null){
                $this->sendPassEmail($oMember->id);
                return redirect()->back()->with('message', '重設密碼email已經送出!');

            } else{

                $validator->errors()->add('email', '此email不存在!');
                
                return Redirect::to('forgetPass')->withErrors($validator);

            }
        } else {


            return Redirect::to('forgetPass')->withErrors($validator);

        }
    }


    function sendPassEmail($id){


        $oMember = Member::find($id);

        //print_r($oMember);

        dispatch(new SendPassEmail($oMember))->delay(now()->addMinutes(1));

        //echo 'email sent';

    }


    function show(){

        $id = Auth::guard('frontend')->id();
        if(!empty($id)){

            $cat_lists = $this->getFrontendCatLists();
            return view('frontend.member.memberShow', compact('cat_lists'));


        } else {

            return redirect()->route('index');

        }



    }

    function orderShow(){

        $id = Auth::guard('frontend')->id();
        $lists = Orders::where("mem_id", "=", $id)->get();

        return view('frontend.member.ordersShow', compact('lists'));

    }

    function memberEdit(){

        $id = Auth::guard('frontend')->id();
        $member = Member::find($id);

        return view('frontend.member.memberEdit', compact('member'));

    }


    function memberSave(Request $request){

        $oMember = new Member($request->input("id"));
        $oMember->name = $request->input("name");
        $oMember->email = $request->input("email");
        $oMember->mobile = $request->input("mobile");
        $oMember->zipcode = $request->input("zipcode");
        $oMember->city = $request->input("city");
        $oMember->town = $request->input("town");
        $oMember->address = $request->input("address");
        $oMember->inv_type = $request->input("inv_type");
        $oMember->inv_bin = $request->input("inv_bin");
        $oMember->inv_title = $request->input("inv_title");
        $oMember->save();

        return redirect()->route('member.memberShow');

    }

    function memberChgPass(){

        $id = Auth::guard('frontend')->id();
        $member = Member::find($id);

        return view('frontend.member.memberChgPass', compact('member'));

    }

    function memberChgPassSave(Request $request){

        $id = Auth::guard('frontend')->id();
        $member = Member::find($id );

        $old_pass = $request->input('old_pass');
        $password = $request->input('password');
        $data = $request->except(['_method','_token']);

        $rules = [
            'old_pass'=>'required|between:6,20',
            'password'=>'required|between:6,20|confirmed',
        ];
        $messages = [
            'required' => '密碼不能為空',
            'between' => '密碼必須是6~20位之間',
            'confirmed' => '新密碼和確認密碼不匹配'
        ];
        $validator = Validator::make($data, $rules, $messages);
        $validator->after(function($validator) use ($old_pass, $member) {
            if (!\Hash::check($old_pass, $member->password)) {
                $validator->errors()->add('old_pass', '原密碼錯誤');
            }

            
        });
        if ($validator->fails()) {
            return back()->withErrors($validator); 
        }

        $member->password = bcrypt($password);
        $member->save();

        return redirect()->route('member.memberShow');


    }


    function memberEmailConfirm($url_token){

        $oMember = Member::where("active_token", "=", $url_token)->first();

        if($oMember != null){
            if($oMember->active != "1"){
                $oMember->active = "1";
                $oMember->active_token = "";
                $oMember->save();
            } else {
                return redirect()->route('member.login');
            }
        } else {
            return redirect()->route('member.login');
        }



    }


    
   



}
