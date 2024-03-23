@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Task List') }}</div>

                    <form action="{{isset($edit) ? route('task.update',$edit->id):route('task.store')}}" method="post">
                        @csrf
                        @if(isset($edit))
                            @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" value="{{isset($edit) ? $edit->title:''}}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-3">
                                    <textarea rows="5" class="form-control  @error('description') is-invalid @enderror" name="description">{{isset($edit) ? $edit->description:''}}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary">{{isset($edit) ? "Update":'Save'}}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
