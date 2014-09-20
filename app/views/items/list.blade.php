@extends('layout.main')

@section('content')

<div class="block full">
        <!-- Table Styles Content -->
        <div class="table-responsive">
            <!--
            Available Table Classes:
                'table'             - basic table
                'table-bordered'    - table with full borders
                'table-borderless'  - table with no borders
                'table-striped'     - striped table
                'table-condensed'   - table with smaller top and bottom cell padding
                'table-hover'       - rows highlighted on mouse hover
                'table-vcenter'     - middle align content vertically
            -->
            <table id="general-table" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th style="width: 80px;" class="text-center"><label class="csscheckbox csscheckbox-primary"><input type="checkbox"><span></span></label></th>
                        <th>Label</th>
                        <th>Type</th>
                        <th>State</th>
                        <th style="width: 120px;" class="text-center"><i class="fa fa-flash"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td class="text-center"><label class="csscheckbox csscheckbox-primary"><input type="checkbox"><span></span></label></td>
                        <td><strong>{{ $item->label }}</strong></td>
                        <td>{{ $item->type->label }}</td>
                        <td>{{ $item->state->label }}</td>
                        <td class="text-center">
                            <a href="{{ URL::route('item-edit', $item->id) }}" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-sm btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit Item"><i class="fa fa-pencil"></i></a>
                            <a href="{{ URL::route('item-delete', $item->id) }}" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-sm btn-danger item-delete" style="overflow: hidden; position: relative;" data-original-title="Delete Item"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END Table Styles Content -->
    </div>

@stop