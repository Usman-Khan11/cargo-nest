@php
    $tabs = [
        'basic_info' => 'Basic Info',
        'equipments' => 'Equipments',
        'bl_details' => 'B/L Details',
        'charges' => 'Charges',
        'routing' => 'Routing',
        // 'other_info' => 'Other Info',
        // 'product_serial_info' => 'Product / Serial Info',
    ];
@endphp

<form id="newForm" method="post" action="{{ route('admin.si_job.index') }}" enctype="multipart/form-data">
    @csrf
    <ul class="nav nav-tabs" id="" role="tablist" style="background-color:#f4ffed;">
        @foreach ($tabs as $k => $v)
            <li class="nav-item" role="presentation">
                <button class="nav-link @if ($k == 'basic_info') active @endif" data-bs-toggle="tab"
                    data-bs-target="#tab_{{ $k }}" type="button" role="tab">
                    {{ $v }}
                </button>
            </li>
        @endforeach
    </ul>
    <div class="tab-content" id="myTabContent" style="background-color:#f4ffed;">
        @foreach ($tabs as $k => $v)
            <div class="tab-pane fade @if ($k == 'basic_info') show active @endif" id="tab_{{ $k }}"
                role="tabpanel">
                @include('admin.si_job.partials.' . $k)
            </div>
        @endforeach
    </div>
</form>
