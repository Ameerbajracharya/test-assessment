@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                    </div>
                    <select name="country" class="form-select">
                        <option value="">All Countries</option>
                        <option value="">All Countries</option>
                        <option value="">All Countries</option>
                    </select>
                    <select name="city" class="form-select">
                        <option value="">All Cities</option>
                        <option value="">All Cities</option>
                        <option value="">All Cities</option>
                    </select>
                    <select name="gender" class="form-select">
                        <option value="">All Population</option>
                    </select>
                </div>

                <div class="card-body">
                    <table>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
