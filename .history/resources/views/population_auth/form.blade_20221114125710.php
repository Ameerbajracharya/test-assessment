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
                        <div class="row">
                            {{-- Select Country --}}
                            <div class="form-group col-md-3">
                                <label class="form-label">Select Country <span class="text-danger">*</span></label>
                                {{ Form::select('country_id', $countries, isset($institution) ? $institution->state->country_id : null,
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
                            {{-- Select State --}}
                            <div class="form-group col-md-3">
                                <label class="form-label">Select State <span class="text-danger">*</span></label>
                                {{ Form::select('state_id', isset($state) ? $state : [], isset($institution) ? $institution->state_id : null,
                                    [
                                        'class'=>'form-control select2',
                                        'id' => 'state',
                                        'placeholder' => 'Select Country First',
                                        'required'
                                    ])
                                }}
                                @if ($errors->has('state_id'))
                                    <div class="alert alert-danger">{{ $errors->first('state_id') }}</div>
                                @endif
                            </div>
                            {{-- Select Institution Type --}}
                            <div class="form-group col-md-3">
                                <label class="form-label">Select Institution Type <span class="text-danger">*</span></label>
                                {{ Form::select('institution_type_id', $institutionTypes, isset($institution) ? $institution->institution_type_id : null,
                                    [
                                        'class'=>'form-control select2',
                                        'id'=>'institutionType',
                                        'placeholder' => 'Select Institution Type',
                                        'required'
                                    ])
                                }}
                                @if ($errors->has('institution_type_id'))
                                    <div class="alert alert-danger">{{ $errors->first('institution_type_id') }}</div>
                                @endif
                            </div>
                            {{-- Select University --}}
                            <div class="form-group col-md-3 university">
                                <label class="form-label">Select University <span class="text-danger">*</span></label>
                                {{ Form::select('institution_id', isset($university) ? $university : [], isset($university) ? $university->institution_id : null,
                                    [
                                        'class'=>'form-control select2',
                                        'id'=>'university',
                                        'placeholder' => 'Select University',
                                        'disabled' => 'true'
                                    ])
                                }}
                                @if ($errors->has('institution_id'))
                                    <div class="alert alert-danger">{{ $errors->first('institution_id') }}</div>
                                @endif
                            </div>
                            {{-- Institution Name --}}
                            <div class="form-group col-md-6">
                                <label class="form-label">Institution Name<span class="text-danger">*</span></label>
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
