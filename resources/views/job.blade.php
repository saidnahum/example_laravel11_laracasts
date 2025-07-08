<x-layout>
    <x-slot:heading>
        Job Page
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
    <p class="text-gray-600">Employer: {{ $job->employer->name }}</p>
    <p>Salary: {{ $job['salary'] }}</p>
</x-layout>
