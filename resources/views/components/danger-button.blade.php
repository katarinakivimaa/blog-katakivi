<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-error bg-error"']) }}>
    {{ $slot }}
</button>
