@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($service) ? 'تعديل خدمة' : 'اضافة خدمة'}}
        </div>
        <div class="card-body">
            <form action="{{  isset($service) ? route('services.update', $service->id) : route('services.store')  }}"
                  method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($service))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="title">العنوان</label>
                    <input type="text" name="title" id="title" class="form-control"
                           value="{{ isset($service) ? $service->title : '' }}">
                    @if($errors->has('title'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('title')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">وصف المقال</label>
                    <textarea id="description" name="description" class="form-control"
                              class="">{{ isset($service) ? $service->description : '' }}</textarea>
                    @if($errors->has('description'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('description')}}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="image">رفع صورة</label>
                    <input type="file" id="image" name="image" class="form-control">
                    @if($errors->has('image'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('image')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    @if(isset($service))
                        <img width="400px" src="{{ asset('assets/services/img/'.$service->image) }}" alt="صورة الخدمة">
                    @endif
                </div>

                <div class="form-group d-flex justify-content-center">
                    <button class="primary-btn transition"
                            data-text="{{ isset($service) ? 'تحديث الخدمة' : 'رفع الخدمة' }}">
                        <span>
                            {{ isset($service) ? 'تحديث الخدمة' : 'رفع الخدمة' }}
                        </span>
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
