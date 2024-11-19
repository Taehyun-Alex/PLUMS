<x-layout>
    <div class="container mx-auto p-6 bg-white shadow-md rounded">
        <h1 class="text-2xl font-bold mb-6">Settings</h1>

        <!-- General Settings Form -->
        <form action="{{ route('settings.update') }}" method="POST" class="mb-6">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Application Name</label>
                <input type="text" name="app_name" class="p-2 border rounded w-full" value="{{ config('app.name') }}" />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Admin Email</label>
                <input type="email" name="admin_email" class="p-2 border rounded w-full" value="{{ config('mail.from.address') }}" />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Background Color</label>
                <input type="color" name="background_color" class="p-2 border rounded w-full"
                       value="{{ config('settings.background_color', '#6b46c1') }}" />
            </div>
            <!-- Add more settings as needed -->
            <button type="submit" class="bg-purple-600 text-white p-2 rounded">Save Settings</button>
        </form>

        <!-- Other Settings Sections -->
        <!-- Add sections for other settings as needed -->
    </div>
</x-layout>
