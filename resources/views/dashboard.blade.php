<x-layout>
    <h1>dashboard</h1>
    <h2>{{ auth()->user()->username }}</h2>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">logout</button>
    </form>
</x-layout>
