@extends('backend.layouts.app')

@section('title', app_name() . ' | Food List')

@section('breadcrumb-links')
    @include('backend.food.include.links')
@endsection
@section('content')
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header"><strong>Food</strong> View</div>
            {{ html()->modelForm($food)->method('POST')->class('form-horizontal')->open() }}
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="name">Name</label>
                    <div class="col-md-9">
                        {{ html()->text('name')->class('form-control')->readonly() }}
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="type">Type</label>
                    <div class="col-md-9">
                        {{ html()->text('type_id', $food->type->name)->class('form-control')->readonly() }}
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="name">Calorie</label>
                    <div class="col-md-9">
                        {{ html()->text('calorie')->class('form-control')->readonly() }}
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="name">Description</label>
                    <div class="col-md-9">
                        {{ html()->textarea('description')->class('form-control')->attribute('readonly', true) }}
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="name">Image</label>
                    <div class="col-md-9">
                        <img class="d-block w-50" src="{{ $food->image_url }}">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.auth.food.index') }}" class="btn btn-sm btn-danger"> Back</a>
            </div>
            {{ html()->form()->close() }}

        </div>
    </div>
@endsection
