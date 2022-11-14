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
                                <option value="">All Countries({{ number_format($total_population, 3, ',') }})</option>
                                @forelse ($countries_list as $country)
                                <option value="{{ $country->id }}">{{ ucfirst($country->country_name) }}( {{ number_format($country->population, 3, ',') }} )</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="city" id="city" class="form-select">
                                <option value="">All Cities</option>
                                @forelse ($cities as $city)
                                <option value="{{ $city->id }}">{{ ucfirst($city->city_name) }}( {{ number_format($city->population_sum_population, 3, ',') }} )</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="gender" id="gender" class="form-select">
                                <option value="">Population</option>
                                @forelse ($genders as $gender)
                                <option value="{{ $gender->id }}">{{ ucfirst($gender->gender_title) }}( {{ number_format($gender->population, 3, ',') }} )</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                    </div>

                </div>

                <div class="card-body">
                    @include('table')
                    <hr>
                    <h2><u>Summary Report</u></h2>
                    <p>Top Three country with highest Population</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.N.</th>
                                <th scope="col">Country Name</th>
                                <th scope="col">Population</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($countries as $country)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ ucfirst($country->country_name) }}</td>
                                <td>{{ number_format($country->population, 3, ',') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        //Country Wise City
        $('#country').change(function () {
            $("#city option").remove();
            var country_id = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('getCities') }}",
                method: "get",
                data: {
                    "country_id": country_id
                },
                beforeSend: function () {
                    $("#city").before('<div class="form-control course-loading"><i class="fa fa-spinner fa-spin"></i> Loading...</div>');
                },
                success: function (data1) {
                    var d = 0;
                    $.each(data1, function (key, value) {
                        $('#city')
                        .append($("<option></option>")
                        .attr("value", value.id)
                        .text(value.city_name + '(' + value.population  + ')'));
                        d = d + 1;
                    });
                    if (d === 1) {
                        $("#city").val(data1[0].id);
                    }
                },
                complete: function () {
                    $('.course-loading').remove();
                }
            })
        })
        //City Wise Gender's  Population
        $('#city').change(function () {
            $("#gender option").remove();
            var city_id = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('getGenderPopulation') }}",
                method: "get",
                data: {
                    "city_id": city_id
                },
                beforeSend: function () {
                    $("#gender").before('<div class="form-control course-loading"><i class="fa fa-spinner fa-spin"></i> Loading...</div>');
                },
                success: function (data1) {
                    var d = 0;
                    $.each(data1, function (key, value) {
                        $('#gender')
                        .append($("<option></option>")
                        .attr("value", value.id)
                        .text(value.gender_title + '(' + value.population  + ')'));
                        d = d + 1;
                    });
                    if (d === 1) {
                        $("#gender").val(data1[0].id);
                    }
                },
                complete: function () {
                    $('.course-loading').remove();
                }
            })
        })
        //Gender Wise Group Population
        
    })
</script>
@endsection
