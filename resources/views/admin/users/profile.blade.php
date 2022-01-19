<x-admin-master>
    @section("content")
    <h1 class="h3 mb-0 text-gray-800">User Profile : {{$user->name}}</h1>

    <div class="row" style="margin-top: 20px;">
        <div class="col-sm-6">
            <form action="{{route('user.profile.update', $user)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <input type="file" name="avatar">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" aria-describedby="" placeholder="Enter Username" value="{{$user->username}}">
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="" placeholder="Enter your name" value="{{$user->name}}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="" placeholder="Enter your email" value="{{$user->email}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" aria-describedby="" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" aria-describedby="" placeholder="Confirm Password">
                </div>
                @csrf
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-sm-12">
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Option</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Attach</th>
                                        <th>Detach</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Option</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Attach</th>
                                        <th>Detach</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($roles as $role)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="" id="" @foreach($user->roles as $user_role)
                                            @if($user_role->slug == $role->slug)
                                            checked
                                            @endif
                                            @endforeach
                                            >
                                        </td>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->slug}}</td>
                                        <td>
                                            <form action="{{route('user.role.attach', $user->id)}}" method="post">
                                                @csrf
                                                @method("PUT")
                                                <input type="hidden" name="role" value="{{$role->id}}">
                                                <button class="btn btn-primary" @if($user->roles->contains($role)) disabled @endif>Attach</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('user.role.detach', $user->id)}}" method="post">
                                                @csrf
                                                @method("PUT")
                                                <input type="hidden" name="role" value="{{$role->id}}">
                                                <button class="btn btn-danger" @if(!$user->roles->contains($role)) disabled @endif>Detach</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop
</x-admin-master>