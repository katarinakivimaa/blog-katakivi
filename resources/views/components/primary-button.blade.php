<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary bg-primary items-center']) }}>
    {{ $slot }}
</button>
