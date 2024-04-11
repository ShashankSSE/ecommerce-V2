@extends('components.app')
@section('title', 'Patakha')
@section('meta_description', '')
@section('meta_keywords','')
@section('content')
    <div class="container faq">
        <div class="heading">
            Faq's
        </div>
        <div class="accordion" id="accordionExample">
            @if(count($faqs)>0)
            @foreach($faqs as $faq) 
            <div class="accordion-item">
                <h2 class="accordion-header" id="faq_{{$faq->id}}">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefaq_{{$faq->id}}" aria-expanded="true" aria-controls="collapsefaq_{{$faq->id}}">
                    {{$faq->question}}
                </button>
                </h2>
                <div id="collapsefaq_{{$faq->id}}" class="accordion-collapse collapse show" aria-labelledby="faq_{{$faq->id}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {!!$faq->answere!!}
                    </div>
                </div>
            </div> 
            @endforeach
            @else
            <div class="accordion-item">
                <h2 class="accordion-header" id="faq">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefaq" aria-expanded="true" aria-controls="collapsefaq">
                    No FAQ's are available for now.
                </button>
                </h2>
                <div id="collapsefaq" class="accordion-collapse collapse show" aria-labelledby="faq" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        No FAQ's are available for now.
                    </div>
                </div>
            </div> 
            @endif
        </div>
    </div>
@endsection