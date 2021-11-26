@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form class="bg-white p-3 border shadow" action="{{route('admin.users.sendEmail.send')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="to">بريد المستقبل <u class="text-danger">إذا كنت تريد إرسال هذه الرساله للكل فقط أكتب عبارة الكل</u></label>
                        <input class="form-control @error('to') is-invalid @enderror" name="to" id="to" placeholder="عنوان المستقبل" value="{{old('to')}}">
                        @error('to')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="subject">الموضوع</label>
                        <input class="form-control  @error('subject') is-invalid @enderror" name="subject" id="subject" placeholder="الموضوع" value="{{old('subject')}}">
                        @error('subject')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="message">نص الرسالة</label>
                        <textarea rows="9" class="form-control  @error('message') is-invalid @enderror" name="message" id="message" placeholder="الرسالة">{{old('message')}}</textarea>
                        @error('message')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">إرسال</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
