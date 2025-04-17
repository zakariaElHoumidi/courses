<table class="table table-striped">
    <thead>
        <tr>
            <th>Label</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($languages as $language)
            <tr>
                <th>{{ $language->label }}</th>
                <td>{{ $language->description }}</td>
                <td>
                    <button class="btn btn-outline-primary btn-sm">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    <button class="btn btn-outline-danger btn-sm">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
