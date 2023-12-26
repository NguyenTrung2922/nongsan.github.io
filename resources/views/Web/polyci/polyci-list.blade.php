@extends('Web.main')

@section('content')

<section id="content" class="clearfix container">



    @include('Web.sidebar')


    <div>
        @foreach($postObject as $post)
        <div class="col-md-9" id="layout-page">
            <span class="header-page clearfix">
                <h1>{{$post->name}}</h1>
            </span>

            <div class="content-page">
                {!! $post->content !!}
            </div>
        </div>
        @endforeach
    </div>

</section>


@endsection



@section('footer')
@include('Web.footer')
@endsection