<table>
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>description</th>
            <th>template</th>
            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($audits as $audit)
            <tr>
                <td>{{ $audit->id }}</td>
                <td>{{ $audit->name }}</td>
                <td>{{ $audit->description }}</td>
                <td>{{ $audit->template }}</td>
                <td>{{ $audit->created_at }}</td>
                <td>{{ $audit->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>