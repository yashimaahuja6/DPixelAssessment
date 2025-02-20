<div class="container mx-auto mt-8 grid gap-6 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
    @foreach ($jobs as $job)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <!--  -->
            <div class="p-4">
                <h2 class="font-semibold text-lg">{{ $job['title'] }}</h2>
                <p class="text-gray-600">{{ $job['description'] }}</p>
                <!-- Additional job details as needed -->
            </div>
        </div>
    @endforeach
</div>
