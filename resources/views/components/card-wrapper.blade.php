<div {{ $attributes->merge([
    "class" => "card
    d-flex
    p-3
    m-3
    shadow-sm",
]) }}>
    {{ $slot }}
</div>
