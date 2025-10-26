<div class="space-y-4">
    <div class="grid grid-cols-2 gap-4">
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Name</p>
            <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $record->name }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</p>
            <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $record->email }}</p>
        </div>
    </div>

    <div>
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Phone</p>
        <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $record->phone }}</p>
    </div>

    <div>
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Message</p>
        <div class="mt-2 rounded-lg bg-gray-50 p-4 text-sm text-gray-900 dark:bg-gray-800 dark:text-white">
            {{ $record->message }}
        </div>
    </div>

    <div>
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Submitted</p>
        <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $record->created_at->format('F j, Y g:i A') }}</p>
    </div>
</div>

