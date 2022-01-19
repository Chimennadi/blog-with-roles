<x-admin-master>
    @section("content")
    <h1 class="h3 mb-0 text-gray-800">Create Post</h1>
    @csrf
    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
        </div>
        @csrf
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
    @stop
</x-admin-master>