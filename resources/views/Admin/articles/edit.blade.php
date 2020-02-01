@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ویرایش مقالات</h2>
            <a href="{{route('articles.index')}}" class="btn btn-primary">آرشیو</a>
        </div>
        <form action="{{route('articles.update', [''])}}" method="post" class="form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field("PATCH")}}
            @include('Admin.section.error')
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">عنوان مقاله</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="عنوان مقاله را وارد کنید" value="{{$article->title}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label"> توضیحات کوتاه</label>
                    <textarea type="text" rows="5" name="description" id="description" class="form-control" placeholder=" توضیحات کوتاه " >{{$article->description}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">متن مقاله</label>
                    <textarea type="text" name="body" id="body" class="form-control" placeholder=" متن را وارد کنید " >{{$article->body}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    @foreach($article->images as $image)
                    <input type="radio" name="images" id="images" class="form-control" >
                        <img src="{{$image}}" alt="">
                    @endforeach
                </div>
                <div class="col-sm-12">
                    <input type="file" name="images" id="images" class="form-control" >
                </div>

            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="tags" id="tags" class="form-control" placeholder="تگ ها" value="{{$article->tags}}" >
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
