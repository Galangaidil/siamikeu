<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary/90 active:bg-sky-600 focus:outline-none focus:border-primary focus:ring ring-primary/30 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
