@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('list.population') }}" class="btn btn-md btn-success">List</a>
                </div>

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
                    <div class="card-body">
                   
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
