@extends('Admin.master')

@section('script')

    <script src="/ckeditor/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('body',{
            filebrowserUploadUrl:'/admin/panel/upload-image',
            filebrowserImageUploadUrl:'/admin/panel/upload-image',
        });
        config.contentsLangDirection = 'rtl';
    </script>

@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ویرایش دوره</h2>
            <a href="{{route('courses.index')}}" class="btn btn-primary">آرشیو</a>
        </div>
        <form action="{{route('courses.update',['id'=>$course->id])}}" method="post" class="form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            @include('Admin.section.error')
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">عنوان دوره</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="عنوان دوره را وارد کنید" value="{{$course->title}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">نوع دوره</label>
                    <select  name="type" id="type" class="form-control" >
                        <option value="vip" {{$course->type == "vip" ? "selected" :""}}>اعضای ویژه </option>
                        <option value="cash" {{$course->type == "cash" ? "selected":""}}>نقدی</option>
                        <option value="free" {{$course->type == "free" ? "selected" : ""}}>رایگان</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">متن مقاله</label>
                    <textarea type="text" name="body" id="body" class="form-control" placeholder=" متن را وارد کنید " >{{$course->body}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="tags" id="tags" class="form-control" placeholder="تگ ها" value="{{$course->tags}}">
                </div>
                <div class="col-sm-6">
                    <input type="text" name="price" id="price" class="form-control" placeholder="قیمت" value="{{$course->price}}" >
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 ">
                    <div class="row">
                @foreach($course->images['images'] as $key=>$image)
                  <div class="col-sm-2">
                      <label for="imageThumb" class="control-label">
                          {{$key}}
                          <input type="radio" name="imagesThumb" id="imageThumb" value="{{$image}}" {{$course->images['thumb'] == $image ? "checked" : ''}}>
                          <img src="{{$image}}" alt="" width="100%">
                      </label>
                  </div>
                @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="file" name="images" id="images" class="form-control" >
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
