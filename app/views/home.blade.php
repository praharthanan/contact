@extends('templates.page')


@section('title')
<title>Address Book</title>
@stop

@section('header')
<div class="row mainbox">
    <div class="col-xs-5">
        <h2>Contacts</h2>
    </div>
    <div class='main-header-controls col-xs-2 text-right'>
        <div class="input-group">
            <span class="input-group-btn">
                <a class="btn btn-success create" data-toggle="modal" data-target="#create" title="Create"><i class="fa fa-plus"></i></a>
            </span>
        </div>
    </div>
    <div class="col-xs-3 text-right">

        {{ Form::open(array('url' => URL::to('admin/contacts/search'),'method' => 'GET')) }}
        <?php
        $searchVal = '';
        if (isset($_GET["search_name"]) && !empty($_GET["search_name"])) {
            $searchVal = $_GET["search_name"];
        }
        ?>
        <div class="input-group">
            {{ Form::text('search_name', $searchVal, array('class' => 'form-control', 'placeholder' => 'Name')) }}
            <span class="input-group-btn">
                <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
            </span>
        </div>
        {{ Form::close() }}

    </div>
    <div class="col-xs-2 text-right">
        <a class="btn btn-success" href="{{URL::to('admin/contacts')}}">Clear Filter</a>
    </div>

</div>
@stop

@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>e-Mail</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->phone }}</td>
            <td>{{ $contact->address }}</td>
            <td>{{ $contact->email }}</td>
            <td>
                <a class="btn btn-warning ui-component-tooltip edit" href="" data-id='{{ $contact->id }}' data-contact='{{ $contact }}' data-placement="rigth" data-toggle="modal" data-target="#edit" title="Edit"><i class="fa fa-edit"></i></a>
                <a href="{{URL::to('admin/contact/' . $contact->id . '/delete')}}" class="btn btn-danger ui-action-delete ui-component-tooltip" data-placement="right" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div id="create" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Contact - Create</h4>
            </div>
            <div class="modal-body">

                {{ Form::open(array(
				'url'	 => '',
				'method' => 'POST',
				'class'	 => 'form-horizontal',
				'role'   => 'form',
				'id' =>'create-contact'
				)) }}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-8">
                        {{ Form::text('name', '',  array('class' => 'form-control', 'required'=>'required', 'placeholder' => 'Name', 'id'=>'name')) }}
                        {{ $errors->first('name', '<span class="help-block">:message</span>') }}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <label for="phone" class="col-lg-2 control-label">Phone Number</label>
                    <div class="col-lg-8">
                        {{ Form::number('phone', '', array('class' => 'form-control', 'required'=>'required', 'placeholder' => 'Phone Number', 'id'=>'phone')) }}
                        {{ $errors->first('phone', '<span class="help-block">:message</span>') }}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                    <label for="address" class="col-lg-2 control-label">Address</label>
                    <div class="col-lg-8">
                        {{ Form::textarea('address', '', array('class' => 'form-control vresize', 'placeholder' => 'Address', 'id'=>'address')) }}
                        {{ $errors->first('address', '<span class="help-block">:message</span>') }}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-8">
                        {{ Form::email('email', '',  array('class' => 'form-control', 'required'=>'required','placeholder' => 'Email', 'id'=>'email')) }}
                        {{ $errors->first('email', '<span class="help-block">:message</span>') }}
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="save-contact" class="btn btn-primary" type="submit" >Save</button>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                </div>

                {{ Form::close() }}

            </div>
        </div>
    </div>
</div>

<div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Contact - Edit</h4>
            </div>
            <div class="modal-body">

                {{ Form::open(array(
				'url'	 => '',
				'method' => 'POST',
				'class'	 => 'form-horizontal',
				'role'   => 'form',
				'id' =>'edit-contact'
				)) }}

                <div class="form-group {{ $errors->has('edit-name') ? 'has-error' : '' }}">
                    <label for="edit-name" class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-8">
                        {{ Form::text('edit-name', '',  array('class' => 'form-control', 'required'=>'required', 'placeholder' => 'Name', 'id'=>'edit-name')) }}
                        {{ $errors->first('edit-name', '<span class="help-block">:message</span>') }}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('edit-phone') ? 'has-error' : '' }}">
                    <label for="edit-phone" class="col-lg-2 control-label">Phone Number</label>
                    <div class="col-lg-8">
                        {{ Form::number('edit-phone', '', array('class' => 'form-control', 'required'=>'required', 'placeholder' => 'Phone Number', 'id'=>'edit-phone')) }}
                        {{ $errors->first('edit-phone', '<span class="help-block">:message</span>') }}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('edit-address') ? 'has-error' : '' }}">
                    <label for="edit-address" class="col-lg-2 control-label">Address</label>
                    <div class="col-lg-8">
                        {{ Form::textarea('edit-address', '', array('class' => 'form-control vresize', 'placeholder' => 'Address', 'id'=>'edit-address')) }}
                        {{ $errors->first('edit-address', '<span class="help-block">:message</span>') }}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('edit-email') ? 'has-error' : '' }}">
                    <label for="email" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-8">
                        {{ Form::email('edit-email', '',  array('class' => 'form-control', 'required'=>'required','placeholder' => 'Email', 'id'=>'edit-email')) }}
                        {{ $errors->first('edit-email', '<span class="help-block">:message</span>') }}
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" >Edit</button>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                </div>

                {{ Form::close() }}

            </div>
        </div>
    </div>
</div>

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 6)
<script>
    $(function () {
        $('#edit').modal('show');
    });
</script>
@endif


@stop

@section('footer-nav')
<div class="text-right">
    {{ $contacts->appends(Input::except(array('page')))->links() }}
</div>
@stop

@section('script')
<script>

    $(".create").click(function () {
        $('#create-contact').attr('action', '{{URL::to("admin/contact/store")}}');
    });

    $(".edit").click(function () {
        var id = $(this).data().id;
        var contact = $(this).data().contact;
        var name = contact.name;
        var phone = contact.phone;
        var address = contact.address;
        var email = contact.email;
        $('#edit-name').val(name);
        $('#edit-phone').val(phone);
        $('#edit-address').val(address);
        $('#edit-email').val(email);
        $('#edit-contact').attr('action', '{{ URL::to("admin/contact")}}/' + id + '/update');
    });
</script>
@if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
<script>
    $(function () {
        $('#create').modal('show');
    });
</script>
@endif
@stop
