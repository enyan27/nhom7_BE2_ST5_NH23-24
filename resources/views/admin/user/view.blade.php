@extends('admin.layout.master')

@section('title', 'View User')

@section('body')
     @if(session('success'))
     <div class="alert alert-success" role="alert">
        <strong>{{ session('success')}}</strong>
     </div>
     @endif
    <div class="details details2">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Employees List</h2>
                <a href="/admin/user/create" class="btn btn2">
                    <span class="icon"><ion-icon name="add-circle-outline"></ion-icon></span>
                    <span class="title">Create New Account</span>
                </a>
            </div>
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Full Name</td>
                        <td>Email</td>
                        <td>Level</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>#{{ $user->id }}</td>
                        <td>
                            <img class="user-img mr-10" src="{{ $user->avatar ?? '/storage/uploads/user/no_avatar.png'}}" alt="user-avatar">
                            <strong>{{ $user->fullname}}</strong>
                        </td>                                
                        <td>{{ $user->email}}</td>
                        <td>{{ level( $user->level) }}</td>
                        <td class="d-flex justify-content-end">
                            <a href="/admin/user/{{$user->id}}" class="btn mr-10">Detail</a>
                            <form method="POST" action="/admin/user/delete/{{$user->id}}"> 
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                    
                </tbody>
            </table>
            {{ $users->links()}}
        </div>

    </div>
            
@endsection