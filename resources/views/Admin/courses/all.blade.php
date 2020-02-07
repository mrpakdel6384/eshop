@extends('Admin.master')


@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>لیست دوره ها</h2>
            <div class="btn-group">
                <a href="{{route('courses.create')}}" class="btn btn-primary">ارسال دوره جدید</a>
                <a href="{{route('episodes.index')}}" class="btn btn-danger">بخش ویدیو ها</a>
            </div>

        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>عنوان دوره</th>
                    <th>تعداد نظرات</th>
                    <th>تعداد بازدید</th>
                    <th>تعداد شرکت کنندگان</th>
                    <th>وضعیت دوره</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                <tr>
                    <td>{{$course->title}}</td>
                    <td>{{$course->commentCount}}</td>
                    <td>{{$course->viewCount}}</td>
                    <td>1</td>
                    <td>
                        @if($course->type == "free")
                          رایگان

                            @elseif($course->type == "vip")
                            مخصوص اعضای ویژه

                            @else
                            نقدی
                        @endif

                    </td>
                    <td>
                        <form action="{{route('courses.destroy',['id'=>$course->id])}}" method="post">
                            {{method_field('delete')}}
                            {{csrf_field()}}
                            <div class="btn-group btn-group-xs">
                                <a class="btn btn-success" href="{{route('courses.edit' , ['id'=>$course->id])}}"><i class="fa fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger" ><i class="fa fa-trash"></i></button>
                            </div>
                        </form>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            {!! $courses->render() !!}
        </div>
    </div>
@endsection
