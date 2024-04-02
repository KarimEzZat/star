@extends('layouts.front')

@section('title')

    <title>{{ isset($article) ? $article->title : 'المدونة' }}</title>
@endsection

@section('content')

    <section class="banner-area relative">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        {{ isset($article) ? $article->title : 'المقالات' }}
                    </h1>
                    <p class="link-nav">
                            <span class="box transition">
                                <a href="{{route('welcome')}}">الرئيسيه </a>
                            </span>
                    </p></div>
            </div>
        </div>
    </section>

    <section class="blog-area section-gap">
        <div class="container">

            <div class="row">
                @if(isset($article))
                    <div class="col-lg-12 mb-3">
                        <!--Start Single Blog -->
                        <div class="single-blog">
                            <div class="blog-img mb-3">
                                <img src="{{ asset('assets/Articles/img/'. $article->image) }}" class="img-fluid"
                                     alt="شركة عزل الاسطح و الخزانات وعزل الفوم بالرياض">
                                <!--blog info date & writter -->

                            </div>

                            <!--blog header -->
                            <div class="blog-content">

                                <div>{!! $article->description  !!}</div>
                            </div>
                        </div>
                        <!--End Single Blog -->
                    </div>
                @endif
            </div>

        </div>
    </section>


    <section class="question-area section-gap" id="question">
        <div class="container">
            <div class="section-title mb-50">
                <h2>اسئلة شائعة</h2>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    @if(isset($questions))
                        @foreach($questions as $question)
                            <div class='content'>
                                <h2 class="mb-3">{{ $question->questions }}</h2>

                                <div>{!! $question->answer!!}</div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
