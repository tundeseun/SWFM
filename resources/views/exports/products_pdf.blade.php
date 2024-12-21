<!DOCTYPE html>
<html>

<head>
    <title>Product List</title>
</head>

<body>
    <h1>Product List</h1>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                {{-- <th>Image</th> --}}
                <th>S/N</th>
                <th>Name</th>
                <th>Code</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Unit</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    {{-- <td><img src="{{ $product->image }}" alt="{{ $product->name }}" width="50"></td> --}}

                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->brand->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->unit->name }}</td>
                    <td>{{ $product->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
