@extends('layouts.app')

@section('content')
    <div class="mb-3 mt-3 mt-lg-0">
        <a href="{{ route('articles.create') }}" class="primary-btn transition" data-text="اضافة مقال">
            <span>اضافة مقال</span>
        </a>
    </div>
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <i class="fa fa-paragraph fa-2x mr-3"></i>
            المقالات
        </div>
        <div class="card-body">
            @if($articles->count() > 0)
                <table class="table articles-table">
                    <thead>
                    <tr>
                        <th>الصورة</th>
                        <th>العنوان</th>
                        <th>الوصف</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>
                                <img width="200px" src="{{ asset('assets/Articles/img/'.$article->image) }}" alt="article image">
                            </td>
                            <td>{{ $article->title }}</td>
                            <td>{{Str::limit($article->description, 100)}}</td>
                            <td>
                                <a href="{{ route('articles.edit', $article->slug) }}" class="primary-btn transition"
                                   data-text="تعديل">
                                    <span>تعديل</span>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('articles.destroy', $article->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="primary-btn transition red" data-text="حذف">
                                        <span>حذف</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4 d-flex justify-content-between align-items-center">
                    <p>اظهار من {{ $articles->firstItem() }} لـ {{ $articles->lastItem() }} من أصل {{ $articles->total() }} مقالات</p>
                    <ul class="pagination pagination-sm justify-content-center">
                        <form class="form-inline" action="" method="get">
                            <div class="form-group">
                                <label for="perPage">عدد الفيديوهات في الصفحة</label>
                                <select class="form-control-sm ml-3 mr-3" name="perPage" id="perPage" onchange="this.form.submit()">
                                    <option value="5" @if($articles->perPage() == 5) selected @endif>5</option>
                                    <option value="10" @if($articles->perPage() == 10) selected @endif>10</option>
                                    <option value="15" @if($articles->perPage() == 15) selected @endif>15</option>
                                    <option value="20" @if($articles->perPage() == 20) selected @endif>20</option>
                                </select>
                            </div>
                            {{ $articles->appends(['perPage' => $articles->perPage()])->links() }}
                        </form>
                    </ul>
                </div>
            @else
                <h3 class="text-danger d-flex align-items-center justify-content-center">
                    <i class="fa fa-frown-o fa-2x mr-3"></i>
                    لا يوجد اي مقالات هنا
                </h3>
            @endif
        </div>
    </div>
@endsection
