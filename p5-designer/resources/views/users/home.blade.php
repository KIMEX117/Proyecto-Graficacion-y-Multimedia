<h1>Soy el home</h1>
{{ auth()->user() }}

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button>Logout</button>
</form>