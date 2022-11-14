<table class="table tableGroup">
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
            <th scope="row">
                {{ number_format($group->population->sum('population'), 3, ',') }}
            </th>
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

