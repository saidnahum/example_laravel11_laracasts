<x-layout>
    <x-slot:heading>
        Jobs Listings
    </x-slot:heading>
    <ul>
        @foreach ($jobs as $job)
            <li>
                <a class="text-blue-500 hover:underline" href="jobs/{{ $job['id'] }}">
                    {{ $job['title'] }}: Pays ${{ number_format($job['salary'], 0) }} per year!!
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
