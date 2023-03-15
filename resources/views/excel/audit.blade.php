<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($audits as $audit)
            <tr>
                <td>{{ $audit->id }}</td>

                <td>{{ $audit->created_at }}</td>
                <td>{{ $audit->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>