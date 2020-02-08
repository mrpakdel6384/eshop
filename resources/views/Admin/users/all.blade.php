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
                    <th> نام کاربر</th>
                    <th>امیل</th>
                    <th>وضعیت ایمیل</th>
                    <th>نقش</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>تایید شده</td>
                    <td></td>
                    <td>
                        <form action="{{route('users.destroy',['id'=>$user->id])}}" method="post">
                            {{method_field('delete')}}
                            {{csrf_field()}}
                            <div class="btn-group btn-group-xs">
                                <a class="btn btn-success" href="#"><i class="fa fa-edit"></i></a>
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
            {!! $users->render() !!}
        </div>
    </div>
@endsection
