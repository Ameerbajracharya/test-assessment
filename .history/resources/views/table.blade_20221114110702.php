<table  class="table">
    <thead>
        <tr>
            <th scope="col">Population Type</th>
            <th scope="col">Number</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($groups as $group)
        <tr>
            <td>{{ ucfirst($group->group_title) }}</td>
            <th scope="row">{{ number_format($group->population->sum('population'), 3, ',') }}</th>
        </tr>
        @empty
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
        @endforelse
    </tbody>
</table>
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
            <td>{{ number_format(()$country->population, 3, ',') }}</td>
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
