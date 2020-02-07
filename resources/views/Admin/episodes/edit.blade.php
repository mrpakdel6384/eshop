@extends('Admin.master')

@section('script')

    <script src="/ckeditor/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('description',{
            filebrowserUploadUrl:'/admin/panel/upload-image',
            filebrowserImageUploadUrl:'/admin/panel/upload-image',
        });
    </script>

@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ویرایش ویدیو</h2>
            <a href="{{route('episodes.index')}}" class="btn btn-primary">آرشیو</a>
        </div>
        <form action="{{route('episodes.update',['id'=>$episode->id])}}" method="post" class="form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            @include('Admin.section.error')
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">عنوان ویدیو</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="عنوان  را وارد کنید" value="{{$episode->title}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">دوره مرتبط</label>
                    <select  name="course_id" id="course_id" class="form-control" >
                        @foreach($courses as $course)
                            <option value="{{$course->id}}" {{$course->id == $episode->course_id ? "selected" :""}}>{{$course->title}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">نوع دوره</label>
                    <select  name="type" id="type" class="form-control" >
                        <option value="vip" {{$episode->type == "vip" ? "selected":""}}>اعضای ویژه </option>
                        <option value="cash" {{$episode->type == "cash" ? "selected":""}}>نقدی</option>
                        <option value="free" {{$episode->type == "free" ? "selected":""}}>رایگان</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">متن </label>
                    <textarea type="text" name="description" id="description" class="form-control" placeholder=" متن را وارد کنید " >{{$episode->description}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="tags" id="tags" class="form-control" placeholder="تگ ها" value="{{$episode->tags}}">
                </div>
                <div class="col-sm-6">
                    <input type="text" name="number" id="number" class="form-control" placeholder="شماره" value="{{$episode->number}}" >
                </div>
            </div>
            <div class="form-group">

                <div class="col-sm-6">
                    <label for="videoUrl">لینک ویديو</label>
                    <input type="text" name="videoUrl" id="videoUrl" class="form-control" value="{{$episode->videoUrl}}" >
                </div>
                <div class="col-sm-6">
                    <label for="videoUrl">زمان ویديو</label>
                    <input type="text" name="time" id="time" class="form-control" value="{{$episode->time}}"  >
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
