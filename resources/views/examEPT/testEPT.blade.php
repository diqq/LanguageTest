@extends('layouts.exam')
@section('content')
    <div class="flex w-full gap-5 max-md:block">
        @include('partials.testTakerProfile')
        <div class="w-3/5">
            <input type="hidden" value="{{ $category }}" id="Category">
            <input type="hidden" value="{{ $eptOpen->id }}" id="Exam-Id">
            @include('examEPT.partials.sectionOne.listeningCompPartA')
            @include('examEPT.partials.sectionOne.listeningCompPartB')
            @include('examEPT.partials.sectionOne.listeningCompPartC')
            @include('examEPT.partials.sectionTwo.structureExpression')
            @include('examEPT.partials.sectionTwo.writtenExpression')
            @include('examEPT.partials.sectionThree.readingComp')
            @include('examEPT.partials.finishPage')
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('js/examEPT.js') }}"></script>
    <script src="{{ asset('js/examGlobal.js') }}"></script>
@endpush
