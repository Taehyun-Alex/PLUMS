<x-layout>
    <div class="container mx-auto p-6 bg-white shadow-md rounded">
        <h1 class="text-2xl font-bold mb-6">Results</h1>

        <!-- Filter and search bar -->
        <div class="flex justify-between mb-4">
            <input type="text" placeholder="Search by student name" class="p-2 border rounded" />
            <select class="p-2 border rounded">
                <option value="">Filter by Course</option>
                <!-- Populate with courses dynamically -->
            </select>
        </div>

        <!-- Results table -->
        <table class="min-w-full bg-white">
            <thead>
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Recommended Course</th>
                <th class="py-2 px-4 border-b">Score</th>
                <th class="py-2 px-4 border-b">Date</th>
            </tr>
            </thead>
            <tbody>
            <!-- Populate with results dynamically -->
            </tbody>
        </table>
    </div>
</x-layout>
