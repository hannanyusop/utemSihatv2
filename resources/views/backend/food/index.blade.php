@extends('backend.layouts.app')

@section('title', app_name() . ' | Food List')

@section('breadcrumb-links')
    @include('backend.food.include.links')
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
                            <th>Type</th>
                            <th>Calorie (KCAL)</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($foods as $key => $food)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $food->name }}</td>
                                <td>{{ $food->type->name }}</td>
                                <td>{{ $food->calorie }}</td>
                                <th>
                                    <a href="{{ route('admin.auth.food.view', $food->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> View</a>
                                    <a href="{{ route('admin.auth.food.edit', $food->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="{{ route('admin.auth.food.delete', $food->id) }}" onclick="return confirm('Are you sure want to delete this item?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>

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
                    {!! $foods->total() !!} {{ trans_choice('Items Total', $foods->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $foods->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
