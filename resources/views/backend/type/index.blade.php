@extends('backend.layouts.app')

@section('title', app_name() . ' | Type List')

@section('breadcrumb-links')
    @include('backend.type.include.links')
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Food <small class="text-muted">List</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">

            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($types as $key => $type)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $type->name }}</td>
                                <td>{{ $type->description }}</td>
                                <th>
                                    <a href="{{ route('admin.auth.type.edit', $type->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="{{ route('admin.auth.type.delete', $type->id) }}" onclick="return confirm('Are you sure want to delete this type?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>

                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $types->total() !!} {{ trans_choice('Items Total', $types->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $types->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
