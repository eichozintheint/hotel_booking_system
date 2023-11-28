<!DOCTYPE html>
<html lang="en">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Royal Bagan</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" >
        <script src="script.js"></script>
    </head>
<body>
    <div class="col-md-6 form-group">
        <label for="locations">{{ trans('cruds.eventReport.fields.location') }}</label>
        <div style="padding-bottom: 4px">
            <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
            <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
        </div>
        <select class="form-control select2 {{ $errors->has('locations') ? 'is-invalid' : '' }}" name="locations[]" id="locations" multiple>
            @foreach($locations as $id => $location)
                <option value="{{ $id }}" {{ in_array($id, old('locations', [])) ? 'selected' : '' }}>{{ $location }}</option>
            @endforeach
        </select>
        @if($errors->has('locations'))
            <div class="invalid-feedback">
                {{ $errors->first('locations') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.eventReport.fields.location_helper') }}</span>
    </div>
    <div class="col-md-6 form-group">
        <label for="egress_nos">{{ trans('cruds.eventReport.fields.no') }}</label>
        <div style="padding-bottom: 4px">
            <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
            <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
        </div>
        <select class="form-control select2 {{ $errors->has('no') ? 'is-invalid' : '' }}" name="no[]" id="no" multiple>
            @foreach($no as $id => $no)
                <option value="{{ $id }}" {{ in_array($id, old('no', [])) ? 'selected' : '' }}>{{ $no }}</option>
            @endforeach
        </select>
        @if($errors->has('nos'))
            <div class="invalid-feedback">
                {{ $errors->first('nos') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.eventReport.fields.no_helper') }}</span>
    </div>

</body>
</html>
