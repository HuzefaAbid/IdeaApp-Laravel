<x-layout>
    <x-slot:title>Jobs</x-slot>
    <x-slot:heading>Jobs</x-slot>

    <ul class="list-disc pl-5 space-y-1">
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job['id'] }}"
                    style="color:blue; text-decoration:underline;"><strong>{{ $job['title'] }}</strong> pays
                    {{ $job['salary'] }}</a>
            </li>
        @endforeach
    </ul>
</x-layout>
