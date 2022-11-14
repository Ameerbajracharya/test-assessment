@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            <h2>Add Population Details</h2>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('population.list') }}" class="btn btn-md btn-success" style="float:right;">List</a>
                        </div>
                    </div>
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
                        <div class="row">
                            {{-- Select Country --}}
                            <div class="form-group col-md-12">
                                <label class="form-label">Select Country <span class="text-danger">*</span></label>
                                {{ Form::select('country_id', $countries, isset($population) ? $population->country_id : null,
                                    [
                                        'class'=>'form-control select2',
                                        'id' => 'country',
                                        'placeholder' => 'Select Country',
                                        'required'
                                    ])
                                }}
                                @if ($errors->has('country_id'))
                                    <div class="alert alert-danger">{{ $errors->first('country_id') }}</div>
                                @endif
                            </div>

                            {{-- Institution Name --}}
                            <div class="form-group col-md-12">
                                <label class="form-label"><span class="text-danger">*</span></label>
                                {{ Form::text('institution_name', null,
                                    [
                                        'class'=>'form-control',
                                        'placeholder' => 'Name For Institution...',
                                        'required'
                                    ])
                                }}
                                @if ($errors->has('institution_name'))
                                    <div class="alert alert-danger mt-2">{{ $errors->first('institution_name') }}</div>
                                @endif
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
@endsection
