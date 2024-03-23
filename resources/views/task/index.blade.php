@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Task List') }}
                    <a href="{{route('task.create')}}" class="btn btn-primary float-end">Create</a>
                </div>

                <div class="card-body">
                  <table class="table table-bordered">
                      <tr>
                          <th>#</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Action</th>
                      </tr>
                      @forelse($tasks as $key=>$task)
                      <tr>
                          <td>{{$key+1}}</td>
                          <td>{{isset($task->title) ? $task->title:''}}</td>
                          <td>{{isset($task->description) ? $task->description:''}}</td>
                          <td>
                              <a class="btn btn-primary" href="{{route('task.edit',$task->id)}}">Edit</a>
                              <a class="btn btn-danger" href="{{route('task.destroy',$task->id)}}"
                                 onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                  Delete
                              </a>
                              <form id="logout-form" action="{{route('task.destroy',$task->id)}}" method="POST" class="d-none">
                                  @csrf
                                  @method('delete')
                              </form>

                          </td>
                      </tr>
                          @empty
                          <tr class="mt-3">
                              <td colspan="4">
                                  <div class="alert alert-dark">No record found !</div>
                              </td>
                          </tr>
                          @endforelse
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
