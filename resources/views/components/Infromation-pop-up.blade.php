@if (session('success') || session('error') || session('fail') || session('info'))
<div id="session-message"
    class="z-50 fixed top-4 left-1/2 transform -translate-x-1/2 p-4 rounded shadow-lg
 {{ session('success') ? 'bg-green-500' : '' }}
 {{ session('error') ? 'bg-red-500' : '' }}
 {{ session('fail') ? 'bg-yellow-500' : '' }}
 {{ session('info') ? 'bg-blue-500' : '' }}">
    {{ session('success') ?? (session('error') ?? (session('fail') ?? session('info'))) }}
</div>
@endif