@props(['routes','name'])
<li>
    <form action="{{ $routes }}" method="post">
        @csrf
        @method('delete')
		<span class="menu-title">
           <i class="ri-file-shield-2-line">
               <button type="submit">
		        {{ ucwords($name) }}
                </button>
           </i>
        </span>
    </form>
</li>

