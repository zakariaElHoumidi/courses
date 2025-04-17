<table class="table table-striped">
    <thead>
        <tr>
            <th>Label</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <th>{{ $category->label }}</th>
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
