@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <select name="country" id="country" class="form-select">
                                <option value="">All Countries</option>
                                @forelse ($countries as $country)
                                <option value="{{ $country->id }}">{{ ucfirst($country->country_name) }}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="city" id="city" class="form-select">
                                <option value="">All Cities</option>
                                <option value="">All Cities</option>
                                <option value="">All Cities</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="gender" class="form-select">
                                <option value="">All Population</option>
                                <option value="">All Population</option>
                                <option value="">All Population</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="card-body">
                   @include('table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    //Country Wise State
    $('#country').change(function () {
        $("#city option").remove();
        var country_id = $(this).val();
        
    })
</script>
@endsection
