<x-home-master>
    @section("content")
    <!-- Title -->
    <h1 class="mt-4">{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by
        <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>Posted on {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Post Content -->
    <p>{{$post->body}}</p>

    <hr>

    <!-- Comments Form -->
    <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-10">Submit</button>
            </form>
        </div>
    </div>
    @stop
</x-home-master>