@extends('userDashboard.master')
@section('content')
    <div class="container-fluid px-4 pt-5">
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>sl No</th>
                        <th>title</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i=1; @endphp
                    @foreach($blogs as $blog)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{ substr($blog->title, 0, 15) }}</td>
                            <td><img style="width: 50px;height: 50px" src="{{asset($blog->image)}}" alt=""></td>
                            <td>{!! substr($blog->description, 0, 30) !!}</td>
                            <td>{{ $blog->status==1?'published':'unpublished' }}</td>
                            <td >
                                @if($blog->status==1)
                                    <a href="{{ route('status',['id'=>$blog->id]) }}" class="btn btn-warning"><i class="fas fa-times-circle"></i>
                                    </a>
                                @else
                                    <a href="{{ route('status',['id'=>$blog->id]) }}" class="btn btn-primary"><i class="fas fa-check-circle"></i></a>
                                @endif
                                    <a href="{{ route('edit-blog',['id'=>$blog->id]) }}" class="btn btn-outline-primary"><i class="fas fa-pencil"></i> </a>&nbsp;
                                    <form action="{{ route('delete-blog') }}" method="post" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                        <button class="btn btn-outline-danger" onclick="return confirm('Are you Sure to delete this product?')"> <i class="fas fa-trash-alt"></i></button>&nbsp;
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

