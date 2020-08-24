@extends('layouts.backend.dashboard')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>&nbsp;Phone Model</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Phone Model</a></li>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="row">            
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-header">
                        <a href="javascript:;" class="btn btn-primary btn-sm float-right mb-2" data-toggle="modal" data-target="#addModal">Add New</a>
                    </div>
                    <div class="tile-body table-responsive">
                        <table class="table table-hover table-bordered text-center" id="salesTable">
                            <thead>
                                <tr>
                                    <th style="width:50px">No</th>
                                    <th>Name</th>
                                    <th style="width: 100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="name">{{$item->name}}</td>
                                        <td class="action py-2">
                                            <a href="{{route('phone_model.delete', $item->id)}}" class="btn btn-danger btn-sm" onclick="return window.confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="20" class="text-center">No Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('phone_model.save')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
@endsection

@section('script')
    <script src="{{ asset('plugins/axios/axios.min.js') }}"></script>
@endsection