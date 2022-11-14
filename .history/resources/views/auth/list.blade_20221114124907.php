@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="#" class="btn btn-md btn-success">Add</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.N.</th>
                                <th scope="col">Country Name</th>
                                <th scope="col">Population</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($countries as $country)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ ucfirst($country->country_name) }}</td>
                                <td>{{ number_format($country->population, 0, ',') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">No Data To Display.</td>
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
                    $('#gender')
                    .append($("<option selected></option>")
                    .attr("value", "")
                    .text(" Select Gender"));

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
        $('#gender').on('change', function(){
            var city_id = $('#city').val();
            var gender_id = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('getGroupPopulation') }}",
                method: "get",
                data: {
                    "city_id": city_id,
                    "gender_id": gender_id,
                },
                success:function(data){
                    $('.tableGroup').html(data)
                }
            })
        });
    })
</script>
@endsection
