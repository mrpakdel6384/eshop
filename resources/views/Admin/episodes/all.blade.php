@extends('Admin.master')


@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>لیست دوره ها</h2>
            <a href="{{route('episodes.create')}}" class="btn btn-primary">ارسال دوره جدید</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>عنوان ویديو</th>
                    <th>تعداد نظرات</th>
                    <th>تعداد بازدید</th>
                    <th>تعداد شرکت کنندگان</th>
                    <th>تعداد دانلود </th>
                    <th>وضعیت دوره</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($episodes as $episode)
                <tr>
                    <td>{{$episode->title}}</td>
                    <td>{{$episode->commentCount}}</td>
                    <td>{{$episode->viewCount}}</td>
                    <td>1</td>
                    <td>{{$episode->downloadCount}}</td>
                    <td>
                        @if($episode->type == "free")
                            رایگان
                            @elseif($episode->type == "vip")
                            مخصوص اعضای ویژه
                            @else
                            نقدی
                        @endif
                    </td>
                    <td>
                        <form action="{{route('episodes.destroy',['id'=>$episode->id])}}" method="post">
                            {{method_field('delete')}}
                            {{csrf_field()}}
                            <div class="btn-group btn-group-xs">
                                <a class="btn btn-success" href="{{route('episodes.edit' , ['id'=>$episode->id])}}"><i class="fa fa-edit"></i></a>
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
            {!! $episodes->render() !!}
        </div>
    </div>
@endsection
