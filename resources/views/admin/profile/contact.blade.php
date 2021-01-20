@extends('admin.layout.master')
@section('title','Thông tin liên hệ')
@section('content')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading text-right">
                    <a href="{{URL::to('/index')}}" class="btn btn-info btn-xs"><i class="fa fa-home"> Home</i></a>
                    <a href="javascript:void(0)" class="btn btn-primary btn-xs"><i class="fa fa-arrows-h"></i></a>
                    <a class="btn btn-success btn-xs"> Contact </i></a>
                </div>
            </div>
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST">
                {!! csrf_field() !!}
                <div class="x_panel">
                    <div class="x_title">
                        <ul class="nav navbar-left panel_toolbox">
                            <li><span style="font-size: 20px;color: orange">Thông tin liên hệ <i
                                        class="fa fa-question"></i></span></li>
                        </ul>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><button class="btn btn-success" type="submit">Lưu</button></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-------------------------------------------------------------------------------------------------->
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ĐT đi động
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" value="{{isset($contact)?$contact->ct_phone:null}}"
                                        name="ct_phone" class="form-control" placeholder="Nhập số điện thoại">
                                </div>
                            </div>
                        </div>
                        <!-------------------------------------------------------------------------------------------------->
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Yahoo <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{isset($contact)?$contact->ct_yahoo:null}}"
                                        name="ct_yahoo" class="form-control" placeholder="Tài khoản Yahoo cá nhân">
                                </div>
                                @if($errors->has('ct_yahoo'))
                                <p style="color:red"> {{ $errors->first('ct_yahoo') }}</p>
                                @endif
                            </div>
                        </div>
                        <!-------------------------------------------------------------------------------------------------->
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email
                                    khác<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" value="{{isset($contact)?$contact->ct_email:null}}"
                                        name="ct_email" class="form-control" placeholder="Email cá nhân">
                                </div>
                            </div>
                        </div>
                        <!-------------------------------------------------------------------------------------------------->
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Skype <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{isset($contact)?$contact->ct_skype:null}}"
                                        class="form-control" name="ct_skype" placeholder="Skype cá nhân">
                                </div>
                                @if($errors->has('ct_skype'))
                                <p style="color:red">{{$errors->first('ct_skype')}}</p>
                                @endif
                            </div>
                        </div>
                        <!---------------------------------------------------------------------------------------------------------------------------------------------->
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Liên hệ khác
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{isset($contact)?$contact->ct_other:null}}"
                                        name="ct_other" class="form-control" placeholder="Instagram, Twiter ..... ">
                                </div>
                                @if($errors->has('ct_other'))
                                <p style="color:red"> {{ $errors->first('ct_other') }}</p>
                                @endif
                            </div>
                        </div>
                        <!------------------------------------------------------------------------------------------------------------------------------------------>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Zalo<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{isset($contact)?$contact->ct_zalo:null}}" name="ct_zalo"
                                        class="form-control" placeholder="Zalo Cá nhân">
                                </div>
                                @if($errors->has('ct_zalo'))
                                <p style="color:red"> {{ $errors->first('ct_zalo')}}</p>
                                @endif
                            </div>
                        </div>
                        <!-------------------------------------------------------------------------------------------------------------------------------------------->
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Facebook <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{isset($contact)?$contact->ct_facebook:null}}"
                                        name="ct_facebook" class="form-control" placeholder="Nhập Facebook cá nhân">
                                </div>
                                @if($errors->has('ct_facebook'))
                                <p style="color:red"> {{ $errors->first('ct_facebook') }}</p>
                                @endif
                            </div>
                        </div>
                        <!-------------------------------------------------------------------------------------------------------------------------------------->
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ĐT gia đình <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" value="{{isset($contact)?$contact->ct_phone_home:null}}"
                                        name="ct_phone_home" class="form-control" placeholder="Số điện thoại nhà">
                                </div>
                                @if($errors->has('ct_phone_home'))
                                <p style="color:red"> {{ $errors->first('ct_phone_home') }}</p>
                                @endif
                            </div>
                        </div>
                        <!-------------------------------------------------------------------------------------------------------------------------------------->
                    </div>
                </div>
                <div class="x_panel">
                    <div class="x_title">
                        <ul class="nav navbar-left panel_toolbox">
                            <li><span style="font-size: 20px;color: orange">Hộ khẩu thường trú <i
                                        class="fa fa-question"></i></span></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-------------------------------------------------------------------------------------------------->
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Quốc tịch
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="ct_nationality">
                                        <?php $national = DB::table('country')->get(); ?>
                                        @foreach($national as $nl)
                                        <option value="{{$nl->id}}" @if($nl->id ==
                                            (isset($contact)?$contact->ct_nationality:null)) selected
                                            @endif>{{$nl->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-------------------------------------------------------------------------------------------------->
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Phường xã<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{isset($contact)?$contact->ct_village:null}}"
                                        name="ct_village" class="form-control" placeholder="Phường xã">
                                </div>
                            </div>
                        </div>
                        <!------------------------------------------------------------------------------------------------------------------------------------------>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tỉnh / Thành phố<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{isset($contact)?$contact->ct_city:null}}" name="ct_city"
                                        class="form-control" placeholder="Tỉnh / Thành phố">
                                </div>
                            </div>
                        </div>
                        <!-------------------------------------------------------------------------------------------------------------------------------------------->
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{isset($contact)?$contact->ct_address:null}}"
                                        name="ct_address" class="form-control"
                                        placeholder="Địa chỉ ( Số nhà, ngõ, ngách )">
                                </div>
                            </div>
                        </div>
                        <!-------------------------------------------------------------------------------------------------------------------------------------->
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Quận / huyện <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{isset($contact)?$contact->ct_town:null}}" name="ct_town"
                                        class="form-control" placeholder="Quận huyện / Thành phố">
                                </div>
                            </div>
                        </div>
                        <!-------------------------------------------------------------------------------------------------------------------------------------->
                    </div>
                </div>
                <div class="x_panel">
                    <div class="x_title">
                        <ul class="nav navbar-left panel_toolbox">
                            <li><span style="font-size: 20px;color: orange">Liên hệ khẩn cấp khi có tin buồn <i
                                        class="fa fa-question"></i></span></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-------------------------------------------------------------------------------------------------->
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Họ và tên <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{isset($contact)?$contact->ct_name_fl:null}}"
                                        name="ct_name_fl" class="form-control" placeholder="Nhập họ và tên">
                                </div>
                            </div>
                        </div>
                        <!-------------------------------------------------------------------------------------------------->
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Quan hệ <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="ct_rlts_fl">
                                        <?php $family = DB::table('relationship_family')->get(); ?>
                                        @foreach($family as $fl)
                                        <option value="{{$fl->id}}" @if($fl->id ==
                                            (isset($contact)?$contact->ct_rlts_fl:null)) selected
                                            @endif>{{$fl->rlts_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-------------------------------------------------------------------------------------------------->
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Số điện thoại<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" value="{{isset($contact)?$contact->ct_phone_fl:null}}"
                                        name="ct_phone_fl" class="form-control" placeholder="Số điện thoại">
                                </div>
                            </div>
                        </div>
                        <!-------------------------------------------------------------------------------------------------->
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{isset($contact)?$contact->ct_address_fl:null}}"
                                        class="form-control" name="ct_address_fl" placeholder="Địa chỉ">
                                </div>
                            </div>
                        </div>
                        <!-------------------------------------------------------------------------------------------------------------------------------------->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
