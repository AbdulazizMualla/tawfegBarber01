@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="mt-5 font-weight-bold text-center">إحصائية العمل.</h4>
        </div>
    </div>
    <hr>
    <div class="row responseItem ">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card ">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-right">
                                <h3 class="text-info">{{$counts->count_users}}</h3>
                                <span>عدد العملاء</span>
                            </div>
                            <div class="align-self-center">
                                <i class="fa fa-user text-info fa-border fa-3x float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-right">
                                <h3 class="text-info">{{$counts->count_contact}}</h3>
                                <span>الرسائل</span>
                            </div>
                            <div class="align-self-center">
                                <i class="fa fa-envelope text-info fa-border fa-3x float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-right">
                                <h3 class="text-info">{{$counts->count_rev}}</h3>
                                <span>عدد الحجوزات</span>
                            </div>
                            <div class="align-self-center">
                                <i class="fa fa-cogs text-info fa-border fa-3x float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
