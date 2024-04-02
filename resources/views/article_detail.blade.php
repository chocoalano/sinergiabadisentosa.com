@extends('layouts.app')
@section('title', 'services')
@section('content-description', $content['article']->description)
@section('content-keyword', $content['article']->keywords)
@section('dark', 'light')
@section('css', '')
@section('js')
    <script>
        (function() {
            new HSHeader('#header').init()
            new HSShowAnimation('.js-animation-link')
            HSBsValidation.init('.js-validate', {
                onSubmit: data => {
                    data.event.preventDefault()
                    alert('Submited')
                }
            })
            HSBsDropdown.init()
            new HSGoTo('.js-go-to')
            AOS.init({
                duration: 650,
                once: true
            });
            new HSToggleSwitch('.js-toggle-switch')
        })()
    </script>
@endsection
@section('main')
    <main id="content" role="main">
        <!-- Article Description -->
        <div class="container content-space-t-3 content-space-t-lg-4 content-space-b-2">
            <div class="w-lg-65 mx-lg-auto">
                <div class="mb-4">
                    <h1 class="h2">{{ ucfirst($content['article']->title) }}</h1>
                </div>
                <p>{{ ucfirst($content['article']->description) }}</p>
            </div>
            @if (!is_null($content['article']->cover))
                <div class="my-4 my-sm-8">
                    <img class="img-fluid rounded-lg" src="{{ asset('storage/' . $content['article']->cover) }}"
                        alt="Image Description">
                </div>
            @endif
            <div class="w-lg-65 mx-lg-auto">
                {!! $content['article']->content !!}
                <!-- Badges -->
                <div class="mt-5">
                    @foreach ($content['article']->tags as $key => $v)
                        <a class="btn btn-soft-secondary btn-xs m-1"
                            href="{{ route('article.index', ['search' => $v->name]) }}">{{ ucfirst($v->name) }}</a>
                    @endforeach
                </div>
                <!-- End Badges -->
            </div>
        </div>
        <!-- End Article Description -->

        <!-- Card Grid -->
        @if ($content['articleRelated']->total() > 0)
            <div class="container">
                <div class="w-lg-75 border-top content-space-2 mx-lg-auto">
                    <div class="mb-3 mb-sm-5">
                        <h2>Related articles</h2>
                    </div>
                    <div class="row">
                        @foreach ($content['articleRelated'] as $k => $v)
                            <div class="col-md-6">
                                <div class="border-bottom h-100 py-5">
                                    <div class="row justify-content-between">
                                        <div class="col-6">
                                            <a class="text-cap" href="{{ route('article.show', $v->slug) }}">{{ ucfirst($v->title) }}</a>
                                            <div class="mb-0">
                                                {!! Str::limit($v->description, 100) !!}
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <img class="img-fluid rounded" src="{{ asset('storage/' . $v->cover) }}"
                                                alt="Image Description">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </main>
@endsection
