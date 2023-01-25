@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.constituency.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.constituencies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.constituency.fields.id') }}
                        </th>
                        <td>
                            {{ $constituency->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.constituency.fields.name') }}
                        </th>
                        <td>
                            {{ $constituency->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.constituencies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#constituency_members" role="tab" data-toggle="tab">
                {{ trans('cruds.member.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="constituency_members">
            @includeIf('admin.constituencies.relationships.constituencyMembers', ['members' => $constituency->constituencyMembers])
        </div>
    </div>
</div>

@endsection