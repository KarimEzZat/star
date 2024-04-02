@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($question) ? 'تعديل سؤال' : 'اضافة سؤال'}}
        </div>
        <div class="card-body">
            <form action="{{  isset($question) ? route('questions.update', $question->id) : route('questions.store')  }}"
                  method="post">
                @csrf
                @if(isset($question))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="questions">السؤال</label>
                    <input type="text" name="questions" id="questions" class="form-control"
                           value="{{ isset($question) ? $question->questions: '' }}">
                    @if($errors->has('questions'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('questions')}}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="answer">الاجابة</label>
                    <textarea name="answer" id="answer" class="form-control">{{ isset($question) ? $question->answer: '' }}</textarea>
                    @if($errors->has('answer'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('answer')}}</span>
                    @endif
                </div>


                <div class="form-group d-flex justify-content-center">
                    <button class="primary-btn transition"
                            data-text="{{ isset($question) ? 'تحديث السؤال' : 'رفع السؤال' }}">
                        <span>
                            {{ isset($question) ? 'تحديث السؤال' : 'رفع السؤال' }}
                        </span>
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
