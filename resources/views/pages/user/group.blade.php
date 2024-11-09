@extends('loyauts.app')

@section('content')
    <section class="userGroups">
        <div class="container">
            <h2>Group list: </h2>
            <div class="row">
                @forelse ($groups as $group)
                    <a href={{route('showGroup', $group->id)}} type="buton">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">{{ $group->name }}</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{ Str::limit($group->description, 100) }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-12">
                        <p class="text-center">No groups available.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
