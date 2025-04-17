<table class="table table-striped">
    <thead>
        <tr>
            <th>Label</th>
            <th>Description</th>
            <th>Category</th>
            <th>Language</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($concepts as $concept)
            <tr>
                <th>{{ $concept->label }}</th>
                <td>{{ $concept->description }}</td>
                <td>{{ $concept->category->label }}</td>
                <td>{{ $concept->language->label }}</td>
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
