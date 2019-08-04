@extends('front')

@section('content')
    <div class="filter-content">
{{--        {{$questions}}--}}
        @forelse ($questions as $question)
            <a href="#" class="list-group-item">{{$question->title}}<span
                    class="float-right badge badge-light">15</span> </a>
            @empty
                <h2>No questions!</h2>
        @endforelse


    </div>
    {{--    <div class="filter-content">--}}
    {{--        <div class="list-group list-group-flush">--}}
    {{--            <a href="#" class="list-group-item">Laravel<span--}}
    {{--                    class="float-right badge badge-light">15</span> </a>--}}
    {{--            <a href="#" class="list-group-item">Vue.js<span--}}
    {{--                    class="float-right badge badge-light">12</span> </a>--}}
    {{--            <a href="#" class="list-group-item">Javascript<span--}}
    {{--                    class="float-right badge badge-light">10</span> </a>--}}
    {{--            <a href="#" class="list-group-item">Hardware<span--}}
    {{--                    class="float-right badge badge-light">14</span> </a>--}}
    {{--        </div>  <!-- list-group .// -->--}}
    {{--    </div>--}}
@endsection

