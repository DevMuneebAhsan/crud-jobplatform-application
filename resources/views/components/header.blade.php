<header>
    <nav class="flex justify-between items-center py-4 border-b border-white/10">
        <div><a href="/"><img src="{{ Vite::asset('resources/images/logo.svg') }}" alt=""></a></div>
        <div class="flex space-x-6 font-semibold">
            <div><a href="#">Jobs</a></div>
            <div><a href="#">Careers</a></div>
            <div><a href="#">Salaries</a></div>
            <div><a href="#">Companies</a></div>
        </div>
        @auth
            <div class="flex space-x-6 font-semibold">
                <a href="/jobs/create">Post a Job</a>
                <form method="POST" action="/logout">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Logout</button>
                </form>
            </div>
        @endauth
        @guest
            <div class="space-x-6 font-semibold">
                <a href="/register">Register</a>
                <a href="/login">Login</a>
            </div>
        @endguest
    </nav>
</header>