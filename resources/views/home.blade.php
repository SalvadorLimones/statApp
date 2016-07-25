@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Select site page</div>

                <div class="panel-body">
                    <div class="form-group">
                    {!! Form::open(array('url' => 'stat')) !!}
                        {!! Form::select('pages', array(
                            'all' => 'All Site',
                            'site' => 'Site page',
                            'stat' => 'Stat page',
                            'login' => 'Login page',
                            'logout' => 'Logout page',
                            '3' => 'Article page 3',
                            '4' => 'Article page 4',
                            '5' => 'Article page 5',
                            '6' => 'Article page 6',
                            '7' => 'Article page 7',
                            '8' => 'Article page 8',
                            '9' => 'Article page 9',
                            '10' => 'Article page 10'
                            ), 'all'); !!}

                        {!! Form::submit('select') !!}

                    {!! Form::close() !!}
                    </div>
                </div>

            </div>            
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">Browser</div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                            <thead>
                                <tr>
                                    <th>Browser</th>
                                    <th>Hits</th>
                                    <th>Unique IP</th>
                                    <th>Unique Cookie</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td class="table-text"><div>Chrome</div></td>
                                        <td class="table-text"><div>1</div></td>
                                        <td class="table-text"><div>1</div></td>
                                        <td class="table-text"><div>1</div></td>

                                        <!-- <td>
                                            <form action="/" method="POST">
                                                <input type="hidden" name="_token" value="7q4zpcvbwCptLYPGvNVXliFCygj1taY6Y3w3Snpm">
                                                <input type="hidden" name="_method" value="DELETE">

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td> -->
                                    </tr>
                            </tbody>
                        </table>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">OS</div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                            <thead>
                                <tr>
                                    <th>OS</th>
                                    <th>Hits</th>
                                    <th>Unique IP</th>
                                    <th>Unique Cookie</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="table-text"><div>Win</div></td>
                                    <td class="table-text"><div>1</div></td>
                                    <td class="table-text"><div>1</div></td>
                                    <td class="table-text"><div>1</div></td>

                                    <!-- <td>
                                        <form action="/" method="POST">
                                            <input type="hidden" name="_token" value="7q4zpcvbwCptLYPGvNVXliFCygj1taY6Y3w3Snpm">
                                            <input type="hidden" name="_method" value="DELETE">

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    </td> -->
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Geo</div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                            <thead>
                                <tr>
                                    <th>Country</th>
                                    <th>Hits</th>
                                    <th>Unique IP</th>
                                    <th>Unique Cookie</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="table-text"><div>Russia</div></td>
                                    <td class="table-text"><div>1</div></td>
                                    <td class="table-text"><div>1</div></td>
                                    <td class="table-text"><div>1</div></td>

                                    <!-- <td>
                                        <form action="/" method="POST">
                                            <input type="hidden" name="_token" value="7q4zpcvbwCptLYPGvNVXliFCygj1taY6Y3w3Snpm">
                                            <input type="hidden" name="_method" value="DELETE">

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    </td> -->
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Ref</div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                            <thead>
                                <tr>
                                    <th>Ref</th>
                                    <th>Hits</th>
                                    <th>Unique IP</th>
                                    <th>Unique Cookie</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="table-text"><div>yandex.ru</div></td>
                                    <td class="table-text"><div>1</div></td>
                                    <td class="table-text"><div>1</div></td>
                                    <td class="table-text"><div>1</div></td>

                                    <!-- <td>
                                        <form action="/" method="POST">
                                            <input type="hidden" name="_token" value="7q4zpcvbwCptLYPGvNVXliFCygj1taY6Y3w3Snpm">
                                            <input type="hidden" name="_method" value="DELETE">

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    </td> -->
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
