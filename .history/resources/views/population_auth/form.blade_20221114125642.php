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
                            {{-- Logo --}}
                            <div class="@if(isset($institution) && $institution->institution_logo) col-md-3 @else col-md-6 @endif form-group">
                                <label class="form-label">Upload Logo <span class="text-danger">*</span></label>
                                <input type="file" name="institution_logo" class="dropify" data-height="180" />
                                @if ($errors->has('institution_logo'))
                                    <div class="alert alert-danger">{{ $errors->first('institution_logo') }}</div>
                                @endif
                            </div>
                            @if(isset($institution) && $institution->institution_logo && file_exists('storage/institution/thumbnails/institution_logo/' . $institution->institution_logo))
                            <div class="col-md-3 form-group">
                                <img class="m-5" src="{{ asset('storage/institution/thumbnails/institution_logo/' . $institution->institution_logo) }}" style="width: 150px; height: 150px;"/>
                            </div>
                            @endif
                            {{-- Institution Website URL --}}
                            <div class="form-group col-md-3">
                                <label class="form-label">Website URL<span class="text-danger">*</span></label>
                                {{ Form::url('website_url', null,
                                    [
                                        'class'=>'form-control w-100',
                                        'placeholder' => 'Eg:www.hamropaathashala.com',
                                        'required'
                                    ])
                                }}
                                @if ($errors->has('website_url'))
                                    <div class="alert alert-danger">{{ $errors->first('website_url') }}</div>
                                @endif
                            </div>
                            {{-- Institution Address --}}
                            <div class="form-group col-md-3">
                                <label class="form-label">Address<span class="text-danger">*</span></label>
                                {{ Form::text('institution_address', null,
                                    [
                                        'class'=>'form-control w-100',
                                        'placeholder' => 'Address',
                                        'required'
                                    ])
                                }}
                                @if ($errors->has('institution_address'))
                                    <div class="alert alert-danger">{{ $errors->first('institution_address') }}</div>
                                @endif
                            </div>
                            {{-- Institution Email. --}}
                            <div class="form-group col-md-3">
                                <label class="form-label">Email<span class="text-danger">*</span></label>
                                {{ Form::text('institution_email', null,
                                    [
                                        'class'=>'form-control w-100',
                                        'placeholder' => 'Email.',
                                        'required'
                                    ])
                                }}
                                @if ($errors->has('institution_email'))
                                    <div class="alert alert-danger">{{ $errors->first('institution_email') }}</div>
                                @endif
                            </div>
                            {{-- Institution contact No. --}}
                            <div class="form-group col-md-3">
                                <label class="form-label">Contact No<span class="text-danger">*</span></label>
                                {{ Form::text('contact_no', null,
                                    [
                                        'class'=>'form-control w-100',
                                        'placeholder' => 'Contact No.',
                                        'required'
                                    ])
                                }}
                                @if ($errors->has('contact_no'))
                                    <div class="alert alert-danger">{{ $errors->first('contact_no') }}</div>
                                @endif
                            </div>
                            {{-- Acceptance Rate --}}
                            <div class="form-group col-md-2">
                                <label class="form-label">Acceptance Rate<span class="text-danger">*</span></label>
                                {{ Form::text('acceptance_rate', null,
                                    [
                                        'class'=>'form-control w-100',
                                        'placeholder' => 'Acceptance Rate',
                                        'required'
                                    ])
                                }}
                                @if ($errors->has('acceptance_rate'))
                                    <div class="alert alert-danger">{{ $errors->first('acceptance_rate') }}</div>
                                @endif
                            </div>
                            {{-- No of Students --}}
                            <div class="form-group col-md-2">
                                <label class="form-label">No of Students<span class="text-danger">*</span></label>
                                {{ Form::text('no_of_students', null,
                                    [
                                        'class'=>'form-control w-100',
                                        'placeholder' => 'No of Students',
                                        'required'
                                    ])
                                }}
                                @if ($errors->has('no_of_students'))
                                    <div class="alert alert-danger">{{ $errors->first('no_of_students') }}</div>
                                @endif
                            </div>
                            {{-- Employment Rate --}}
                            <div class="form-group col-md-2">
                                <label class="form-label">Employment Rate<span class="text-danger">*</span></label>
                                {{ Form::text('employment_rate', null,
                                    [
                                        'class'=>'form-control w-100',
                                        'placeholder' => 'Employment Rate',
                                        'required'
                                    ])
                                }}
                                @if ($errors->has('employment_rate'))
                                    <div class="alert alert-danger">{{ $errors->first('employment_rate') }}</div>
                                @endif
                            </div>
                            {{-- Average Living  Cost --}}
                            <div class="form-group col-md-2">
                                <label class="form-label">Average Living  Cost<span class="text-danger">*</span></label>
                                {{ Form::text('average_living_cost', null,
                                    [
                                        'class'=>'form-control w-100',
                                        'placeholder' => 'Average Living  Cost',
                                        'required'
                                    ])
                                }}
                                @if ($errors->has('average_living_cost'))
                                    <div class="alert alert-danger">{{ $errors->first('average_living_cost') }}</div>
                                @endif
                            </div>
                            {{-- Work Premit --}}
                            <div class="form-group col-md-4">
                                <label class="form-label">Work Premit<span class="text-danger">*</span></label>
                                {{ Form::text('work_permit', null,
                                    [
                                        'class'=>'form-control w-100',
                                        'placeholder' => 'Work Premit',
                                        'required'
                                    ])
                                }}
                                @if ($errors->has('work_permit'))
                                    <div class="alert alert-danger">{{ $errors->first('work_permit') }}</div>
                                @endif
                            </div>
                            {{-- Featured Image --}}
                            <div class="@if(isset($institution) && $institution->institution_featured_image) col-md-3 @else col-md-6 @endif form-group">
                                <label class="form-label">Featured Images <span class="text-danger">*</span></label>
                                <input type="file" name="institution_featured_image" class="dropify" data-height="180" />
                                @if ($errors->has('institution_featured_image'))
                                    <div class="alert alert-danger">{{ $errors->first('institution_featured_image') }}</div>
                                @endif
                            </div>
                            @if(isset($institution) && $institution->institution_featured_image)
                            <div class="col-md-3 form-group">
                                <img class="m-5" src="{{ asset('storage/institution/thumbnails/institution_featured_image/' . $institution->institution_featured_image) }}" style="width: 150px; height: 150px;"/>
                            </div>
                            @endif
                            {{-- Featured Video --}}
                            <div class="form-group col-md-6">
                                <label class="form-label">Feature Video {Youtube URL}</label>
                                {{ Form::url('video_url', null,
                                    [
                                        'class'=>'form-control w-100',
                                        'placeholder' => 'Youtube Video {URL}',
                                    ])
                                }}
                                @if ($errors->has('video_url'))
                                    <div class="alert alert-danger">{{ $errors->first('video_url') }}</div>
                                @endif
                            </div>
                            {{-- Description --}}
                            <div class="form-group col-md-12">
                                <label class="form-label">Description<span class="text-danger">*</span></label>
                                {!! Form::textarea('institution_description', null,
                                    [
                                        'class'=>'form-control my-editor',
                                        'placeholder'=>'Please insert the Institution Description',
                                        'required'
                                    ])
                                !!}
                                @if ($errors->has('institution_description'))
                                    <div class="alert alert-danger">{{ $errors->first('institution_description') }}</div>
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
