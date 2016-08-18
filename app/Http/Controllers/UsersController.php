<?php

namespace app\Http\Controllers;

use App\User;
use Auth;
use Carbon\Carbon;
use DB;
use File;
use Gate;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;
use Validator;
use Vinkla\Hashids\Facades\Hashids;

class UsersController extends Controller
{
    public function __construct()
    {
        // $this->middleware('decode');
    }

    /**
     * @return mixed
     */
    public function index()
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
//        $users = User::all();
        if (Auth::user()->role === 3) {
            $arr_is = [3];
        } elseif (Auth::user()->getRole() == 'Admin') {
            $arr_is = [2, 3];
        } else {
            $arr_is = null;
        }
        $users = User::whereNotIn('role', $arr_is)
            ->orderBy('created_at', 'desc')
            ->get();

        // neu dung tablesort thi tat phan trang
        //$users = User::paginate(10);
        return View::make('xUser.UserIndex')
            ->with('users', $users);
    }

    /**
     * @param Request $request
     * @return view to Jquery handle
     */
    public function search(Request $request)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        $valsearch = '';
        if ($request->has("keyword")) {
            $valsearch = $request->input('keyword');
            $valsearch = str_replace('\'', '', $valsearch);
        }
        if ($valsearch) {
            $user = User::where('userName', 'LIKE', '%' . $valsearch . '%')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $user = User::orderBy('created_at', 'desc')
                ->get();
        }

        //remove admin info
        $user = $user->reject(function ($item) {
            if (Auth::user()->getRole() == 'Admin') {
                return $item->getRole() == "Admin" || $item->getRole() == "SuperAdmin";
            }
            if (Auth::user()->getRole() == 'SuperAdmin') {
                return $item->getRole() == "SuperAdmin";
            }
        });
        //partial view
        return View::make('includes.user-index')
            ->with('users', $user)
            ->with('count', $user->count());
    }


    public function show($id)
    {
        //$id = Hashids::decode($id)[0];
        $user = User::find($id);
        if (Gate::denies('profile', $id)) {
            abort(403);
        }
        if (empty($user)) {
            abort(404, 'Lỗi, Không tìm thấy trang');
        }
        if (Auth::user()->getRole() !== 'SuperAdmin' && ($user->getRole() === 'SuperAdmin' || Auth::user()->id !== $user->id && $user->getRole() === 'Admin')) {
            return redirect()
                ->route('User.index')
                ->with(
                    [
                        'flash_level' => 'danger',
                        'message' => 'Lỗi, Bạn không có quyền hãy liên hệ với Admin!'
                    ]
                );
        }
        return View::make('xUser.UserEdit')->with('user', $user);
    }


    /**
     * @param $id
     * @param Request $request
     * @return $this
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     */
    private function resize($image, $size, $name)
    {
        try {
            $extension = $image->getClientOriginalExtension();
            $imageRealPath = $image->getRealPath();
            $thumbName = 'thumb_' . $name;

            $img = Image::make($imageRealPath); // use this if you want facade style code
            $img->resize(intval($size), null, function ($constraint) {
                $constraint->aspectRatio();
            });
            return $img->save(public_path('img') . '/thumbnail/' . $thumbName);
        } catch (Exception $e) {
            return false;
        }

    }

//    public function update(editUserRequest $request, $id)
    public function update(Request $request, $id)
    {
        if ($this->validateAddEdit($request->all(), $id)) {
            $user = User::findOrFail($id);
            if (Auth::user()->getRole() == 'Admin') {
                if ($user->getRole() == "SuperAdmin") {
                    return redirect()
                        ->route('User.index')
                        ->with([
                                'flash_level' => 'danger',
                                'message' => 'Lỗi, Bạn không có quyền hãy liên hệ với Admin!'
                            ]);
                }
            }
            if (Gate::denies('profile', $id)) {
                abort(403);
            }

            $is_changePass = false;
            //check old password
            // have column old true: check before update
            // if false break
            if ($request->has('oldPass')) {
                // Super co quyen thay doi bat ky mat khau nao
                //// tai khoan khac ngoai superadmin co quyen thay doi
                // co tai khoan thay doi la super phai kiem tra truoc khi thay doi
                if (Auth::user()->getRole() == 'SuperAdmin') {
                    if ($user->getRole() == 'SuperAdmin') {
                        if (Hash::check($request->input('oldPass'), $user->password)) {
                            $is_changePass = true;
                            $user->password = bcrypt($request->input('txtNewPass'));
                        } else {
                            return redirect()
                                ->back()
                                ->with([
                                    'flash_level' => 'danger',
                                    'message' => 'Lỗi, Vui lòng kiểm tra lại mật khẩu cũ'
                                ]);
                        }
                    } else {
                        $is_changePass = true;
                        $user->password = bcrypt($request->input('txtNewPass'));
                    }
                } else {
                    if (Hash::check($request->input('oldPass'), $user->password)) {
                        $is_changePass = true;
                        $user->password = bcrypt($request->input('txtNewPass'));
                    } else {
                        return redirect()
                            ->back()
                            ->with([
                                'flash_level' => 'danger',
                                'message' => 'Lỗi, Vui lòng kiểm tra lại mật khẩu cũ'
                            ]);
                    }
                }
            }

            if ($request->hasFile('txtImage')) {

                $file = $request->file('txtImage');
                $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
                $name = $timestamp . '-' . $file->getClientOriginalName();
                $oldthumb = public_path('img/thumbnail/') . 'thumb_' . $user->image;
                if (File::exists($oldthumb)) {
                    File::exists($oldthumb) && File::delete($oldthumb);
                    //File::delete($oldfile);
                }
                /*resize*/
                $resizedImage = $this->resize($file, '200', $name);
                if (!$resizedImage) {
                    return redirect()->back()
                        ->withError('Could not resize Image');
                }
                $user->image = $name;
            }
            if ($request->has('rdoLevel')) {
                $user->role = $request->input('rdoLevel');
            }

            $user->userName = $request->input('txtName');
            $user->email = $request->input('txtEmail');
            $user->Last_name = $request->input('txtHo');
            $user->First_name = $request->input('txtTen');
            $user->Furigana_name = $request->input('txtbDanh');
            $user->Birth_date = $request->input('txtNsinh');
            $user->Phone = $request->input('txtSdt');
            $user->Marriage = $request->input('txtMarriage');
            $user->Gender = $request->input('rdGender');
            $user->Address = $request->input('txtAddres');
            $user->Self_intro = $request->input('txtInfo');

            $user->update();

            if (Auth::user()->id === $id && $is_changePass){
                return redirect()
                    ->back()
                    ->with([
                        'flash_level' => 'success',
                        'message' => 'Bạn đã cập nhập thành công',
                        'javascript' => view('xUser.onFfoUser')->render(),
                    ]);
            }

            return redirect()
                ->back()
                ->with([
                    'flash_level' => 'success',
                    'message' => 'Bạn đã cập nhập thành công'
                ])
                ->withInput($request->all());

        } else {
            return \Redirect::back()
                ->withErrors($this->errorsAddEdit)
                ->withInput(\Request::except('oldPass', 'txtNewPass'));
        }
    }

    public function store(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //add user
    public function getAddUser()
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        return View('xUser.UserAdd');
    }

//    public function postAddUser(addUserRequest $request)
    public function postAddUser(Request $request)
    {
        if ($this->validateAddEdit($request->all())) {
            if (Gate::denies('Admin')) {
                abort(403);
            }
            if ($request->hasFile('txtImage')) {
                $extension = $request->file('txtImage')->getClientOriginalExtension();
                $file_name = substr(md5(rand()), 0, 7) . "." . $extension;
                $request->file('txtImage')->move('img/thumbnail', 'thumb_' . $file_name);
            } else {
                $file_name = '';
            }
            $_user = new User();
            $_user->userName = $request->txtName;
            $_user->email = $request->txtEmail;
            $_user->role = $request->rdLevel;
            $_user->active = 1;
            $_user->password = Hash::make($request->txtPass);
            $_user->image = $file_name;
            $_user->note = '';
            $_user->Last_name = $request->txtHo;
            $_user->First_name = $request->txtTen;
            $_user->Birth_date = $request->txtNsinh;
            $_user->Phone = $request->txtSdt;
            $_user->Gender = $request->rdGender;
            $_user->Address = $request->txtAddres;
            $_user->Self_intro = $request->txtInfo;
            $_user->Furigana_name = $request->txtbDanh;
            $_user->Marriage = $request->txtMarriage;

            $_user->save();
            return redirect()
                ->route('getadduser')
                ->with(
                    [
                        'flash_level' => 'success',
                        'message' => 'Đã thêm user thành công'
                    ]
                );
        } else {
            return \Redirect::back()->withErrors($this->errorsAddEdit);
        }
    }

    public function getDel($listid)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        if (strpos($listid, ',')) {
            $is_check = true;
        } else {
            $is_check = false;
        }
        $arrlist = explode(",", $listid);
        foreach ($arrlist as $key => $val) {
            $_id = Hashids::decode($val)[0];
            $user = User::findOrFail($_id);

            if (Auth::user()->id == $_id || (Auth::user()->getRole() != 'SuperAdmin' && $user->getRole() == 'SuperAdmin') || (Auth::user()->getRole() != 'SuperAdmin' && $user->getRole() == 'Admin')) {
                return redirect()
                    ->route('User.index')
                    ->with(
                        [
                            'flash_level' => 'warning',
                            'message' => 'Lỗi, Bạn không có quyền hãy liên hệ với Admin!'
                        ]
                    );
            }

            // xoa anh avatar
            if ($user->image) {
                $old_del = public_path('img/thumbnail/') . 'thumb_' . $user->image;
                if (File::exists($old_del)) {
                    File::exists($old_del) && File::delete($old_del);
                }
            }
            // xoa cv lien ket
            if ($user->CV) {
                foreach ($user->CV as $items) {
                    foreach ($items->Record as $key => $dt_record) {
                        $dt_record->destroy($dt_record->id);
                    }
                    foreach ($items->Skill as $key => $dt_skill) {
                        $dt_skill->destroy($dt_skill->id);
                    }
                    // xoa anh file pdf + Anh chua viet
                    if ($items->type_cv) {
                        $oldattach = public_path('files/') . $items->attach;
                        if (\File::exists($oldattach)) {
                            \File::exists($oldattach) && \File::delete($oldattach);
                        }
                    }
//                    if ($user->image) {
//                        $old_del = public_path('img/thumbnail/') . 'thumb_' . $user->image;
//                        if (File::exists($old_del)) {
//                            File::exists($old_del) && File::delete($old_del);
//                        }
//                    }
                }
            }
            // xoa trong bookmark
            DB::table('bookmarks')
                ->where('bookmark_user_id', $_id)
                ->delete();

            //xoa CV + user
            // kiem tra xoa [xoa anh -> skill -> Record -> cv -> ->bookmard -> acc]
            $user->delete();

        }

        if (!$is_check) {
            return redirect()
                ->route('User.index')
                ->with([
                        'flash_level' => 'success',
                        'message' => 'Đã xóa user thành công!'
                    ]);
        } else {
            return route('User.index');
        }
    }

    /* custom validate Add + Edit by bqn
     *  list rules $rulesAddEdit + function update
     *  chu y khi them cac truong bat buoc phai nhap REQUIRED
     *  NHO KIEM TRA VOI METHORD TUONG UNG KHI THEM COT CO REQUIRED
     *
     *  VD: FORM [A] KO CO NAME='ABC' TRONG KHI $rulesAddEdit CO
     *      TON TAI 'ABC' => 'REQUIRED' -> XUNG DOT
     *  KQ: VALIDATE => FALSE
     *      ERROR => [ABC] => 'phai ......'
     *
     *  custom message $messagesAddEdit + function update
     *  value error + function error
     *  output: ValidateAddEdit (with data + id or null) return True or False
     *  output: get message error width func setErrorsAddEdit()
    */
    protected $rulesAddEdit = array(
        'txtName' => 'required|min:4|regex:/^[a-z0-9]*$/|unique:users,userName',
        'txtEmail' => 'required|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9]+)*@[a-z0-9]([a-z0-9-][a-z0-9+)*(\.[a-z]{2,4}){1,2}$/|unique:users,email',
        'txtPass' => 'min:6',
        'txtRePass' => 'same:txtPass',
        'txtImage' => 'mimes:jpg,jpeg,bmp,png',
        'txtHo' => 'required',
        'txtTen' => 'required',
        'txtNsinh' => 'required|before:-13 years|after:-60 years',
        'txtSdt' => ['required' ,'regex:/^(?:0|\(\+84\))[1-9]{1}[0-9]{1,2}[- .]\d{3}[- .]\d{4}$/'],
        'txtAddres' => 'required',
        'oldPass'   =>  'min:6',
        'txtNewPass' => 'min:6'
    );

    protected $messagesAddEdit = array(
        'txtName.required' => 'Vui lòng nhập tên.',
        'txtName.min' => 'Tài khoàn tối thiểu 4 kí tự',
        'txtName.unique' => 'Tài khoàn đã tồn tại',
        'txtName.regex' => 'Tài khoản chỉ được dùng chữ thường và số',
        'txtEmail.unique' => 'Email đã tồn tại.',
        'txtEmail.required' => 'Vui lòng nhập email',
        'txtEmail.regex' => 'Địa chỉ email không hợp lệ.',
        'txtPass.min' => 'Pass tối thiểu 6 kí tự.',
        'txtRePass.required' => 'Vui lòng nhập lại mật khẩu',
        'txtRePass.same' => 'Hai mật khẩu không trùng nhau',
        'txtRePass.required' => 'Vui lòng nhập email',
        'txtImage.mimes' => 'Đây không phải hình ảnh',
        'txtImage.max' => 'Kích thước vượt quá giới hạn cho phép',
        'txtHo.required' => 'Vùi lòng nhập họ của bạn',
        'txtHo.required' => 'Vùi lòng nhập họ của bạn',
        'txtTen.required' => 'Vùi lòng nhập tên của bạn',
        'txtNsinh.required' => 'Vùi lòng nhập ngày thành năm sinh',
        'txtNsinh.before' => 'Bạn chưa đủ độ tuổi đi làm việc',
        'txtNsinh.after' => 'Bạn đã đến lúc nghỉ hưu theo chế độ',
        'txtNsinh.required' => 'Vui nhập số điện thoại',
        'txtSdt.regex' => 'Vui nhập đúng định dạng số điện thoại',
        'txtAddres.required' => 'Vui nhập thông tin liên hệ',
        'oldPass.min' => 'Password tối thiểu 6 kí tự',
        'txtNewPass.min' => 'Password tối thiểu 6 kí tự',
    );

    protected $errorsAddEdit;

    // update rules user
    public function updateRules($id = null)
    {
        $rules = $this->rulesAddEdit;
        if (\Request::isMethod('PUT')) {
            $rules['txtName'] = $rules['txtName'].','. $id .',id';
            $rules['txtEmail'] = $rules['txtEmail'].','. $id .',id';
        }
        if (\Request::isMethod('POST')) {
            $rules['txtPass'] = $rules['txtPass'].'|required';
            $rules['txtRePass'] = $rules['txtRePass'].'|required';
        }
        $rules['txtImage'] = $rules['txtImage'].'|max:'. 1024*config('app.max_UploadAvatar');

        return $rules;
    }
    // update message
    public function updateMessage()
    {
        $msg = $this->messagesAddEdit;
        $msg['txtImage.max'] = $msg['txtImage.max'].' '. config('app.max_UploadAvatar') .'MB';

        return $msg;
    }

    // validate add + Edit User
    public function validateAddEdit($data, $id = null)
    {
        $v = Validator::make($data, $this->updateRules($id), $this->updateMessage());
        if ($v->fails())
        {
            $this->errorsAddEdit = $v->messages();
            return false;
        }

        return true;
    }

    public function setErrorsAddEdit()
    {
        return $this->errorsAddEdit;
    }

    public function getUserLogout(){
        Auth::logout();
        return '';
    }
}
