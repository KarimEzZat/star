@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($faq) ? 'تعديل تاج' : 'اضافة تاج'}}
        </div>
        <div class="card-body">
            <form action="{{  isset($faq) ? route('faqs.update', $faq->id) : route('faqs.store')  }}"
                  method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($faq))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="tag">تاج</label>
                    <input type="text" name="tag" id="tag" class="form-control"
                           value="{{ isset($faq) ? $faq->tag : '' }}">
                    @if($errors->has('tag'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('tag')}}</span>
                    @endif
                </div>


                <div class="form-group d-flex justify-content-center">
                    <button class="primary-btn transition"
                            data-text="{{ isset($faq) ? 'تحديث التاج' : 'رفع التاج' }}">
                        <span>
                            {{ isset($faq) ? 'تحديث التاج' : 'رفع التاج' }}
                        </span>
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
