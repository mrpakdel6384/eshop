@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ایجاد مقالات</h2>
            <a href="{{route('articles.all')}}" class="btn btn-primary">آرشیو</a>
        </div>
        <form action="{{route('articles.store')}}" method="post" >
            {{csrf_field()}}
            <div class="form-group">
                <label class="control-label">عنوان مقاله</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="عنوان مقاله را وارد کنید" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label class="control-label"> توضیحات کوتاه</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="عنوان مقاله را وارد کنید" value="{{old('description')}}">
            </div>
            <div class="form-group">
                <label class="control-label"> توضیحات کوتاه</label>
                <textarea type="text" name="description" id="description" class="form-control" placeholder=" متن را وارد کنید " >{{old('body')}}"</textarea>
            </div>
        </form>
    </div>
@endsection
