    <div class="box_white block_ntv_dangnhap">
        <h4>THÔNG TIN TÀI KHOẢN <i style="color:red"><samll>(bắt buộc)</samll></i></h4>
    </div>
    <div class="block-info">
        <form action="{{route('CV.store')}}" id="cv-rule">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <div class="my-forms" id="cvforms-basic">
                <ul>
                    <li class="">
                        <div class="float_left" style="width: 45%;">
                            <label class="label" for="name">Họ <i style="color:red">*</i></label>
                            <div class="input">
                                <label class="icon-left" for="text"><i class="fa fa-user"></i></label>
                                <input style="width: 60%;" required name="LastName" type="text" class="input-left float_left" value="{!! old('LastName', isset($uCV) ? $uCV->Last_name : '') !!}" placeholder="Ví dụ: Nguyễn">
                                <div class="LastName"></div>
                            </div>

                        </div>
                        <div class=" float_left" style="width: 50%;">
                            <label class="label" for="name">Tên <i style="color:red">*</i></label>
                            <div class="input">
                                <label class="icon-left" for="text"><i class="fa fa-user"></i></label>
                                <input style="width: 60%;" required name="Firstname" type="text" class="input-left float_left" value="{!! old('Firstname', isset($uCV) ? $uCV->First_name : '') !!}" placeholder="Ví dụ: Văn A">
                                <div class="Firstname"></div>
                            </div>
                        </div>
                    </li>
                    <li class="">
                        <div class="float_left" style="width: 45%;">
                            <label class="label" for="name">Bí danh </label>
                            <div class="input">
                                <label class="icon-left" for="text"><i class="fa fa-info"></i></label>
                                <input style="width: 60%;" name="txtFuriganaName" type="text" class="input-left float_left" placeholder="some text" value="{!! old('txtFuriganaName', isset($uCV) ? $uCV->Furigana_name : '') !!}">
                                <div class="txtFuriganaName"></div>
                            </div>
                        </div>
                        <div class="float_left" style="width: 20%; margin-top:30px;">
                            <div class="float_left">
                                <label class="radio"><input type="radio" id="" name="rdGender" value="0" {{($uCV->Gender == 0) ? 'checked' : ''}}><i></i>Nữ</label>
                            </div>
                            <div class="float_right">
                                <label class="radio"><input type="radio" id="" name="rdGender" value="1" {{($uCV->Gender == 1) ? 'checked' : ''}}><i></i>Nam</label>
                            </div>
                        </div>
                    </li>
                    <li class="">
                        <div class="float_left" style="width: 45%;">
                            <label class="label" for="name">Ngày sinh(dd-mm-yy) <i style="color:red">*</i></label>
                            <div class="input">
                                <label class="icon-left" for="text"><i class="fa fa-calendar-o"></i></label>
                                <input id="" type="date" required name="txtDate" class="input-left float_left" style="width: 60%;" placeholder="some text" value="{!! old('txtDate', isset($uCV) ? $uCV->Birth_date : '') !!}">
                               <div class="txtDate"></div>
                            </div>
                        </div>
                        <div class=" float_left" style="width: 50%;">
                            <label class="label" for="name">Điện thoại <small><i>0*|(+84)*-xxx-xxxx</i></small> <i style="color:red">*</i></label>
                            <div class="input">
                                <label class="icon-left" for="text"><i class="fa fa-phone"></i></label>
                                <input onkeyup="phonenumber(this)" style="width: 60%;" required name="txtPhone" type="tel" class="input-left float_left" placeholder="some text" value="{!! old('txtPhone', isset($uCV) ? $uCV->Phone : '') !!}">
                                <div class="txtPhone"></div>
                            </div>
                        </div>

                    </li>
                    <li class="">
                        <div class=" float_left" style="width: 100%;">
                            <label class="label" for="name">Địa chỉ <i style="color:red">*</i></label>
                            <div class="input">
                                <label class="icon-left" for="text"><i class="fa fa-edit"></i></label>
                                <input style="width: 90%;" required name="txtAddress" type="text" class="input-left float_left" placeholder="some text" value="{!! old('txtAddress', isset($uCV) ? $uCV->Address : '') !!}">
                                <div class="txtAddress"></div>
                            </div>
                        </div>

                    </li>
                    <li class="">
                        <div class=" float_left" style="width: 100%;">
                            <label class="label" for="name">Thông tin liên hệ <i style="color:red">*</i></label>
                            <div class="input">
                                <label class="icon-left" for="text"><i class="fa fa-edit"></i></label>
                                <input style="width: 90%;" required name="txtContact" type="text" class="input-left float_left" placeholder="some text" value="{!! old('txtContact', isset($uCV) ? $uCV->Contact_information : '') !!}">
                                <div class="txtContact"></div>
                            </div>
                        </div>
                    </li>
                    <li class="">
                        <div class=" float_left" style="width: 100%;">
                            <label class="label" for="">Giới thiệu bản thân</label>
                            <div class="input">
                                <label class="icon-left" for=""><i class="fa fa-edit"></i></label>
                                <textarea style="width: 90%;" name="txtSelfIntro" type="text" class="input-left float_left">{!! old('txtSelfIntro', isset($uCV) ? $uCV->Self_intro : '') !!}</textarea>
                            </div>
                        </div>
                    </li>
                    <li><input type="hidden" name="txtTypeCv" value="{{ isset($isUpload) ? '1' : '0' }}" /></li>
                    <li>
                        <div class=" float_left" style="width: 100%;">
                            <label class="label" for="name">Tên CV <i style="color:red">*</i></label>
                            <div class="input">
                                <label class="icon-left" for="text"><i class="fa fa-edit"></i></label>
                                <input style="width: 90%;" required name="txtname" type="text" class="input-left float_left" placeholder="some text" value="{!! old('txtname', isset($CV) ? $CV->name_cv : '') !!}">
                                <div class="txtname"></div>
                            </div>
                        </div>
                    </li>
                    <li class="">
                        <div class="float_left" style="width: 100%;">
                            <label class="label" for="apply_to">Vị trí ứng tuyển <i style="color:red">*</i></label>
                            <div class="input">
                                <div class="">
                                    <?php $positions = \App\Positions::where('active',1)->get(); ?>
                                    <select class="float_left optioncv" name="txtApply_to">
                                        <option value="0">Vị trí ứng tuyển</option>
                                        @foreach($positions as $position )
                                            <option value="{{$position->id}}" {{ old('txtApply_to', (isset($CV->id) == $position->id) ? 'selected' : '') }}>{{$position->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="txtApply_to"></div>
                            </div>
                        </div>
                    </li>
                    <li class="">
                        <div class=" float_left" style="width: 100%;">
                            <label class="label" for="">Nguyện vọng</label>
                            <div class="input">
                                <label class="icon-left" for=""><i class="fa fa-edit"></i></label>
                                <textarea style="width: 90%;" name="txtRequest" type="text" class="input-left float_left">{!! old('txtRequest', isset($CV) ? $CV->Request : '') !!}</textarea>
                            </div>
                        </div>
                    </li>
                    @if (count($CV))
                        <li> <button type="button" onclick="submitCVRule()" class="btn btn-primary">CẬP NHẬT</button></li>
                    @else
                        <li><button type='button' onclick="submitCVRule()" class="btn btn-primary">TẠO HỒ SƠ</button></li>
                    @endif
                </ul>
            </div>
        </form>
    </div>
