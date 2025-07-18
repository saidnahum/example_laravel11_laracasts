<x-layout>
    <x-slot:heading>
        Job Page
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job->title }}</h2>
    <p class="text-gray-600">Employer: {{ $job->employer->name }}</p>
    <p>Salary: ${{ number_format($job->salary, 0) }}</p>

    @can('edit', $job)
        <p class="mt-6">
            <x-button href="/jobs/{{ $job->id }}/edit">
                Edit Job
            </x-button>
        </p>
    @endcan
</x-layout>
