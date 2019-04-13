<div class="col{{ isset($class) ? ' '. $class : null }}">
    <div class="form-group m-b-15">
        <label class="control-label text-primary font-12 m-b-5">{{ $label }}</label>
        @if (isset($select) && $select)
            @php $options = isset($attribute['options']) ? $attribute['options'] : []; @endphp
            <select 
                class="custom-select col-12"
                @if (isset($attribute) && is_array($attribute))
                    @foreach($attribute as $key => $value)
                    @if ($key != 'options')
                        {{ $key }}="{{ $value }}"
                    @endif
                    @endforeach
                @endif
            >
                <option value="">Choose...</option>
                @if (count($options) > 0)
                @foreach ($options as $key => $value)
                    <option value="{{ $key }}" {{ isset($selected) && $selected == $key ? 'selected' : '' }}>{{ $value }}</option>
                @endforeach
                @endif
            </select>
        @else
            <input 
                class="form-control font-14{{ isset($fieldClass) ? ' '. $fieldClass : '' }}"
                @if (isset($attribute) && is_array($attribute))
                    @foreach($attribute as $key => $value)
                        {{ $key }}="{{ $value }}"
                    @endforeach
                @endif
            />
        @endif
    </div>
</div>