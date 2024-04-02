@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <i class="fa fa-building-o fa-2x mr-3"></i>
            المحتوى
        </div>
        <div class="card-body">
            @if($companies->count() > 0)
                <form action="{{ route('content.update', $contents->first()->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">العنوان</label>
                        <input type="text" name="title" id="title" class="form-control"
                               value="{{ $contents->first()->title }}">
                        @if($errors->has('title'))
                            <span class="text-danger font-weight-bold">* {{$errors->first('title')}}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="desc">الوصف</label>
                        <textarea name="desc" id="desc" cols="5" rows="5"
                                  class="form-control">{{ $contents->first()->desc }}</textarea>
                        @if($errors->has('desc'))
                            <span class="text-danger font-weight-bold">* {{$errors->first('desc')}}</span>
                        @endif
                    </div>





                    <div class="form-group">
                        <label for="photo">الصورة الخاصة بالمحتوى</label>
                        <input type="file" id="photo" name="photo" class="form-control">
                        @if($errors->has('photo'))
                            <span class="text-danger font-weight-bold">* {{$errors->first('photo')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        @if(isset($contents->first()->photo))
                            <img class="img-fluid" src="{{ asset('assets/Images/'. $contents->first()->photo) }}" alt="عن الشركة العزل والفوم">
                        @endif
                    </div>

                    <div class="form-group d-flex justify-content-center">
                        <button class="primary-btn transition"
                                data-text="تحديث الوصف">
                            <span>تحديث الوصف</span>
                        </button>
                    </div>

                </form>
            @else
                <h3 class="text-danger d-flex align-items-center justify-content-center">
                    <i class="fa fa-frown-o fa-2x mr-3"></i>
                    لا يوجد معلومات هنا
                </h3>
            @endif
        </div>
    </div>
@endsection
