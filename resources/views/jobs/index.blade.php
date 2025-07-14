<x-layout>
    <x-slot:heading>
        Jobs Listings
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a class="block px-2 py-4 border border-gray-200 rounded-lg" href="jobs/{{ $job['id'] }}">
                <div class="font-bold text-blue-500">
                    {{-- {{ $jobs->firstItem() + $loop->index }}.- {{$job->employer->name}} --}}
                    {{$job->employer->name}}
                </div>
                <div>
                    <span class="font-bold">{{ $job['title'] }}</span>: Pays ${{ number_format($job['salary'], 0) }} per year!!
                </div>
            </a>
        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>
    </div>

</x-layout>
