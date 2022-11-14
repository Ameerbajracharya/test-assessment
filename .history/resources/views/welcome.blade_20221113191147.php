@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <select name="country" class="form-select">
                                <option value="">All Countries</option>
                                <option value="">All Countries</option>
                                <option value="">All Countries</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="city" class="form-select">
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
                    <table  class="table">
                        <thead>
                            <tr>
                              <th scope="col">Population Type</th>
                              <th scope="col">Number</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                <td>Mark</td>
                              <th scope="row">1</th>
                            </tr>
                            <tr>
                                <td>Jacob</td>
                              <th scope="row">2</th>
                            </tr>
                            <tr>
                                <td>Larry</td>
                              <th scope="row">3</th>
                            </tr>
                          </tbody>
                    </table>
                    <hr>
                    h2
                    <table class="table">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">First</th>
                              <th scope="col">Last</th>
                              <th scope="col">Handle</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                              <td>Mark</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                            </tr>
                            <tr>
                              <th scope="row">2</th>
                              <td>Jacob</td>
                              <td>Thornton</td>
                              <td>@fat</td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td>Larry</td>
                              <td>the Bird</td>
                              <td>@twitter</td>
                            </tr>
                          </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
