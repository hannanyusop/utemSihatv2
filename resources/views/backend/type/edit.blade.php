@extends('backend.layouts.app')

@section('title', app_name() . ' | Type Edit')

@section('breadcrumb-links')
    @include('backend.type.include.links')
@endsection
@section('content')
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header"><strong>Food</strong> Edit</div>
            {{ html()->modelForm($type)->method('POST')->class('form-horizontal')->open() }}
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="name">Name</label>
                    <div class="col-md-9">
                        {{ html()->text('name')->class('form-control')->required() }}
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="name">Description</label>
                    <div class="col-md-9">
                        {{ html()->textarea('description')->class('form-control')->required() }}
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
                <a href="{{ route('admin.auth.type.index') }}" class="btn btn-sm btn-danger"> Back</a>
            </div>
            {{ html()->form()->close() }}

        </div>
    </div>
@endsection
