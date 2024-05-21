<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>List</title>
</head>

<body>
    <h1>List Table</h1>

    <div class="container">
        @if(session('success'))
            <div class="bg-success text-white p-4">
               <p>{{ session('success') }}</p>
            </div>
        @endif
        <div class="mt-3" style="text-align: end;">
        <a href="{{ route('articles.add') }}" class="btn btn-primary">Add</a>    
        </div>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th scope="col">Srno</th>
                    <th scope="col">Article</th>
                    <th scope="col">Description</th>
                    <th scope="col">Author</th>
                    <th scope="col">Create on</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $key => $article)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->description }}</td>
                        <td>{{ $article->author }}</td>
                        <td>{{ $article->created_at->format('Y-m-d H:i:s') }}</td>
                        <!-- <td> 
                            <form action="{{ route('articles.delete', $article->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td> -->
                        <td>
                            <!-- Hidden form for deletion -->
                            <form id="delete-form-{{ $article->id }}" action="{{ route('articles.delete', $article->id) }}" method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <!-- Anchor tag to trigger form submission -->
                            <a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $article->id }}').submit();">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>

