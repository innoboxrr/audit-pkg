<table>
    <thead>
        <tr>
            <th>id</th>
            <th>type</th>
            <th>actionable_id</th>
            <th>actionable_type</th>
            <th>description</th>
            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($audits as $audit)
            <tr>
                <td>{{ $audit->id }}</td>
                <td>{{ $audit->type }}</td>
                <td>{{ $audit->actionable_id }}</td>
                <td>{{ $audit->actionable_type }}</td>
                <td>{{ $audit->description }}</td>
                <td>{{ $audit->created_at }}</td>
                <td>{{ $audit->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>