<x-layout>
    <div class="container mx-auto p-6 bg-white">
        <h1 class="text-3xl font-bold text-center text-purple-800 mb-6">Results</h1>
        <!-- Filter and search bar -->
        <div class="flex justify-between mb-4">
            <input type="text" placeholder="Search by course / student" class="w-full p-2 border rounded-md" />
{{--            <select class="p-2 border rounded">--}}
{{--                <option value="">Filter by Course</option>--}}
{{--                <option value="C3CS">Cert III in Cyber Security</option>--}}
{{--                <option value="C3IT">Cert III in Information Technology</option>--}}
{{--                <option value="C3NA">Cert III in Network Administration</option>--}}
{{--                <!-- Add more courses dynamically -->--}}
{{--            </select>--}}
        </div>

        <!-- Results table -->
        <table class="min-w-full bg-white overflow-hidden table-auto shadow-sm sm:rounded-lg border border-gray-300">
            <thead class="bg-purple-500 text-white">
            <tr>
                <th class="py-2 px-4 text-center border-b border-gray-300">Name</th>
                <th class="py-2 px-4 text-center border-b border-gray-300">Course</th>
                <th class="py-2 px-4 text-center border-b border-gray-300">Score</th>
                <th class="py-2 px-4 text-center border-b border-gray-300">Date</th>
                <th class="py-2 px-4 text-center border-b border-gray-300">Actions</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            <!-- Fake Result 1 -->
            <tr>
                <td class="py-2 px-4 text-center border-b border-gray-200">John Doe</td>
                <td class="py-2 px-4 text-center border-b border-gray-200">Cert III in Cyber Security</td>
                <td class="py-2 px-4 text-center border-b border-gray-200">95</td>
                <td class="py-2 px-4 text-center border-b border-gray-200">2024-09-01</td>
                <td class="py-2 px-4 text-center border-b border-gray-200">
                    <div class="flex justify-center space-x-2">
                        <button class="bg-purple-500 hover:bg-purple-600 text-white py-1 px-3 rounded">Details</button>
                    </div>
                </td>
            </tr>
            <!-- Fake Result 2 -->
            <tr>
                <td class="py-2 px-4 text-center border-b border-gray-200">Jane Smith</td>
                <td class="py-2 px-4 text-center border-b border-gray-200">Cert III in Information Technology</td>
                <td class="py-2 px-4 text-center border-b border-gray-200">88</td>
                <td class="py-2 px-4 text-center border-b border-gray-200">2024-08-30</td>
                <td class="py-2 px-4 text-center border-b border-gray-200">
                    <div class="flex justify-center space-x-2">
                        <button class="bg-purple-500 hover:bg-purple-600 text-white py-1 px-3 rounded">Details</button>
                    </div>
                </td>
            </tr>
            <!-- Fake Result 3 -->
            <tr>
                <td class="py-2 px-4 text-center border-b border-gray-200">Michael Johnson</td>
                <td class="py-2 px-4 text-center border-b border-gray-200">Cert III in Network Administration</td>
                <td class="py-2 px-4 text-center border-b border-gray-200">72</td>
                <td class="py-2 px-4 text-center border-b border-gray-200">2024-09-02</td>
                <td class="py-2 px-4 text-center border-b border-gray-200">
                    <div class="flex justify-center space-x-2">
                        <button class="bg-purple-500 hover:bg-purple-600 text-white py-1 px-3 rounded">Details</button>
                    </div>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr class="w-full">
                <td colspan="5" class="py-2 px-4 bg-gray-100 border-t border-gray-300 text-center">
                        <small>No pages.</small>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
</x-layout>
