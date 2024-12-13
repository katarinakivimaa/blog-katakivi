<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-secondary bg-secondary']) }}>
    {{ $slot }}
</button>
