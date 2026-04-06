<x-layout title="FormTest">
    <div class="space-y-12">
        <div class="border-b border-white/10">
            <div class="mt-2 p-10 bg-gray-800 rounded-lg">
                <div class="max-w-full">

                    @if(session('success'))
                        <div class="flex items-center gap-2 bg-green-500/20 border border-green-500 text-green-400 text-sm px-4 py-3 rounded-md mb-3">
                            <span>✓</span>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="flex items-center gap-2 bg-red-500/20 border border-red-500 text-red-400 text-sm px-4 py-3 rounded-md mb-3">
                            <span>✕</span>
                            <p>{{ session('error') }}</p>
                        </div>
                    @endif

                    @if(session('warning'))
                        <div class="flex items-center gap-2 bg-yellow-500/20 border border-yellow-500 text-yellow-400 text-sm px-4 py-3 rounded-md mb-3">
                            <span>⚠</span>
                            <p>{{ session('warning') }}</p>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="flex items-center gap-2 bg-red-500/20 border border-red-500 text-red-400 text-sm px-4 py-3 rounded-md mb-3">
                            <span>✕</span>
                            <p>{{ $errors->first('email') }}</p>
                        </div>
                    @endif

                    @if(count($emails) >= 5)
                        <div class="flex items-center gap-2 bg-yellow-500/20 border border-yellow-500 text-yellow-400 text-sm px-4 py-3 rounded-md mb-3">
                            <span>⚠</span>
                            <p>You have reached the maximum of 5 emails. Delete one to add more.</p>
                        </div>
                    @endif

                    <form method="POST" action="/formtest">
                        @csrf
                        <label for="email" class="block text-sm/6 font-medium text-white">Email</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                <input id="email" type="email" name="email" placeholder="juandelacruz@umindanao.edu.ph" value="{{ old('email') }}" class="block w-full bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                            </div>
                            <div class="mt-3 flex items-center gap-x-6 justify-end">
                                <button type="submit" class="rounded-md bg-indigo-500 px-6 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
                            </div>
                        </div>
                    </form>

                    <div class="mt-6 w-full">
                        <h2 class="text-lg font-semibold text-white mb-3">Emails ({{ count(session('emails', [])) }})</h2>
                        @if(count($emails) > 0)
                            <ul class="w-full divide-y divide-white/10">
                                @foreach($emails as $email)
                                    <li class="text-sm py-3 text-white flex items-center justify-between w-full">
                                        {{ $email }}
                                        <form method="POST" action="/delete-email" style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="email" value="{{ $email }}" />
                                            <button type="submit" class="text-red-400 text-xs ml-3 hover:text-red-600">Delete</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="mt-3">
                                <a href="/delete-AllEmails" class="text-xs text-gray-400 hover:text-red-400">Delete All</a>
                            </div>
                        @else
                            <p class="text-gray-400 text-sm">No emails saved yet.</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layout>