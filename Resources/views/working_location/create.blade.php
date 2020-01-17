<div class="col-md-12">
    <div class="row"
         id="add-form" {!! count($errors) == 0 ? "style='display: none;'" : '' !!}>
        <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <h4>Add Working Location</h4>
                </div>
                <div class="portlet-body">
                    <form id="form" action="{{ route('working-location.store') }}" method="POST">
                        @csrf
                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label for="code">Code</label>
                            <input type="text" name="code" class="form-control"
                                   value='{{ old('code') }}'/>
                            @if ($errors->has('code'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control"
                                   value='{{ old('name') }}'/>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" rows="2" name="description" placeholder="Textarea">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
                            <label for="active">Active</label>
                            <select name="is_active" class="form-control">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            @if ($errors->has('active'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('active') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <button type="button" id="cancel-btn" class="btn btn-danger">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary pull-right">Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>