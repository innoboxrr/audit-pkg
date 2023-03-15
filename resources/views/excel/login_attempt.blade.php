<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($login_attempts as $login_attempt)
            <tr>
                <td>{{ $login_attempt->id }}</td>

                <td>{{ $login_attempt->created_at }}</td>
                <td>{{ $login_attempt->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>