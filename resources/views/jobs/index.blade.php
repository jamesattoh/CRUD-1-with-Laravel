<x-layout>

    <x-slot:heading>
        Listing Page
    </x-slot>
    <h1>Hello from Jobs Page </h1>


    <div class="space-y-4">
        @foreach ($jobs as $job)

                <a href="/jobs/{{ $job['id'] }}" class=" block border border-gray-300 px-4 py-6 rounded-lg">
                    <div class="font-bold text-blue-500 text-sm">
                        {{ $job->employer->name }}
                    </div>

                    <div>
                        <strong>{{ $job['title'] }} :</strong> Pays {{ $job['salary'] }} a month.
                    </div>
                </a>

        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
