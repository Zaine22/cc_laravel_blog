@props(["name", "type" => "text", "value" => ""])
<x-form.input-wrapper>
    <x-form.label :name='$name' />
    <input
        required
        id="{{ $name }}"
        type="{{ $type }}"
        name="{{ $name }}"
        class="form-control"
        value="{{ old($name, $value) }}"
    >
    <x-error :name="$name" />
</x-form.input-wrapper>
