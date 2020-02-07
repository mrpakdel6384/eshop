@extends('Admin.master')

@section('script')

    <script src="/ckeditor/ckeditor.js"></script>

    <script>

        CKEDITOR.replace('description' , {
            filebrowserUploadUrl : '/admin/panel/upload-image',
            filebrowserImageUploadUrl : '/admin/panel/upload-image'
        });
    </script>

@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ایجاد ویديو</h2>
            <a href="{{route('episodes.index')}}" class="btn btn-primary">آرشیو</a>
        </div>
        <form action="{{route('episodes.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}
            @include('Admin.section.error')
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">عنوان ویدیو</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="عنوان مقاله را وارد کنید" value="{{old('title')}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">دوره مرتبط</label>
                    <select  name="course_id" id="type" class="form-control" >
                        @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->title}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">نوع دوره</label>
                    <select  name="type" id="type" class="form-control" >
                        <option value="vip">اعضای ویژه </option>
                        <option value="cash">نقدی</option>
                        <option value="free" selected>رایگان</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">متن </label>
                    <textarea type="text" name="description" id="description" class="form-control" placeholder=" متن را وارد کنید " >{{old('description')}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="tags" id="tags" class="form-control" placeholder="تگ ها" value="{{old('tags')}}">
                </div>
                <div class="col-sm-6">
                    <input type="text" name="number" id="number" class="form-control" placeholder="شماره" value="{{old('number')}}" >
                </div>
            </div>
            <div class="form-group">

                <div class="col-sm-6">
                    <label for="videoUrl">لینک ویديو</label>
                    <input type="text" name="videoUrl" id="videoUrl" class="form-control" value="{{old('videoUrl')}}" >
                </div>
                <div class="col-sm-6">
                    <label for="videoUrl">زمان ویديو</label>
                    <input type="text" name="time" id="time" class="form-control" value="{{old('time')}}"  >
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="submit" class="btn btn-danger" value="ارسال">
                </div>
            </div>
        </form>
    </div>
@endsection


