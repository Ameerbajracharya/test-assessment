@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('list.population') }}" class="btn btn-md btn-success">List</a>
                </div>

                <div class="card-body">
                    @isset($population)
                    {!! Form::model($population,
                        [
                            'method' => 'PUT',
                            'url' =>route('population.update', $population->id),
                        ])
                    !!}
                    @else
                    {!! Form::open(
                        [
                            'method' => 'POST',
                            'url' =>route('population.store'),
                        ])
                    !!}
                    @endisset
                    <div class="card-body p-0">
                        <div id="progressbarwizard" class="border pt-0">
                    
                            <div class="tab-content p-4">
                                <div id="bar" class="mb-5 br-5 progress progress-striped progress-bar-success-alt">
                                    <div class="bar progress-bar progress-bar-success bg-success br-5"></div>
                                </div>
                                {{-- Overviews --}}
                                @include('institution::components.overviewForm')
                                {{-- Information of Institution --}}
                                @include('institution::components.institutionInformationForm')
                                {{-- SEO --}}
                                <div class="tab-pane p-t-10 fade" id="tab_seo">
                                    @include('backend.components.seo')
                                </div>

                                <ul class="list-inline mb-0 wizard mb-0">
                                    <li class="previous list-inline-item"><a href="#" class="btn btn-secondary btn-sm mb-2 mb-sm-0 waves-effect waves-light"><i class="fa fa-backward" aria-hidden="true"></i> Previous</a></li>
                                    <li class="next list-inline-item float-right"><a href="#" class="btn btn-secondary btn-sm mb-0 waves-effect waves-light">Next <i class="fa fa-forward" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
