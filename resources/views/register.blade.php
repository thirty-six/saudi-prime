@extends('layouts.user')

@section('title', 'Register')

@section('content')
<div class="bg-white shadow-card p-app-lg rounded-lg mx-auto">

    <h1 class="text-title font-bold text-deep mb-app-md">Registration</h1>

    <form class="space-y-app-md">

        <div>
            <label class="block text-small text-neutral-dark mb-app-xs">Full Name</label>
            <input type="text" class="w-full p-app-sm rounded-md border border-neutral-muted focus:border-moss"/>
        </div>

        <div>
            <label class="block text-small text-neutral-dark mb-app-xs">Email</label>
            <input type="email" class="w-full p-app-sm rounded-md border border-neutral-muted focus:border-moss"/>
        </div>

        <button class="bg-deep hover:bg-forest text-white px-app-lg py-app-sm rounded-md transition">
            Submit
        </button>

    </form>
</div>
@endsection
