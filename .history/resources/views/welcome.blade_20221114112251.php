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
                                <option value="">All Cities({{ number_format($total_population, 3, ',') }})</option>
                                @forelse ($cities as $city)
                                <option value="">All Cities</option>
                                @empty

                                @endforelse
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
                method: "POST",
                data: {
                    "country_id": country_id
                },
                beforeSend: function () {
                    $("#city").before('<div class="form-control course-loading"><i class="fa fa-spinner fa-spin"></i> Loading...</div>');
                },
                success: function (data1) {
                    $('#city')
                    .append($("<option selected disabled></option>")
                    .attr("value", "")
                    .text("All Cities"));

                    var d = 0;
                    $.each(data1, function (key, value) {
                        $('#city')
                        .append($("<option></option>")
                        .attr("value", value.id)
                        .text(value.city_name));
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
    })
</script>
@endsection
