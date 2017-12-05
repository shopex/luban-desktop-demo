@extends('admin::layout')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Cat {{ $cat->id }}
                    <a href="{{ url('/admin/cat') }}" title="返回"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    </div>
                    <div class="panel-body">

                        
                        <a href="{{ url('/admin/cat/' . $cat->id . '/edit') }}" title="Edit Cat"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/cat', $cat->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Cat',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $cat->id }}</td>
                                    </tr>
                                    <tr>
                    <th> 名称 </th>
                    <td> {{ $cat->name }} </td>
                </tr><tr>
                    <th> 排序 </th>
                    <td> {{ $cat->order_srot }} </td>
                </tr><tr>
                    <th> 父ID </th>
                    <td> {{ $cat->parent_id }} </td>
                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
