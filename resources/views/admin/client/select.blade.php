<select class="input-group input-group-sm mb-3" name="company[]" multiple>
    @foreach($companies as $company)
        <option value="{{ $company->id }}">{{ $company->name }}</option>
    @endforeach
</select>
