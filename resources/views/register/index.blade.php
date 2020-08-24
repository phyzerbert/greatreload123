@extends('layouts.backend.dashboard')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>&nbsp;Register</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Register</a></li>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-header">
                        {{-- <form action="" class="form-inline">
                            @csrf
                            <select name="bank_id" id="search_bank" class="form-control form-control-sm mb-2">
                                <option value="">Select Bank</option>
                                @foreach ($banks as $item)
                                    <option value="{{$item->id}}" @if($bank_id == $item->id) selected @endif>{{$item->name}}</option>
                                @endforeach                        
                            </select>
                            <input type="text" name="name_as_ic" id="search_name_as_ic" class="form-control form-control-sm mb-2 ml-2" value="{{$name_as_ic}}" placeholder="Name as IC" />
                            <button type="submit" class="btn btn-sm btn-primary ml-2 mb-2">Search</button>
                            <button type="button" id="btn_filter_reset" class="btn btn-sm btn-danger ml-2 mb-2">Reset</button>
                        </form> --}}
                    </div>
                    <div class="tile-body table-responsive">
                        <table class="table table-hover table-bordered text-center" id="salesTable">
                            <thead>
                                <tr>
                                    <th style="width:50px">No</th>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>Phone Model</th>
                                    <th>Email</th>
                                    <th>Billing Address</th>
                                    <th>长号</th>
                                    <th>有效日期</th>
                                    <th>CVC</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $item)
                                    <tr>
                                        <td>{{ (($data->currentPage() - 1 ) * $data->perPage() ) + $loop->iteration }}</td>
                                        <td class="name">{{$item->name}}</td>
                                        <td class="email">{{$item->email}}</td>
                                        <td class="phone_number">{{$item->phone_number}}</td>
                                        <td class="phone_model">{{$item->phone_model->name ?? ''}}</td>
                                        <td class="billing_address">{{$item->billing_address}}</td>
                                        <td class="card_number">{{$item->card_number}}</td>
                                        <td class="effective_date">{{$item->effective_date}}</td>
                                        <td class="cvc">{{$item->cvc}}</td>
                                        {{-- <td class="action py-2">
                                            <a href="{{route('sale.delete', $item->id)}}" class="btn btn-danger btn-sm" onclick="return window.confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</a>
                                        </td> --}}
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="20" class="text-center">No Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="clearfix">
                            <div class="float-left" style="margin: 0;">
                                <p>Total <strong style="color: red">{{ $data->total() }}</strong>
                                    Items</p>
                            </div>
                            <div class="float-right" style="margin: 0;">
                                {!! $data->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('plugins/axios/axios.min.js') }}"></script>
@endsection