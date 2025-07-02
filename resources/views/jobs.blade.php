<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>

    <h1 class="mb-5">JOBS Listing!!</h1>

    @foreach ($jobs as $job)
        <ul>
            <li>{{ $job['title'] }}: Pays {{ $job['salary'] }} per year</li>
        </ul>
    @endforeach
</x-layout>
