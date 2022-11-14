@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('home') }}" class="btn btn-md btn-info" style="margin-right: 5px;">Home</a>
                    <a href="{{ route('population.create') }}" class="btn btn-md btn-success">Add</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.N.</th>
                                <th scope="col">Country</th>
                                <th scope="col">City</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Group</th>
                                <th scope="col">Population</th>
                                <th scope="col">Created</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($population as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ ucfirst($data->country->country_name) }}</td>
                                <td>{{ ucfirst($data->city->city_name) }}</td>
                                <td>{{ ucfirst($data->gender->gender_title) }}</td>
                                <td>{{ ucfirst($data->group->group_title) }}</td>
                                <td>{{ ucfirst($data->created }}</td>
                                <td>{{ number_format($data->population, 0, ',') }}</td>
                                <td>
                                    <a href="{{ route('population.edit', $data->id) }}" class="btn btn-sm btn-success" style="margin-right: 5px;">Edit</a>
                                    <a href="{{ route('population.destroy', $data->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">No Data To Display.</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            {{ $population->links() }}
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
