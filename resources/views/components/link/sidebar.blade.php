@props(['routes','name'])
<li>
    <a href="{{ $routes }}" class="box-style">
		<span class="menu-title">
            <i class="ri-file-shield-2-line"></i>
		    {{ ucwords($name) }}
        </span>
    </a>
</li>
