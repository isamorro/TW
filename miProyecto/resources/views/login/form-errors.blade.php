    <div class="mb-6 rounded-2xl border border-red-200 bg-red-50/80 px-4 py-3 text-red-700">
        <ul class="list-disc list-inside space-y-1 text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>