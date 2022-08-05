@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-slate-300 focus:border-primary focus:ring focus:ring-primary/30 focus:ring-opacity-50']) !!}>
