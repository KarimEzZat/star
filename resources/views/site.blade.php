@extends('layouts.front')

@section('title')

    <title>شركة فوم النجوم - عزل فوم بالرياض 549362523</title>
@endsection

@section('content')

    <!-- start Banner Area -->
    <section class="home-banner-area">
        <div class="container">
            <div class="row fullscreen d-flex align-items-center">
                <div class="mt-5 banner-content col-lg-8 col-md-12 justify-content-center ">
                    <div class="me mt-5">شركة فوم النجوم</div>
                    <h1>{{ $companies->first()->name }}</h1>
                    <div class="designation mb-50">
                        متخصصة في
                        <span class="designer">عزل الفوم</span>
                        وعزل
                        <span class="developer">الاسطح والخزانات</span> بالرياض
                    </div>
                    <a href="#footer" class="primary-btn transition" data-text="تواصل معنا">
                        <span>تواصل معنا</span>
                    </a>
                </div>


            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <section class="about-area section-gap" id="about">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5 col-md-12 about-right mb-lg-0 mb-4">
                    <!-- Section Title -->
                    <div class="section-title mb-50">
                        <h2>عن الشركة</h2>
                    </div>
                    <div>
                        {!! $companies->first()->description !!}
                    </div>
                </div>

                <div class="col-lg-6 about-left">
                    <img class="img-fluid" src="{{ asset('assets/Images/'.$companies->first()->photo) }}"
                         alt="شركة فوم النجوم - افضل شركة عزل فوم بالرياض">
                </div>
            </div>
        </div>
    </section>


    <section class="content-area section-gap" id="content">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-8">
                    <div class="section-title mb-50">
                        <h2>شركة عزل فوم بالرياض</h2>
                    </div>
                    <div class='content'>
                        <h2 class='mb-3'>{{ $contents->first()->title }}</h2>
                        <div class='content-img mb-3'>
                            <img class="img-fluid" src="{{ asset('assets/Images/'.$contents->first()->photo) }}"
                                 alt="شركة فوم النجوم - افضل شركة عزل فوم بالرياض">
                        </div>

                        <div class='content-desc'>
                            {!!  Str::limit($contents->first()->desc, 300) !!}

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>





    <section class="blog-area section-gap">
        <div class="container">
            <div class="row">
                @if(isset($articles))
                    @foreach($articles as $article)
                        <div class="col-lg-4 mb-3">
                            <!-- Start Single Blog -->
                            <article class="single-blog">
                                <!-- blog image -->
                                @if(isset($article->image))
                                    <div class="blog-img">
                                        <a href="{{ route('articles.show', $article->slug) }}">
                                            <img src="{{ asset('assets/Articles/img/'. $article->image) }}"
                                                 class="img-fluid"
                                                 alt="شركة فوم النجوم - افضل شركة عزل فوم بالرياض">
                                        </a>

                                        <!-- blog info date & writter -->

                                    </div>
                            @endif

                            <!-- blog header -->
                                <div class="blog-content">
                                    <h2 class="my-3">
                                        {{ $article->title }}
                                    </h2>
                                    <div>{!! $article->description !!}</div>
                                </div>
                                <div class='blog-btn mb-4'>
                                    <a href="{{ route('articles.show', $article->slug) }}"
                                       class="primary-btn transition" data-text="اقراء المزيد">
                                        <span>اقراء المزيد</span>
                                    </a>
                                </div>
                            </article>
                            <!-- End Single Blog -->
                        </div>
                    @endforeach
                    <div class="col-md-12 mt-4">
                        <!-- start blog pagination-->
                        <nav class="blog-pagination justify-content-center d-flex">
                            {{ $articles->links() }}
                        </nav>
                        <!-- end blog pagination --></div>

                @endif

            </div>


        </div>
    </section>





@endsection
